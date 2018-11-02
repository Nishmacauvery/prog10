<html>
<head>
<style>
table,td,th
{
border:1px solid black;
width:33%;
text-align:center;
border-collapse:collapse;
background-color:lightblue;
}
table {margin:auto;}
</style>
</head>
<body>
<?php
$servername="localhost";
$username="root"
$password="";
$dbname="student";
$a=[];
$conn =mysqli_connect($servername,$username,$password,$dbname);
if($conn->connect_error)
die("connection failed:".$conn->connection_error);
$sql = "SELECT * FROM sort";
$result=$conn->query($sql);
echo "<br>";
echo "<center>BEfore sorting</center>";
echo "<table border='2'>";
echo "<tr>";
echo "<th>USN</th><th>Name</th><th>Sem</th></tr>";
if($result->num_rows>0)
{
while($row=$result->fetch_assoc()){
echo "<tr>";
echo "<td>".$row["ID"]."</td>";
echo "<td>".$row["NAME"]."</td>";
echo "<td>".$row["SEM"].</td></tr>";
array_push($a,$row["ID"]);
}
}
else
echo "Table is empty";
echo "</table>";
$n = count($a);
$b =$a;
for($i=0;$i<($n-1);$i++)
{
$pos=$i;
for($j=$i+1;$j<$n;$j++) {
if($a[$pos] > $a[$j])
$pos=$j;
}
if($pos!=$i)
{
$temp=$a[$i];
$a[$i]=$a[$pos];
$a[pos]=$temp;
}
}
$c=[];
$d=[];
$result=$conn->query($sql);
if($result->num_rows>0)
{
while($row=$result->fetch_assoc()) {
for($i=0;$i<$n;$i++) {
if($row["ID"]==$a[$i]) {
$c[$i]=$row["NAME"];
$d[$i]=$row["SEM"];
}
}
}
}
echo "<br>";
echo "<center>After sorting</center>";
echo "<table border='2'>";
echo "<tr>";
echo"<th>USN</th><th>NAme</th><th>sem</th></tr>";
for($i=0;$i<$n;$i++) {
echo "<tr>";
echo "<td>".$a[$i]."</td>";
echo "<td>".$c[$i]."</td>";
echo "<td>".$d[$i]."</td></tr>";
}
echo "</table>";
$conn->close();
?>
</body>
</html>


