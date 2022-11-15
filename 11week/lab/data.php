<?php
try {
$connString = "mysql:host=db;port=3306;dbname=bookrepo";
$user = "root";
$pass = "testuser";

$pdo = new PDO($connString, $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "select * from Categories order by CategoryName";
$result = $pdo->query($sql);

while($row = $result->fetch()) {
echo $row['ID']."-".$row['CategoryName']."<br/>";
}



$pdo = null;
}
catch(PDOException $e) {
die($e->getMessage());
}



?>

<form method="post" action="./rename.php">
<input type="text" name="old"/><br/>
<input type="text" name="new"/><br/>
<input type="submit" />
</form>

