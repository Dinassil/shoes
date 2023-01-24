<!DOCTYPE html> 
<html lang="en">

<head>
    <meta charset = "UTF-8">
    <meta http-equiv="X-UA-Compatible" content = "IE = edge">
    <meta name = "viewport" content = "width = deivce-width,initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <title>Filter</title>
    <style>
        table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>

<body>
<table>
<tr>
<th>id</th>
<th>name</th>
<th>category</th>
<th>season</th>
<th>manufacturer</th>

</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "mydb");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id, name, category,season,manufacturer FROM filter";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"] . "</td><td>"
. $row["category"]. "</td><td>" . $row["season"]. "</td><td>". $row["manufacturer"]."   </td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
</body>
    </html>

    <?php 
    $servername = "127.0.0.1";
    $database="mydb";
    $username = "root";
    $password = "";
    $conn = mysqli_connect($servername, $username, $password, $database);
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}







$firstSelect = "SELECT distinct category from filter";
$result = $conn->query($firstSelect);
while ($row = mysqli_fetch_array($result)) {
    $rows[] = $row;
}
print "<form method='POST' action='first_select.php' >";
print "<select name = 'category' onchange='this.form.submit()''>";
print "<option value='Не выбрано'>Не выбрано</option>";
foreach ($rows as $row) {
    print "<option value='" . $row['category'] . "'>" . $row['category'] . "</option>";
}
print "</select>";
?>