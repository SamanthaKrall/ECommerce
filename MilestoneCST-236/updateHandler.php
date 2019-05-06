<?php 
include 'dbConnector.php';
require 'header.php';

$name = $_POST['name'];
$desc = $_POST['desc'];
$price = $_POST['price'];
$db = new dbConnector();
$conn = $db->getConnection();
$query = $conn->prepare("UPDATE product 
    SET product_name = ?,
     product_description = ?,
     product_price = ?
    WHERE product_id = ?");
$query->bind_param("ssdi", $name, $desc, $price, $id);
$query->execute();
?>
<html>
<body>
	<h1>Record has been updated!</h1>
</body>
<script type="text/javascript">
	var id = document.cookie;
	<?php $id ?> = id;
</script>
</html>