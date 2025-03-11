<?php

class Database {
    private $host = 'localhost';
    private $usr = 'administrator';
    private $pwd = 'Bobbyboy@321';
    private $dbName = 'todolist';

    protected function connect() {
        $dsn = ('mysql:host=' . $this->host . '; dbname=' . $this->dbName);
        $pdo = new PDO($dsn, $this->usr, $this->pwd);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
}