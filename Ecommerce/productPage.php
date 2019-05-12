<?php 
require_once 'db_connector.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$db = new db_connector();
$connection = $db->getConnection();
?>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<meta http-equiv="X-UA-Compatible" content="ie=edge"> 
		<title>Item Information</title> 
		<link rel="stylesheet" href="loginStyle.css">
	</head>
	<body>
		<table class = "productInfo">
			<tr>
				<td>Name</td>
				<td>Description</td>
				<td>Price</td>
				<?php 
				$id = $_POST['id'];
				$sql_query = "SELECT * FROM product WHERE product_id = '$id'";
				$result = $connection->query($sql_query);
				$product_array = array();
				while($product = $result->fetch_assoc()){
				    array_push($product_array,$product);
				}
				for($x = 0; $x < count($product_array); $x++){
				    echo "<tr>";
				    echo "<td>" . $product_array[$x]['product_name'] . "</td>";
				    echo "<td>" . $product_array[$x]['product_description'] .  "</td>";
				    echo "<td>$" . $product_array[$x]['product_price'] . "</td>";
				    echo "<img src='Pictures/" . $product_array[$x]['product_picture'] . ".jpg' height='400' width='400' align='right'>";
				?>
				<form action="shoppingCart.php" method = "POST">
                    <input type="text" name="quantity" value =""></input>
                    <input type = "hidden" name = "id" value = " <?php echo $products[$x]['product_id'] ?> "></input>
                    <button type = "submit" class="button">Add to Cart</button>
                </form>
				<?php } ?>
			</tr>

		 </table>
	</body>
</html>