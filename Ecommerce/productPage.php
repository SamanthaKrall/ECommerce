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
		<section class="section">
			<div class="row">
				<div class="sixtcolumn">Name</div>
				<div class="sixtcolumn">Description</div>
				<div class="sixtcolumn">Price</div>
			</div>
			<div class="row">
				<?php 
				$id = $_POST['id'];
				$sql_query = "SELECT * FROM product WHERE product_id = '$id'";
				$result = $connection->query($sql_query);
				$product_array = array();
				while($product = $result->fetch_assoc()){
				    array_push($product_array,$product);
				}
				for($x = 0; $x < count($product_array); $x++){
				?>
				<div class="sixtcolumn">
					<?php echo $product_array[$x]['product_name'];?>
				</div>
				<div class="sixtcolumn">
					<?php echo $product_array[$x]['product_description'];?>
				</div>
				<div class="sixtcolumn">
					<?php echo "$" . $product_array[$x]['product_price'];?>
				</div>
				<div class="sixtcolumn">
					<?php echo "<img src='Pictures/" . $product_array[$x]['product_picture'] . ".jpg' height='400' width='400' align='right'>";?>
				</div>
				<?php } ?>
			</div>
		</section>
	</body>
</html>