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

    $popups = $this->popupDAO->selectAll();
    $this->set('popups', $popups);
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

      } else if ($_POST['action'] === 'submissions') {
        //get submissions with the filter
        //$_POST['search']
        //$_POST['month']
        //$_POST['year']
        //$_POST['theme']
        //$_POST['remix']
        //$_POST['limitStart']
        //$_POST['limitEnd']
        $result = $this->getFilterdResults($_POST);


      } else if ($_POST['action'] === 'searchHint') {
        //get search hints
        //$_POST['search']
        $result = $this->getSearchHint($_POST);
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
}
