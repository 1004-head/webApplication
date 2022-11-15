<?php
$connString = "mysql:host=db;port=3306;dbname=bookrepo";
$user = "root";
$pass = "testuser";

$pdo = new PDO($connString, $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$from = $_POST['old'];
$to = $_POST['new'];

$sql = "UPDATE Categories SET CategoryName='$to' WHERE CategoryName='$from'";
$count = $pdo->exec($sql);

$pdo = null;

echo "<p>Updated ".$count." rows</p>";
?>

<meta http-equiv="refresh" content="3;url=index.php" />

