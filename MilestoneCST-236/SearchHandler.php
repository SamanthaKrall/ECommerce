<?php
include 'css.css';
require_once 'BusinessService.php';
$searchPhrase = $_GET['searchValue'];
$bs= new BusinessService();

$product = $bs->findProduct($searchPhrase);

?>
<div class="topnav">
	<a href="main.php"><button>Main Page</button></a>
	<a href="logout.php"><button>Logout</button></a>
</div>
<h2>Search Results</h2>
<p>Here is what we found</p>
<?php 
if ($product) {
    include '_displaySearchResults.php';
} else {
    echo "Sorry, but we don't have any matches currently<br>";
}
?>