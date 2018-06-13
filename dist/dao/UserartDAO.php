<?php
require_once __DIR__ . '/DAO.php';
class UserartDAO extends DAO {

  public function selectById($id) {
    $sql = "SELECT * FROM `userArt` WHERE `id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function selectAll($limit = '') {
    $sql = "SELECT * FROM `userArt` ORDER BY `timeStamp` $limit";
    $stmt = $this->pdo->prepare($sql);
    //$stmt->bindValue(':limited', $limit);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectSOFTW($startDate, $endDate) {
    $sql = "SELECT * FROM `userArt` WHERE :startDate <= `timeStamp` AND :endDate >= `timeStamp` ORDER BY `timeStamp`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':startDate', $startDate);
    $stmt->bindValue(':endDate', $endDate);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectByFilter($filter, $limit) {
    $sql = "SELECT * FROM `userArt` WHERE $filter ORDER BY `timeStamp` $limit";
    $stmt = $this->pdo->prepare($sql);
    //$stmt->bindValue(':filterWorks', $filter);
    //$stmt->bindValue(':limitSql', $limit);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getHintsByArtistName($title) {
    $sql = "SELECT `artistName` FROM `userArt` WHERE `artistName` LIKE :title";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':title', $title);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getHintsByWorkName($title) {
    $sql = "SELECT `artTitle` FROM `userArt` WHERE `artTitle` LIKE :title";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':title', $title);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function insert($data) {
    $errors = $this->getValidationErrors($data);
    if(empty($errors)) {
      $sql = "INSERT INTO `userArt` (`artistName`, `artTitle`, `email`, `image`, `timeStamp`, `themeId`,`userconcept`) VALUES (:artistName, :artTitle, :email, :image, :timeStamper, :themeId, :concept)";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':artistName', $data['artistname']);
      $stmt->bindValue(':artTitle', $data['title']);
      $stmt->bindValue(':email', $data['email']);
      $stmt->bindValue(':image', $data['image']);
      $stmt->bindValue(':concept', $data['concept']);
      $stmt->bindValue(':timeStamper', $data['timestamp']);
      $stmt->bindValue(':themeId', $data['themeId']);
      if($stmt->execute()) {
        $insertedId = $this->pdo->lastInsertId();
        return $this->selectById($insertedId);
      }
    }
    return $errors;
  }

  public function getValidationErrors($data) {
    $errors = array();
    if(!isset($data['artistname'])) {
      $errors['artistname'] = "Please fill in a artist name";
    }
    if(!isset($data['title'])) {
      $errors['title'] = "Please fill in a title";
    }
    if(!isset($data['email'])) {
      $errors['email'] = "Please fill in an email adress";
    }
    if(!isset($data['themeId'])) {
      $errors['themeId'] = "Please fill in a themeId";
    }
    return $errors;
  }
}
