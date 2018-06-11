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

    //return $sql;
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
}
