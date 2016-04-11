<!DOCTYPE HTML>
    <html>
<head>
    <meta content="text/html; charset=utf-8" http-equiv="content-type">
    <title> Game Names</title>
</head>
<body>

<?php
// connect
require_once ('db.php');
//turn on SQL debugging
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION0);

// write the SQL SELECT query to get the data we want
$sql = "SELECT name FROM games";

// execute the queryand store the results
$cmd = $conn->prepare($sql);
$cmd -> execute();
$games = $cmd->fetchAll();

// loop through the results
foreach($games as $game) {

// display
echo $game['name'] . '<br />';
}
// disconnect
$conn = null;
?>

</body>
</html>