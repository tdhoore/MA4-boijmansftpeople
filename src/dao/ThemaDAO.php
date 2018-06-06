<?php
require_once( __DIR__ . '/DAO.php');
class ThemaDAO extends DAO {

public function selectByThemaId($id) {
  $sql = "SELECT * FROM `themas` WHERE `id` = :id";
  $stmt = $this->pdo->prepare($sql);
  $stmt->bindValue(':id', $id);
  $stmt->execute();
  return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function selectAll() {
  $sql = "SELECT * FROM `themas`";
  $stmt = $this->pdo->prepare($sql);
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


}
