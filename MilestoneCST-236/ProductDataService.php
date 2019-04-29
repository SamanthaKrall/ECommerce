<?php 
require_once 'dbConnector.php';
require_once 'Product.php';

class ProductDataService {
    
    function findProduct($p) {
        $db = new dbConnector();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("Select product_id, product_name, product_picture FROM product WHERE product_name LIKE ?");
        
        $like_p = "%" . $p . "%";
        $stmt->bind_param("s", $like_p);
        $stmt->execute();
        
        $stmt->store_result();
        $stmt->bind_result($id, $product_name, $product_picture);
        $product_array = array();
        
        while ($product = $stmt->fetch()) {
            $p = new Product($id, $product_name, $product_picture);
            array_push($product_array, $p);
        }
        return $product_array;
    }
}

?>