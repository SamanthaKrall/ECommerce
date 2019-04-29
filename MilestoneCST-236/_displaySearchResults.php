<?php
include 'css.css';
?>
<body>
<table>
	<thead>
		<td>Image</td>
		<td>Product Name</td>
	</thead>
	<?php 
	for ($x = 0; $x < count($product); $x++) {
	    echo "<tr>";
	    echo "<td><img src='Pictures/" . $product[$x]->getProduct_picture() . ".jpg' style='width: 100px; height: 100px'></td>"; 
	    echo "<td>" . $product[$x]->getProduct_name() . "</td>";
	    echo "</tr>";
	}
	?>
</table>
</body>