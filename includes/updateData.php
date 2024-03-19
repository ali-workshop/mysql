<?php require_once ("database.inc.php"); ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    try {
        $query = "UPDATE users SET username=:username,pwd=:pwd,email=:email where id=5 ;";
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