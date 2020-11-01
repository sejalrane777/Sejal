<?php include "controller/productController.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php foreach ($fetchProducts as $row) { ?>
		<p>Category:<?php echo $row['category'] ?></p>
		<p>Sub-Category:<?php echo $row['subCategory'] ?></p>
		<p>Product:<?php echo $row['product'] ?></p>
		<p>Price:<?php echo $row['price'] ?></p>
		<p>Description:<?php echo $row['description'] ?></p>
		<p>Size:<?php echo $row['size']; ?>
		<!-- <p>Size:<?php echo  $row['images']; ?> -->
		 <img src="sudo/uploads/products/<?php echo $row['image_1']; ?>" height ="300" width ="300">
		  <img src="sudo/uploads/products/<?php echo $row['image_2']; ?>" height ="300" width ="300">
		   <img src="sudo/uploads/products/<?php echo $row['image_3']; ?>" height ="300" width ="300">
		    <img src="sudo/uploads/products/<?php echo $row['image_4']; ?>" height ="300" width ="300">
		<?php } ?>
</body>
</html>