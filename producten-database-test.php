<?php
  $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname   = 'gebruikers';

    // Create connection
    $conn = new mysqli($servername, $username, $password,$dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    echo "Connected successfully";
    echo "<br>";


$sql = 'SELECT column_name from information_schema.columns where table_schema = "stardunks" and table_name = "products"; 
';
$result = $conn->query($sql);
$row="";

?>

<?php
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		echo $row['column_name'];
		echo "<br>";
	}
}
?>