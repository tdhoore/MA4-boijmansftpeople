<?php
require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/UserartDAO.php';
require_once __DIR__ . '/../dao/PopupDAO.php';
require_once __DIR__ . '/../dao/ThemaDAO.php';
//require_once WWW_ROOT . 'controller' . DS . 'Controller.php';
//require_once WWW_ROOT . 'dao' . DS . 'UserDAO.php';

class PagesController extends Controller {

  private $userartDAO;
  private $popupDAO;
  private $themaDAO;

  function __construct() {
    $this->userartDAO = new UserartDAO();
    $this->popupDAO = new PopupDAO();
    $this->themaDAO = new ThemaDAO();
  }

  public function index() {
  if($this->isAjax) {
      //is ajaxRequest
      $this->handleAjaxRequest();

    } else {
      //render content
      $this->set('currentPage', 'index');
    }

    //$themas = $this->themaDAO->selectAll();
    //$this->set('themas', $themas);
  }

  public function party() {
    $this->set('currentPage', 'party');

    $popups = $this->popupDAO->selectAll();
    $this->set('popups', $popups);
}

  public function subs() {
    $this->set('currentPage', 'subs');
  }

  public function submit() {
    if($this->isAjax) {
      //is submit
      $this->handleAjaxRequest();
    }

    if (!empty($_POST)){
      if($_POST['action'] === 'submitArt') {
        header('Content-Type: application/json');
        $result = $this->handleUpload($_POST);
        echo json_encode($result);
        exit();
      }
    }

    $this->set('currentPage', 'submit');
  }

  private function handleAjaxRequest() {
    $result = false;

    //set header
    header('Content-Type: application/json');

    //check if there s a post action
    if(isset($_POST['action'])){
      //check what to do
      if($_POST['action'] === 'HOTW') {
        $result = $this->getSliderResults($_POST);

      } else if($_POST['action'] === 'submissions') {
        //get submissions with the filter
        //$_POST['search']
        //$_POST['month']
        //$_POST['year']
        //$_POST['theme']
        //$_POST['remix']
        //$_POST['limitStart']
        //$_POST['limitEnd']
        $result = $this->getFilterdResults($_POST);


      } else if($_POST['action'] === 'searchHint') {
        //get search hints
        //$_POST['search']
        $result = $this->getSearchHint($_POST);
      } else if($_POST['action'] === 'submitArt') {
        //get post results
        $result = $this->handleUpload($_POST);
      }
    }

    //echo result
    echo json_encode($result);
    exit();
  }

  private function getSearchHint($data) {
    $tempResults = [];

    $artistName = $this->userartDAO->getHintsByArtistName($data['search'] . '%');
    $artTitle = $this->userartDAO->getHintsByWorkName($data['search'] . '%');

    //add artists + tag
    foreach ($artistName as $value) {
      array_push($tempResults, ['tag' => 'artist', 'value' => $value['artistName']]);
    }

    //add works + tag
    foreach ($artTitle as $value) {
      array_push($tempResults, ['tag' => 'title', 'value' => $value['artTitle']]);
    }

    return $tempResults;
  }

  private function getSliderResults($data) {
    //get highlights of the week
    $monday = date( 'Y-m-d H:i:s', strtotime('monday this week'));
    $friday = date( 'Y-m-d H:i:s', strtotime('sunday this week'));

    $tempResults = $this->userartDAO->selectSOFTW($monday, $friday);
    $resultAmount = count($tempResults) - 1;
    $results = [];

    if($resultAmount + 1 > $data['amount']) {
      for($i = 0; $i < $data['amount']; $i++) {
        if($data['dir']) {
          //is next
          $id = $data['lastId'] + 1 + $i;
        } else {
          //is prev
          $id = $data['lastId'] - $data['amount'] - $i;
        }

        while ($id > $resultAmount) {
          //is to big
          $id -= $resultAmount + 1;
        }

        while ($id < 0) {
          //is negative
          $id = ($resultAmount + 1) + $id;
        }

        array_push($results, $tempResults[$id]);
      }

      if(!$data['dir']) {
        //reverse if backwards
        $results = array_reverse($results);
      }
    } else {
      $results = false;
    }

      return $results;
  }

  private function getFilterdResults($data) {
    $filterResult;
    $conditions = [];
    $filter = '';

    if(!empty($data['search'])){
      //there is a search
      array_push($conditions, "(`artistName` LIKE '" . $data['search'] . "%' OR `artTitle` LIKE '" . $data['search'] . "%')");
    }

    if(!empty($data['month']) && !empty($data['year'])) {
      //there is a date

      $timestamp = date('Y-m-d G:i:s', mktime(0, 0, 0, 0, $data['month'], $data['year']));

      array_push($conditions,  "'$timestamp' <= `timeStamp`");

    }

    if(!empty($data['theme'])) {
      //there is a theme
      $themeSql = '';

      foreach($data['theme'] as $value) {
        if($themeSql === '') {
          $themeSql = '(' . $value . '== `themeId`';
        } else {
          $themeSql += 'OR ' . $value . '== `themeId`';
        }
      }

      $themeSql += ')';

      array_push($conditions, $themeSql);
    }

    if(isset($data['remix'])) {
      //remix is set
      if($data['remix']) {
        array_push($conditions, '1 == reboundId');
      }
    }

    //create sql code
    foreach ($conditions as $value) {
      if($filter === '') {
        $filter = $value;
      } else {
        $filter .= ' AND ' . $value;
      }
    }

    //create limit
    $limit = 'LIMIT ' . $data['limitStart'] . ', ' . $data['limitEnd'];

    //get the result with the conditions
    if(!empty($conditions)){
      $filterResult = $this->userartDAO->selectByFilter($filter, $limit);

    } else {
      $filterResult = $this->userartDAO->selectAll($limit);
    }

    return $filterResult;
  }

  private function handleUpload($data) {
    $errors = array();
    $data = array_merge($data, array('image'=>'later-toe-voegen'));

    if (empty($_FILES['artwork']) || !empty($_FILES['artwork']['error'])) {
      $errors['artwork'] = 'Gelieve een bestand te selecteren';
    }

    if (empty($errors)){
      // controleer of het een afbeelding is
      $fileinfo = finfo_open(FILEINFO_MIME_TYPE);
      $whitelist_type = array('image/jpeg', 'image/png','image/gif');
      if (!in_array(finfo_file($fileinfo, $_FILES['artwork']['tmp_name']), $whitelist_type)) {
        $errors['artwork'] = 'Gelieve een jpeg, png of gif te selecteren';
      }
    }

    if (empty($errors)) {
      // controleer de afmetingen van het bestand
      $size = getimagesize($_FILES['artwork']['tmp_name']);
      if ($size[0] < 2 || $size[1] < 2) {
        $errors['artwork'] = 'De afbeelding moet minimum 612x612 pixels groot zijn';
      }
    }

    if (empty($errors)) {
      $projectFolder = realpath(__DIR__ . '/..');
      $targetFolder = $projectFolder . '/assets/img';
      $targetFolder = tempnam($targetFolder, '');
      unlink($targetFolder);
      mkdir($targetFolder, 0777, true);
      $targetFileName = $targetFolder . '/' . $_FILES['artwork']['name'];
      $this->_resizeAndCrop(
        $_FILES['artwork']['tmp_name'],
        $targetFileName,
        $size[0], $size[1]
      );
      $relativeFileName = substr($targetFileName, 1 + strlen($projectFolder));
      $data['image'] = $relativeFileName;
      $data['timestamp'] = date("Y-m-d H:i:s");
      $data['themeId'] = $this->getThemeId($data['timestamp']);

      //editen
      $insertedImage = $this->userartDAO->insert($data);
    }

    if (!empty($errors)) {
      $_SESSION['error'] = 'De image kon niet toegevoegd worden!';
    }

    $this->set('_errors', $errors);

    return $insertedImage;
  }

  private function getThemeId($date) {
    return $this->themaDAO->selectCurrent($date)['id'];
  }

  private function _resizeAndCrop($src, $dst, $thumb_width, $thumb_height) {
      $type = exif_imagetype($src);
      $allowedTypes = array(
        1,  // [] gif
        2,  // [] jpg
        3,  // [] png
        6   // [] bmp
      );
      if (!in_array($type, $allowedTypes)) {
        return false;
      }
      switch ($type) {
        case 1 :
          $image = imagecreatefromgif($src);
          break;
        case 2 :
          $image = imagecreatefromjpeg($src);
          break;
        case 3 :
          $image = imagecreatefrompng($src);
          break;
        case 6 :
          $image = imagecreatefrombmp($src);
          break;
      }

      $filename = $dst;

      $width = imagesx($image);
      $height = imagesy($image);

      $original_aspect = $width / $height;
      $thumb_aspect = $thumb_width / $thumb_height;

      if ( $original_aspect >= $thumb_aspect ) {
         // If image is wider than thumbnail (in aspect ratio sense)
         $new_height = $thumb_height;
         $new_width = $width / ($height / $thumb_height);
      } else {
         // If the thumbnail is wider than the image
         $new_width = $thumb_width;
         $new_height = $height / ($width / $thumb_width);
      }

      $thumb = imagecreatetruecolor( $thumb_width, $thumb_height );

      // Resize and crop
      imagecopyresampled($thumb,
                         $image,
                         0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
                         0 - ($new_height - $thumb_height) / 2, // Center the image vertically
                         0, 0,
                         $new_width, $new_height,
                         $width, $height);
      imagejpeg($thumb, $filename, 80);
      return true;
    }
}
