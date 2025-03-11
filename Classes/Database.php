<?php

class Database {
    private static $host = 'localhost';
    private static $usr = 'administrator';
    private static $pwd = 'Bobbyboy@321';
    private static $dbName = 'todolist';

    public static function connect() {
        $dsn = ('mysql:host=' . self::$host . '; dbname=' . self::$dbName);
        $pdo = new PDO($dsn, self::$usr, self::$pwd);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
}