<?php
require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/UserartDAO.php';
require_once __DIR__ . '/../dao/PopupDAO.php';
require_once __DIR__ . '/../dao/ThemaDAO.php';
//require_once WWW_ROOT . 'controller' . DS . 'Controller.php';
//require_once WWW_ROOT . 'dao' . DS . 'UserDAO.php';

class PagesController extends Controller {

  private $userDAO;
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

    //$users = $this->userDAO->selectAll();
    //$this->set('users', $users);

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

    $popups = $this->popupDAO->selectAll();
    $this->set('popups', $popups);

    //$users = $this->userDAO->selectAll();
    //$this->set('users', $users);

  }

  private function handleAjaxRequest() {
    $result = false;

    //set header
    header('Content-Type: application/json');

    //check if there s a post action
    if(isset($_POST['action'])){
      //check what to do
      if($_POST['action'] === 'HOTW') {
        //get highlights of the week
        $monday = date( 'Y-m-d H:i:s', strtotime('monday this week'));
        $friday = date( 'Y-m-d H:i:s', strtotime('sunday this week'));

        $tempResults = $this->userartDAO->selectSOFTW($monday, $friday);
        $resultAmount = count($tempResults);
        $resultAmount = 21;
        $ids = [];
        //$_POST['amount']
        //$_POST['lastId']
        //$_POST['dir']

        for($i = 0; $i < $_POST['amount']; $i++) {
          if($_POST['dir']) {
            //is next
            $id = $_POST['lastId'] + 1 + $i;
          } else {
            //is prev
            $id = $_POST['lastId'] - $_POST['amount'] - $i;
          }

          if($id < 0) {
            //is negative
            $id = $resultAmount + $id + 1;
          }

          if($id > $resultAmount) {
            //is to big
            $id -= $resultAmount + 1;
          }

          array_push($ids, $id);
        }

        if(!$_POST['dir']) {
          //reverse if backwards
          $ids = array_reverse($ids);
        }

        $result['ids'] = $ids;

      } else if ($_POST['action'] === 'submissions') {
        //get submissions with the filter
        //$_POST['search']
        //$_POST['date']
        //$_POST['theme']
        //$_POST['remix']
        $result = $this->getFilterdResults($_POST);

      } else if ($_POST['action'] === 'searchHint') {
        //get search hints
        //$_POST['search']
        $tempResults = [];

        $artistName = $this->userartDAO->getHintsByArtistName($_POST['search'] . '%');
        $artTitle = $this->userartDAO->getHintsByWorkName($_POST['search'] . '%');

        //add artists + tag
        foreach ($artistName as $value) {
          array_push($tempResults, ['tag' => 'artist', 'value' => $value['artistName']]);
        }

        //add works + tag
        foreach ($artTitle as $value) {
          array_push($tempResults, ['tag' => 'title', 'value' => $value['artTitle']]);
        }

        $result = $tempResults;

      }
    }

    //echo result
    echo json_encode($result);
    exit();
  }

  private function getFilterdResults($data) {
    $result;
    $conditions = [];
    $sql = '';

    if(!empty($data['search'])){
      //there is a search
      array_push($conditions, $data['search'] . '%');

    }

    if(!empty($data['date'])) {
      //there is a date
      array_push($conditions, $data['date'] . ' >= `timeStamp`');

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
      if($sql === '') {
        $sql = $value;
      } else {
        $sql += ' AND ' . $value;
      }
    }

    //get the result with the conditions
    $result = $this->userartDAO->selectByFilter($sql);

    return $result;
  }


/*

  public function search() {
    header('Content-Type: application/json');

    if ($this->isAjax) {
      $conditions = array();

      if(!empty($_GET["query"])){
        $conditions[] = array(
          'field' => 'artTitle',
          'comparator' => 'like',
          'value' => $_GET["query"]
        );
      }

      $users = $this->userDAO->search($conditions);
      $this->set('users', $users);

      echo json_encode($users);
      exit();
    }
  }

  public function artistName() {
    header('Content-Type: application/json');

    if ($this->isAjax) {
      $conditions = array();

      if(!empty($_GET["artistName"])){
        $conditions[] = array(
          'field' => 'artistName',
          'comparator' => 'like',
          'value' => $_GET["artistName"]
        );
      }

      $events = $this->eventDAO->search($conditions);
      $this->set('events', $events);

      echo json_encode($events);
      exit();
    }
  }

  public function acties() {
    $conditions = array();

    // if ($_SERVER['HTTP_ACCEPT'] == 'application/json') {
    //   header('Content-Type: application/json');
    //   echo json_encode($events);
    //   exit();
    // }
    //
    // $this->set('events', $events);

    //example: search on title
    if(!empty($_GET["query"])){
      $conditions[] = array(
        'field' => 'title',
        'comparator' => 'like',
        'value' => $_GET["query"]
      );
    }

    if(!empty($_GET["stad"])){
      $conditions[] = array(
        'field' => 'city',
        'comparator' => 'like',
        'value' => $_GET["stad"]
      );
    }

    if(!empty($_GET["day"])){
      $conditions[] = array(
        'field' => 'dayofweek(start)',
        'comparator' => '=',
        'value' => $_GET["day"]
      );
    }

      $events = $this->eventDAO->search($conditions);
      $this->set('events', $events);

      // $this->set('filterjs', '<script src="http://localhost:8080/js/filter.js"></script>');
      // if($this->env == 'production') {
      //   //link to the generated javascript file in production mode
      //   $this->set('filterjs', '<script src="js/filter.js"></script>');
      // }


    //example: search on organiser_id
    // $conditions[] = array(
    //   'field' => 'organiser_id',
    //   'comparator' => '=',
    //   'value' => 8
    // );

    //example: search on organiser name
    // $conditions[] = array(
    //   'field' => 'organiser',
    //   'comparator' => 'like',
    //   'value' => 'brussel'
    // );

    //example: search on tag name
    // $conditions[] = array(
    //   'field' => 'tag',
    //   'comparator' => '=',
    //   'value' => 'e-bike'
    // );

    //example: 1-day events on september 17
    // $conditions[] = array(
    //   'field' => 'start',
    //   'comparator' => '>=',
    //   'value' => '2018-09-17 00:00:00'
    // );
    // $conditions[] = array(
    //   'field' => 'end',
    //   'comparator' => '<=',
    //   'value' => '2018-09-17 23:59:59'
    // );

    //example: events on september 17 (includes multi-day events)
    // $conditions[] = array(
    //   'field' => 'start',
    //   'comparator' => '<=',
    //   'value' => '2018-09-17 23:59:59'
    // );
    // $conditions[] = array(
    //   'field' => 'end',
    //   'comparator' => '>=',
    //   'value' => '2018-09-17 00:00:00'
    // );

    //example: search on organiser, with certain end date + time
    // $conditions[] = array(
    //   'field' => 'organiser',
    //   'comparator' => 'like',
    //   'value' => 'brussel'
    // );
    // $conditions[] = array(
    //   'field' => 'end',
    //   'comparator' => '=',
    //   'value' => '2018-09-16 18:00:00'
    // );
    $this->set('currentPage', 'acties');
  }

  public function detail() {

    if(!empty($_GET['id'])){
      $events = $this->eventDAO->selectById($_GET['id']);
    }
    $this->set('events', $events);
  }

  public function handleSearch() {
        $errors = array();

        if(empty($_SESSION['zoekresultaat'])) {
          $errors['zoekresultaat'] = 'Er zijn geen acties gevonden voor deze zoekopdracht. Bedoelde u iets anders?';
        }

        $this->set('errors', $errors);
      }

*/
}
