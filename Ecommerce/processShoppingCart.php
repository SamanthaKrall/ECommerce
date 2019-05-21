<?php
require_once 'db_connector.php';
require_once 'CardBusinessTransactionService.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class processShoppingCart{
    public function addProductID($id){
        $db = new db_connector();
        $conn = $db->getConnection();
        $stmt = "INSERT INTO order (user_id) VALUES ('$id')";
        $result = mysqli_query($conn, $stmt);
        $ordered = "SELECT * FROM order WHERE OID = LAST_INSERT_ID()";
        $result2 = mysqli_query($conn, $ordered);
        if($result2){
            while($row = mysqli_fetch_assoc($result2)){
                $orderID = $_SESSION['orderID'] = $row['OID'];
                return $orderID;
            }
        }
    }
    public function getCurrentOrder($oid){
        $db = new db_connector();
        $conn = $db->getConnection();
        $pastorders = "SELECT * FROM orderList (product_id, product_quantity, order_id) 
                        VALUES ('$pid',  '$quantity', '$orderID')";
        $result3 = $conn->query($insert);
        $pastorderquery = $conn->query($pastorders);
        return $pastorderquery;
    }
    public function getPName($productID){
        $db = new db_connector();
        $conn = $db->getConnection();
        $getnamequery = "SELECT * FROM product 
                            WHERE product_id = '$productID' ";
        $result4 = $conn->query($getnamequery);
        if($result4) {
            $name_array = array();
            while($order = $result4->fetch_assoc()){
                array_push($name_array, $order);
            }
            if($name_array){
                for($x - 0; $x < count($name_array); $x++){
                    $name = $name_array[$x]['product_name'];
                }
            }
            return $name;
        } else {
            $name = "No name found";
            return $name;
        }
    }
    public function getPrice(){
        $db = new db_connector();
        $conn = $db->getConnection();
        $stmt = "SELECT orderList.order_id, orderList.product_quantity, product.product_price, product.product_id
                    FROM orderList     
                    LEFT JOIN product
                    ON orderList.product_id = product.product_id";
        $result5 = $conn->query($stmt);
        if($result5){
            $price_array = array();
            while($price = $result5->fetch_assoc()){
                array_push($price_array, $price);
            }
            $total = 0;
            $curr = 0;
            for($x = 0; $x < count($price_array); $x++){
                if($price_array[$x]['order_id'] == $_SESSION['orderID']){
                    $curr = ((float) $price_array[$x]['product_price'] * (float) $price_array[$x]['product_quantity']);
                    $total = $total + $curr;
                    $curr = 0;
                }
            }
            echo "$" . $total;
            return $total;
        }
    }
    public function insert($pid, $quantity) {
        $db = new db_connector();
        $conn = $db->getConnection();
        $orderID = $_SESSION['orderID'];
        $insert = "INSERT INTO orderList (product_id, product_quantity, order_id)
                    VALUES ('$pid', '$quantity', '$orderID')";
        $pastorders = "SELECT * FROM orderList WHERE order_id = $orderID";
        $result = $conn->query($insert);
        $pastorderquery = $conn->query($pastorders);
        return $pastorderquery;
    }
}