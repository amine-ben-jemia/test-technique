<!DOCTYPE html>
<html>
<head>
	<title>Products list</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<?php

echo "<h2>Liste des produits</h2>";
?>

 <div class="container">

 	<div class="row">

<?php

$get_file = file_get_contents('https://SH97SWJXX4NIXZ8ZELVFQ1EXZERWMT8N@la-mode.shop/api/products/?output_format=JSON');


$product_id = json_decode($get_file);

foreach ($product_id as $key => $value) {

	foreach ($value as $key => $id) {

		$get_file = file_get_contents('https://SH97SWJXX4NIXZ8ZELVFQ1EXZERWMT8N@la-mode.shop/api/products/'.$id->id.'/?output_format=JSON');

		$products = json_decode($get_file);


		foreach ($products  as $key => $product) {

			?>

	<div class="col-sm-12 col-md-4 mb-4">


<div class="card" style="width: 18rem;">
  <img src="https://SH97SWJXX4NIXZ8ZELVFQ1EXZERWMT8N@la-mode.shop/api/images/products/<?php echo $product->id.'/'.$product->id_default_image; ?>" class="card-img-top" alt="..." style="width: 250px; height: 300px;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $product->name; ?></h5>
    <p class="card-text">Prix : <?php echo $product->price; ?><br><?php echo $product->meta_description; ?></p>
    <a href="product-details.php?prod_id=<?php echo $product->id; ?>" class="btn btn-primary">Détails</a>
  </div>
</div>

 
   </div>


			<?php

		}


		?>

		<?php
	}

}


?>

</div>
</div>
</body>
</html>