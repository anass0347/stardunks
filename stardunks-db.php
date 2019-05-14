<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<style>
	
	
	
input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  width: 10%;
  background: #f1f1f1;
}
 form button {
  width: 3%;
  padding: 10px;
  background: #2196F3;
  color: white;
  font-size: 18px;
  border: 1px solid grey;
  border-left: none; /* Prevent double borders */
  cursor: pointer;
}
	
	
	
button:hover {
  background: #0b7dda;
}

</style>

<?php

function connectDatabase($servername, $username, $password, $dbname, $sql){

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }else {
        echo "Connected successfully";
        echo "<br>";
    }

    $sql = 'SELECT * FROM products';
    $result = $conn->query($sql);

    return $result;
}

//connectDatabase("localhost", "root", "", "stardunks", "SELECT * FROM products");

$dataArray = connectDatabase("localhost", "root", "", "stardunks", "SELECT * FROM products")
?>
<h1>Read Products</h1>
<div class="search">
<form method="get" action="zoekmachine-db.php?go" id="zoekmachine">
<input type="text" name="invoer">
	<button type="submit" name="submit" value="zoeken"><i class="fa fa-search"></i></button>
</form>
	</div>
	<div class="maken">
<form method="post" action="insertdb-producten.php">
<input type="submit" name="submit" value="Create new product">
		
</form>
</div>
		
	<table border=1px>	

	<tr><th>product_id</th>
	<th>product_type_code</th>
	<th>supplier_id</th>
	<th>product_name</th>
	<th>product_price</th>
	<th>other_product_details</th>
	<th>Actions</th></tr>
<?php

function createHtml($dataArray)
{
    if (mysqli_num_rows($dataArray) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($dataArray)) {
            $row['product_price'] = str_replace('.', ',', $row['product_price']);
            echo "<tr>";
            echo "<td>" . $row['product_id'] . "</td>";
            echo "<td>" . $row['product_type_code'] . "</td>";
            echo "<td>" . $row['supplier_id'] . "</td>";
            echo "<td>" . $row['product_name'] . "</td>";
            echo "<td> €" . $row['product_price'] . "</td>";
            echo "<td>" . $row['other_product_details'] . "</td>";
            echo "<td>" . "<button><i class='fa fa-book'></i> Read</button>" . "<button><i class='fa fa-pencil'></i> Update</button>" . "<button><i class='fa fa-trash'></i> Delete</button>" . "</td>";
            echo "</tr>";
        }
    }

}
createHtml($dataArray);

?>
</table>