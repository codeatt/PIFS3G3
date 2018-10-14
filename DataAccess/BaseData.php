<?php
class BaseData {
  protected $db;

  public function __construct()
  {
    $dsn = 'mysql:host=localhost;dbname=loja;charset=utf8;port:3306';
    $usuario = 'root';
    $senha = 'root';

    $db = new PDO($dsn, $db_user, $db_pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
