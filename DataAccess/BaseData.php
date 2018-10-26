<?php
abstract class BaseData {
  protected $db;

  public function __construct()
  {
    $dsn = 'mysql:host=localhost;dbname=loja;charset=utf8;port:3306';
    $usuario = 'root';
    $senha = '';

    $this->db = new PDO($dsn, $usuario, $senha);
    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  public function __destruct() {
    $this->db = null;
  }

  public function beginTransaction()
  {
    $this->db->beginTransaction();
  }

  public function rollBack()
  {
    $this->db->rollBack();
  }

  public function commit()
  {
    $this->db->commit();
  }

}
?>
