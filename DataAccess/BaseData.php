<?php
abstract class BaseData {
  protected $db;

  public function __construct()
  {
    $dsn = 'mysql:host=localhost;dbname=loja;charset=utf8;port:3306';
    $usuario = 'root';
    $senha = '';

    $db = new PDO($dsn, $usuario, $senha);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  public function __destruct() {
    $db = null;
  }

  public function beginTransaction()
  {
    $db->beginTransaction();
  }

  public function rollBack()
  {
    $db->rollBack();
  }

  public function commit()
  {
    $db->commit();
  }

}
?>
