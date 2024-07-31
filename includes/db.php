<?php
// database connection settings
$host = 'localhost'; // this is database server host name
$db = 'simple_blog'; // this is name of the database being connected to
$user = 'root'; // username to connect to database
$pass = 'password'; // password
$charset = 'utf8mb4'; // character set to use, utf8mb4 is recommended for full UTF-8 support

// Data Source Name (DSN) - basically a string that tells PDO how to connect to the database
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// PDO options - these are settings to customize how PDO behaves
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Throw exceptions on errors (easier to debug)
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Return rows as associative arrays by default (easy to work with)
    PDO::ATTR_EMULATE_PREPARES   => false, // Use real prepared statements (safer against SQL injection)
];

try {
    // Create a new PDO instance (this is the actual database connection)
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    // If something goes wrong, catch the error and throw an exception with the error message and code
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}