<?php require_once ("database.inc.php"); ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    try {
        $query = "INSERT into users (username,pwd,email) VALUES (:username,:pwd,:email);";

        // we will use the prepared statment 
// for the secure reason because the user could type code inside the form so that it could destroy the database using sql code
// the way it is work ,we fisrt the send the query and then send the input into the data so we seprate the query and send it and then bind the data
// so there is no effect from the query on the data if the user send query in the form.

        $PrepareStatment = $PdoConnection->prepare($query);
        $PrepareStatment->bindParam(":username", $username);
        $PrepareStatment->bindParam(":pwd", $password);
        $PrepareStatment->bindParam(":email", $email);
        $PrepareStatment->execute();
        $PdoConnection = null;
        $PrepareStatment = null;
        header("Location:../form.html");
        die();#exit();
    } catch (PDOException $error) {
        die ("Thi Query is Field...............<br><br> " . $error->getMessage());
    }
}