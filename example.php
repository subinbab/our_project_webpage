<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
}
</style>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "youtube";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)  {
    die("Connection failed: " . $conn->connect_error);
} 
//MySQL query goes here
$sql = "your query";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "<table>
    <tr>
    <th>table heading</th> <!This is HTML table heading>
    </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>" . $row["table data"]. "</td> <!This is HTML table data>
        </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?> 
</body>
</html>