
<form method="post">
	<p>Product id</p><input type="text" name="product_id">
	<p>Product type code</p><input type="text" name="product_type_code">
	<p>Supplier id</p><input type="text" name="supplier_id">
	<p>Product name</p><input type="text" name="product_name">
	<p>Product price</p><input type="text" name="product_price">
	<p>Other product details</p><input type="text" name="other_product_details">
<input type="submit" name="submit" value="Create">




</form>


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
    } 
    echo "Connected successfully";
/*$conn = mysqli_connect("localhost", "root", "Kadouri0204 "); // Establishing Connection with Server
$db = mysqli_select_db("stardunks", $conn); // Selecting Database from Server*/

if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL
$productId = $_POST['product_id'];
$productTypeCode = $_POST['product_type_code'];
$supplierId = $_POST['supplier_id'];
$productName = $_POST['product_name'];
$productPrice = $_POST['product_price'];
$otherProductDetails = $_POST['other_product_details'];
if($productId !=''||$productName !=''){
//Insert Query of SQL
$query = mysqli_query($conn, "INSERT INTO `products`(`product_id`, `product_type_code`, `supplier_id`, `product_name`, `product_price`, `other_product_details`) VALUES ('$productId','$productTypeCode','$supplierId','$productName','$productPrice','$otherProductDetails')");
echo "<br/><br/><span>Data Inserted successfully...!!</span>";
}
else{
echo "<p>Insertion Failed <br/> Some Fields are Blank....!!</p>";
}
}
mysqli_close($conn); // Closing Connection with Server
?>
