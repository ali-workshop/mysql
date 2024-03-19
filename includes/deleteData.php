<?php require_once "database.inc.php";
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    try {
        $query = "DELETE FROM users WHERE username=:username AND pwd=:pwd;";
        $PrepareStatment = $PdoConnection->prepare($query);
        $PrepareStatment->bindParam(":username", $username);
        $PrepareStatment->bindParam(":pwd", $password);
        $PrepareStatment->execute();
        $PdoConnection = null;
        $PrepareStatment = null;

        header("Location:../form.html");
        die();

    } catch (PDOException $error) {

        echo "this query is field...........<br><br> " . $error->getMessage();
    }



}


?>