<?php
$dsn = "mysql:host=localhost;dbname=firstdatabase";
$username = "root";
$password = "";
try {
    $PdoConnection = new PDO($dsn, $username, $password);#pdo => php data objects;
    $PdoConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $error) {
    echo "the Connection failed wiht the data " . $error->getMessage() . "<br><br>";
}
