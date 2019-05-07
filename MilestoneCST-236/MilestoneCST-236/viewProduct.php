<?php
require 'header.php';
include 'dbConnector.php';
$db = new dbConnector();
$conn = $db->getConnection();
$id = $_GET['view'];
$query = "SELECT * FROM product WHERE product_id = $id";

?>
<html>
<body>
	<?php $result = $conn->query($query); ?>
	<?php while ($row = $result->fetch_assoc()): ?>
	<div>
		<br>
		<img src="Pictures/<?php echo $row['product_picture']; ?>.jpg" style="width: 300px; height: 300px"><br>
		<p style="font-size: 70px"><?php echo $row['product_name']; ?></p>
		<p style="font-size: 20px"><?php echo $row['product_description']; ?></p>
		<p style="font-size: 40px; border: 1px solid;">$<?php echo $row['product_price']; ?></p>
	</div>
	<?php endwhile; ?>
</body>
</html>