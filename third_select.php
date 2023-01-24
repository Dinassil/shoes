<?php
    $servername = "127.0.0.1";
    $database = "mydb";
    $username = "root";
    $password = "";
    
    $conn = mysqli_connect($servername, $username, $password, $database);
    
    $manufacturer = $_POST["manufacturer"];
    $category = $_COOKIE['prod'];
    $season = $_COOKIE['gen'];

    echo "Выбранная категория - " . $category . "<br>";
    echo "Выбранный сезон - " . $season. "<br>";
    echo "Выбранный производитель - " . $manufacturer;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $result = $conn->query("SELECT * FROM `filter` where category = '$category' and season='$season' and manufacturer='$manufacturer'");
    while($row = $result->fetch_assoc())
    {
        echo '<p>Наименование обуви - '.$row['name']. '</p>';
    }
    ?>
</body>
</html>