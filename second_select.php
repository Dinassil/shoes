<?php 
$servername = "127.0.0.1";
$database = "mydb";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);

$season = $_POST["season"];
$category = $_COOKIE['prod'];

echo "Выбранная категория - " . $category . "<br>";
echo "Выбранный сезон - " . $season;

setcookie('gen', $season, time()+3600, "/");

    $thirdSelect = "SELECT distinct manufacturer FROM filter where category = '$category' and season='$season'";
    $thirdresult = $conn->query($thirdSelect);

    while ($row = mysqli_fetch_array($thirdresult)) {
        $rows[] = $row;
    }
    print "<form method='POST' action='third_select.php'>";
    print "<select name = 'manufacturer' onchange='this.form.submit()''>";
    print "<option value='Не выбрано'>Не выбрано</option>";
    foreach ($rows as $row) {
        print "<option value='" . $row['manufacturer'] . "'>" . $row['manufacturer'] . "</option>";
    }
    print "</select>";
?>