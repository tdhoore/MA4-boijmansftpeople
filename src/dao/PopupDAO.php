<?php
require_once( __DIR__ . '/DAO.php');
class PopupDAO extends DAO {

public function selectByPopupId($id) {
  $sql = "SELECT * FROM `popups` WHERE `id` = :id";
  $stmt = $this->pdo->prepare($sql);
  $stmt->bindValue(':id', $id);
  $stmt->execute();
  return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function selectAll() {
  $sql = "SELECT * FROM `popups`";
  $stmt = $this->pdo->prepare($sql);
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


}
