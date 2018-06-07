<?php

require_once WWW_ROOT . 'controller' . DS . 'Controller.php';
require_once WWW_ROOT . 'dao' . DS . 'UserDAO.php';

class ArtController extends Controller {

  private $userDAO;
  private $popupDAO;
  private $themaDAO;

  function __construct() {
    $this->userDAO = new UserDAO();
    $this->popupDAO = new PopupDAO();
    $this->themaDAO = new ThemaDAO();
  }

  public function index() {
    $this->set('currentPage', 'index');

    $users = $this->userDAO->selectAll();
    $this->set('users', $users);

    $themas = $this->themaDAO->selectAll();
    $this->set('themas', $themas);
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

    $users = $this->userDAO->selectAll();
    $this->set('users', $users);

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
