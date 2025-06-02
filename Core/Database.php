<?php
//connect to out MYSQL database.
namespace Core;

use PDO;

class Database
{
  public $connection;
  public $statement;

  public function __construct($config, $username = 'root', $password = '')
  {

    $dsn = 'mysql:' . http_build_query($config, '', ';');

    $this->connection = new PDO($dsn, $username, $password, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
  }
  public function query($sql, $params)
  {


    $this->statement = $this->connection->prepare($sql);
    $this->statement->execute($params);

    return $this;
  }

  public function findFirst()
  {
    return $this->statement->fetch();
  }

  public function find()
  {
    return $this->statement->fetchAll();
  }
  public function findOrFail()
  {

    $result = $this->findFirst();
    if (!$result) abort();
    return $result;
  }
}
