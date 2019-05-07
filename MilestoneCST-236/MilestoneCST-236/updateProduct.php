<?php 
require_once 'dbConnector.php';
require 'header.php';
$db = new dbConnector();
$conn = $db->getConnection();
$id = $_GET['update'];
$query = "SELECT * FROM product WHERE product_id = $id LIMIT 1";
$result = $conn->query($query);
$row = $result->fetch_assoc();

?>
<html>
<body>
    <form method="post">
      <div class="form-row">
        <div class="col">
          <input type="text" class="form-control" placeholder="Product Name" name="name">
        </div>
        <div class="col">
          <input type="text" class="form-control" placeholder="Product Description" name="desc">
        </div>
        <div class="col">
        	<input type="text" class="form-control" placeholder="Product Price" name="price">
        </div>
        <input type="submit" formaction="updateHandler.php" value="Submit">
      </div>
    </form>
    <script>
		document.cookie = <?php $id ?>;
    </script>
</body>
</html>