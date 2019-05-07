<?php 
require_once 'dbConnector.php';
require_once 'Product.php';

class ProductDataService {
    
    function findProduct($p) {
        $db = new dbConnector();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("Select product_id, product_name, product_description, product_picture, product_price 
            FROM product 
            WHERE product_name LIKE ?");
        
        $like_p = "%" . $p . "%";
        $stmt->bind_param("s", $like_p);
        $stmt->execute();
        
        $stmt->store_result();
        $stmt->bind_result($id, $product_name, $product_description, $product_picture, $product_price);
        $product_array = array();
        
        while ($product = $stmt->fetch()) {
            $p = new Product($id, $product_name, $product_description, $product_picture, $product_price);
            array_push($product_array, $p);
        }
        return $product_array;
    }
}
function updateOne($id) {
    $db = new dbConnector();
    $connection = $db->getConnection();
    $stmt = $connection->prepare("UPDATE product SET product_name = ?, product_description = ?, product_picture = ?, product_price = ? 
        WHERE ID = ? 
        LIMIT 1");
    if (!$stmt) {
        echo "Something went wrong in the binding process";
        exit;
    }
    $pn = $product->getProductName();
    $pd = $product->getProductDescription();
    $pp = $product->getProductPicture();
    $ppr = $product->getProductPrice();
    
    $stmt->bind_param("ssi", $pn, $pd, $pp, $ppr, $id);
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        return true;
    } else {
        return false;
    }
}
function deleteItem($id) {
    $db = new dbConnector();
    $connection = $db->getConnection();
    $stmt = $connection->prepare("DELETE FROM product 
        WHERE ID = ? 
        LIMIT 1");
    if (!$stmt) {
        echo "Something went wrong in the binding process";
        exit;
    }
    $stmt->bind_param("s", $id);
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        return true;
    } else {
        return false;
    }
}

?>