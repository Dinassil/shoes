<?php
$servername = "127.0.0.1";
$database = "mydb";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$category = $_POST["category"];
echo "Выбранная категория - " . $category;

setcookie('prod', $category, time() + 3600, "/");

$secondSelect = "SELECT distinct season FROM filter where category = '$category'";
$secondresult = $conn->query($secondSelect);

while ($row = mysqli_fetch_array($secondresult)) {
    $rows[] = $row;
}
print "<form method='POST' action='second_select.php'>";
print "<select name = 'season' onchange='this.form.submit()''>";
print "<option value='Не выбрано'>Не выбрано</option>";
foreach ($rows as $row) {
    print "<option value='" . $row['season'] . "'>" . $row['season'] . "</option>";
}
print "</select>";

$season = $_POST["season"];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>

</body>

</html>