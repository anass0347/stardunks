<?php
 $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname   = 'stardunks';

    // Create connection
    $conn = new mysqli($servername, $username, $password,$dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else{
    echo "Connected successfully";
	}
$invoer = $_GET['invoer'];

$raw_results = mysqli_query($conn, "SELECT * FROM products
            WHERE (`product_name` LIKE '%".$invoer."%')") or die(mysql_error());

echo "<br>";
echo "Gezocht op:" . $invoer;
echo "<table border='1px'>";
/*echo "<tr>";
echo "<td>". "Naam" ."</td>";
echo "<td>". "Prijs" ."</td>";
echo "</tr>";
*/
if(mysqli_num_rows($raw_results) > 0){ 
            while($results = mysqli_fetch_array($raw_results)){
				echo "<tr>";
				echo "<td>".$results['product_name']. "</td>";
				echo "<td>".$results['product_price']. "</td>";
				echo "</tr>";
				
             
                //echo "<p><h3>".$results['product_name']."</h3>"."</p>";
                
            }
             
        }
        else{ 
            echo "<br>" . "No results";
			echo "<img src='https://media.gifs.nl/the-godfather-gifs-sF3gj7.gif' />";
			
			
        }
       echo "</table>"
    
    
?>