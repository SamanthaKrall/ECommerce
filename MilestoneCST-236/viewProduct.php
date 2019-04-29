<?php
include 'css.css';
include 'dbConnector.php';
$db = new dbConnector();
$conn = $db->getConnection();
$id = $_GET['view'];
$query = "SELECT * FROM product WHERE product_id = $id";

?>
<html>
<body>
	<div class="topnav">
		<a href="main.php"><button>Main Page</button></a>
		<a href="logout.php"><button>Logout</button></a>
	</div>
	<br>
	<?php $result = $conn->query($query); ?>
	<?php while ($row = $result->fetch_assoc()): ?>
	<div>
		<p style="font-size: 70px"><?php echo $row['product_name']; ?></p>
		<p style="font-size: 40px"><?php echo $row['product_description']; ?></p>
		<p style="font-size: 40px; border: 1px solid;">$<?php echo $row['product_price']; ?></p>
		<img class="right" src="Pictures/<?php echo $row['product_picture']; ?>.jpg" style="width: 300px; height: 300px"><br>
	</div>
	<?php endwhile; ?>
</body>
</html>