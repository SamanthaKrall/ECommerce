 <?php 
 require_once 'db_connector.php';
 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);
 ?>
 <html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<meta http-equiv="X-UA-Compatible" content="ie=edge"> 
        <link rel="stylesheet" href="loginStyle.css"> 
	</head>
	<body>
 <?php
 session_start();
 $id = $_SESSION['id'];
 $pid = $_POST['id'];
 $quantity = $_POST['quantity'];
 $db = new db_connector();
 $connection = $db->getConnection();
 $sql_statement = "INSERT INTO Order (userID) VALUES '$id'";
 $result = mysqli_query($connection, $sql_statement);
 $ordered = "SELECT * FROM Order WHERE OID = LAST_INSERT_ID()";
 $result2 = mysqli_query($connection, $ordered);
 if($result2){
     while($row = mysqli_fetch_assoc($result2)) {
        $orderID =  $_SESSION['orderID'] = $row['OID'];  
     }
 }
 $insert = "INSERT INTO orderList (productID, pQuantity, orderID) VALUES('$pid', '$quantity', '$orderID')";
 $pastorders = "SELECT * FROM orderList WHERE OLID = LAST_INSERT_ID()";
 $result3 = $connection->query($insert);
 $pastorderquery = $connection->query($pastorders);
 if($pastorderquery){
        $cart_array = array();
        while($order = $pastorderquery->fetch_assoc()){
            array_push($cart_array,$order);
        }
        if($cart_array){
            ?>
            <table class="ttext" style="width:100%">
    			<tr>
        			<td>Order List Row ID</td>
        			<td>Product ID</td>
        			<td>Product Quantity</td>
        			<td>Order ID</td>
                </tr>
            <?php 
            for($x = 0; $x < count($cart_array); $x++){
                echo "<td>" . $cart_array[$x]['OLID'] . "</td>";
                echo "<td>" . $cart_array[$x]['productID'] . "</td>";
                echo "<td>" . $cart_array[$x]['PQuantity'] .  "</td>";
                echo "<td>" . $cart_array[$x]['orderID'] . "</td>";
            }
        }
 } else{
     echo "Your cart is empty!";
 }
?>
        </table> 
	</body>
</html>