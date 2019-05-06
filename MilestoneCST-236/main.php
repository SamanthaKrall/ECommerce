<?php
include 'dbConnector.php';
$db = new dbConnector();
$conn = $db->getConnection();
$query = "SELECT * FROM product";
require 'header.php';
?>
<html>
<body>

<h1>Welcome Back to the Shirt Shack</h1>
	<?php $result = $conn->query($query); ?>
	<div class="card-columns">
    	<?php while ($row = $result->fetch_assoc()): ?>
    		<div class="card text-white bg-dark mb-3" style="max-width: 540px;">
    			<div class="row no-gutters">
    				<div class="col-md-4">
  						<img src="Pictures/<?php echo $row['product_picture']; ?>.jpg" class="card-img-top" alt="...">
  					</div>
  					<div class="col-md-8">
  						<div class="card-body">
    						<h5 class="card-title"><?php echo $row['product_name'];?></h5>
    						<p class="card-text"><?php echo $row['product_price']?></p>
   				 			<a href="viewProduct.php?view=<?php echo $row['product_id']; ?>" class="btn btn-success">View</a>
  							<?php if ($_SESSION['role'] < 3) :?>
  								<input type="button" value="Delete" onclick="deleteProduct(this)" class="btn btn-danger">
  								<a href="updateProduct.php?update=<?php echo $row['product_id']; ?>" class="btn btn-warning">Update</a> 
  							<?php endif; ?>
  						</div>
  					</div>
  				</div>
			</div>
    	<?php endwhile; ?>
    </div>
	</table>
	<script type="text/javascript">
		function deleteProduct(btn) {
			var row = btn.parentNode.parentNode;
			row.parentNode.removeChild(row);
		}
	</script>
</body>
</html>