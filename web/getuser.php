<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
require "user.php";
$q = intval($_GET['q']);
/*
$con = mysqli_connect('localhost','peter','abc123','my_db');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM user WHERE id = '".$q."'";
*/
$result = query("SELECT * FROM user WHERE id = '".$q."';");//mysqli_query($con,$sql);

echo "<table>
<tr>
<th>id</th>
<th>Name</th>
<th>Email</th>
<th>Password</th>
<th>School_id</th>
</tr>";
while($row = getArray($result)) {
    echo "<tr>";
    echo "<td>" . $row[0] . "</td>";
    echo "<td>" . $row[1] . "</td>";
    echo "<td>" . $row[2] . "</td>";
    echo "<td>" . $row[3] . "</td>";
    echo "<td>" . $row[4] . "</td>";
    echo "</tr>";
}
echo "</table>";
//mysqli_close($con);
?>
</body>
</html>