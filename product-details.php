<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	</head>
	<div class="container" style="margin-top: 70px;">
		<h2>Produit</h2>
		<hr class="mb-5">
		<div class="row">
			<?php
			if (isset($_GET['prod_id']) && !empty($_GET['prod_id'])) {
				$prod_id = $_GET['prod_id'];
				$get_file = file_get_contents('https://SH97SWJXX4NIXZ8ZELVFQ1EXZERWMT8N@la-mode.shop/api/products/'.$prod_id.'/?output_format=JSON');
				$product = json_decode($get_file);
				foreach ($product as $key =>$value) {?>
					<div class ="col-sm-12 col-md-6" >
						<div class="image">
							<img src="https://la-mode.shop/api/images/products/<?php echo $value->id.'/'.$value->id_default_image; ?>" width="200">
						</div>
					</div>
					<div class ="col-sm-12 col-md-6">
						<div class="product-flex" style="display: flex; flex-direction: column;">
							<h4>
								<?php echo $value->name; ?>
							</h4>
							<span>
								<?php echo $value->price; ?>
							</span>
							<span>
								<?php echo $value->meta_description; ?>
							</span>
						</div>
					</div>
					<div class="col-sm-12 col-md-12" style="margin-top: 100px;">
						<?php 
						foreach ($value->associations->images as $key =>$image) {
						?>
							<img src="https://la-mode.shop/api/images/products/<?php echo $value->id.'/'.$image->id ?>" width="200">
						<?php
						}
					}
					?>
					</div>
			<?php } else {echo 'error';}?>
		</div>
		
	</div>

</html>
