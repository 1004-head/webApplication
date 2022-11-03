<html>
<body>

<p> Hello the time is <?php echo date("H:i:s"); ?> </p>
<p> POST VALUES: </p>

<?php

$temp = $_POST['name'];

echo $temp;

?>
</body>
</html>