<?php require_once ("database.inc.php"); ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usernamesearch = $_POST["usernamesearch"];
    try {
        $query = "SELECT * FROM users WHERE username=:usernamesearch";

        $PrepareStatment = $PdoConnection->prepare($query);
        $PrepareStatment->bindParam(":usernamesearch", $usernamesearch);
        $PrepareStatment->execute();
        $data = $PrepareStatment->fetchAll(PDO::FETCH_ASSOC);

        $PdoConnection = null;
        $PrepareStatment = null;

    } catch (PDOException $error) {
        die ("Thi Query is Field...............<br><br> " . $error->getMessage());
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TABLE</title>
</head>

<body>

    <?php
    if (empty ($data)) {
        echo "ther is no data <br><br>";
    } else {
        foreach ($data as $row) {

            #using htmlspecialcharrs for avoid cross site scripting . 
            echo htmlspecialchars($row["username"]);
            echo htmlspecialchars($row["pwd"]);
            echo htmlspecialchars($row["email"]);

        }
    } ?>
</body>

</html>