<?php
include 'css.css';
include 'dbConnector.php';
$db = new dbConnector();
$conn = $db->getConnection();
$query = "SELECT * FROM product";
$low = 0;
$high = 10;
?>
<html>
<body>

<h1>Welcome Back to the Shirt Shack</h1>
<div class="topnav">
	<a href="logout.php"><button>Logout</button></a>
</div>
	<form action="SearchHandler.php">
		Search for an item:
		<input type="text" name="searchValue">
		<input type="submit" value="Search">
	</form><br><br>
	<?php $result = $conn->query($query); ?>
	<table class="preview">
    	<tr>
    		<th>Picture</th>
    		<th>Name</th>
    		<th>Price</th>
    		<th>View</th>
    	</tr>
    	<?php while ($row = $result->fetch_assoc()): ?>
            	<tr>
            		<td><img src="Pictures/<?php echo $row['product_picture']; ?>.jpg" style="width: 150px; height: 150px"></td>
            		<td> <?php echo $row["product_name"]; ?> </td>
            		<td> <?php echo $row["product_price"]; ?> </td>
            		<td> <a href="viewProduct.php?view=<?php echo $row['product_id']; ?>" class="view"><button>View</button></a> </td>
            	</tr>
    	<?php endwhile; ?>
	</table>
</body>
</html>