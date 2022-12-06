<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

$connectQuery = mysqli_connect($servername,$username,$password,$dbname);

if (!$connectQuery) {
    die("Connection failed: " . mysqli_connect_error());
} 

$selectQuery = "SELECT * FROM `category`";
$result = mysqli_query($connectQuery,$selectQuery);

echo "<table>
            <tr>
            <th> id </th>
            <th> name </th>
            <th></th>
            <th> </th>
            <th> </th>
            <th>  </th>
            <th>  </th>
            </tr>";
    foreach ($result as $row) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
       
        echo "</tr>";
    }