
<?php

$singleItemID = $_GET['id'];
$productDB = DBproduct($link, $singleItemID);

if (mysqli_num_rows($productDB)) {
    while($itemRow = mysqli_fetch_object($productDB)) {
            $sku = $itemRow->sku;
            $category = $itemRow->category;
			$name = $itemRow->name;
			$desc = $itemRow->description;
			$rating = $itemRow->rating;
			$countOfRatings = $itemRow->countOfRatings;
			$stock = $itemRow->stock;
			$numOfPictures = $itemRow->pictures;
			if ($itemRow->discount && ($itemRow->discountTime == 0 || $itemRow->discountTime >= date("Y-m-d"))) {
				$price = webshopNumberFormat($itemRow->discount) . " FT.-";
				$DBprice = $itemRow->discount;
				$origPrice = webshopNumberFormat($itemRow->price) . " FT.-";
			} else {
				$price = webshopNumberFormat($itemRow->price) . " FT.-";
				$DBprice = $itemRow->price;
				$origPrice = NULL;
            }
    }
} else {
	?>
		<script>
			location.replace("/");
		</script>
    <?php
}
$colorPost = $_POST['color'];
$sizePost = $_POST['size'];
$cartSelect = "SELECT * FROM cart";
$cartRes = mysqli_query($link, $cartSelect);
$isProductAlreadyExsist = false;
if (mysqli_num_rows($cartRes)) {
    while($cartFilterRow = mysqli_fetch_object($cartRes)) {
		$productQuantity = intval($cartFilterRow->quantity);
		if (intval($singleItemID) == intval($cartFilterRow->productID) && $cartFilterRow->color == $colorPost && $sizePost == $cartFilterRow->size) {
			$isProductAlreadyExsist = true;
			break;
		} else {
			$isProductAlreadyExsist = false;
		}
	}
}
?>
	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="/" class="stext-109 cl8 hov-cl1 trans-04">
				Főoldal
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<a href="/aruhaz" class="stext-109 cl8 hov-cl1 trans-04">
				Áruház
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>
			<div class="filter-tope-group">
			<a href="/aruhaz" class="stext-109 cl8 hov-cl1 trans-04 " data-filter=". <?php echo $category; ?>" onclick="localStorage.setItem('category', '<?php echo $category; ?>')">
				<?php echo getRealName($category); ?>
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>
			</div>
			<span class="stext-109 cl4">
				<?php echo $name; ?>
			</span
		</div>
	</div>
		

	<!-- Product Detail -->
	<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

							<div class="slick3 gallery-lb">
								<?php
								
								for ($i = 1; $i < (int)$numOfPictures+1; $i++) {
								
								?>
								<div class="item-slick3" data-thumb="images/<?php echo $sku; ?>/product<?php echo $i; ?>.jpg">
									<div class="wrap-pic-w pos-relative">
										
										<img src="images/<?php echo $sku; ?>/product<?php echo $i; ?>.jpg">
										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/<?php echo $sku; ?>/product<?php echo $i; ?>.jpg">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>

								<?php
								}
								?>

							</div>
						</div>
					</div>
				</div>
					
				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<div style="display:flex;flex-direction:column">
							<h4 class="mtext-105 cl2 js-name-detail p-b-14">
								<?php echo $name; ?>
							</h4>

							<span class="mtext-106 cl2">
								<ins><?php echo $price; ?></ins> &nbsp; <del><?php echo $origPrice; ?></del>
							</span>
							<span class="fs-18 cl11">
														<?php 
														$csillag = 0;
														for ($i = 0; $i < round($rating / $countOfRatings);$i++) {
															$csillag++;
															echo '<i class="zmdi zmdi-star p-r-2"></i>';
														}
														for ($i = 0; $i < 5 - $csillag; $i++) {
															echo  '<i class="item-rating zmdi zmdi-star-outline p-r-2"></i>';
														}
														
														?>
		
												
										</span>
										<span>
											<?php echo ((int)$stock > 0) ? "<div style='color:white;
																						background-color:green;
																						border-radius:5px;
																						font-weight:100;
																						position: absolute;
																						font-family: Poppins-Regular;
																						'>&nbspRaktáron&nbsp
																			</div>" 
																			: 
																			"<div style='color:white;
																						background-color:red;
																						border-radius:5px;
																						font-weight:100;
																						position: absolute;
																						font-family: Poppins-Regular;
																						'>&nbspNincs Raktáron&nbsp</div>";  
											?>
											</span>
						</div>
						<form method="post">
						<!--  -->
						<div class="p-t-33">
							<div class="flex-w flex-r-m p-b-10">
								<div class="size-203 flex-c-m respon6">
									Méret
								</div>
								
								<div class="size-204 respon6-next">
									<div class="rs1-select2 bor8 bg0">
										<select class="js-select2" name="size">
										<?php
										$productDB = DBproduct($link, $singleItemID);
										if (mysqli_num_rows($productDB)) {
											while($sizeRow = mysqli_fetch_object($productDB)) {
												for ($i = 0; $i < count($size = explode(',', $sizeRow->size)); $i++) {
													$currSize = strtoupper($size[$i]);
													echo "<option>$currSize</option>";
												}
											}
										} else {
											echo "<option></option>";
										}
										?>
											
											
										</select>
										<div class="dropDownSelect2"></div>
									</div>
								</div>
							</div>

							<div class="flex-w flex-r-m p-b-10">
								<div class="size-203 flex-c-m respon6">
									Szín
								</div>

								<div class="size-204 respon6-next">
									<div class="rs1-select2 bor8 bg0">
										<select class="js-select2" name="color">
										<?php

										$productDB = DBproduct($link, $singleItemID);
										if (mysqli_num_rows($productDB)) {
											while($colorRow = mysqli_fetch_object($productDB)) {
												for ($i = 0; $i < count($color = explode(',', $colorRow->color)); $i++) {
													$currColor = getRealColor($color[$i]);
													echo "<option value='$currColor'>$currColor</option>";
												}
											}
										}
										?>
										</select>
										<div class="dropDownSelect2"></div>
									</div>
								</div>
							</div>
                            
							<div class="flex-w flex-r-m p-b-10">
								<div class="size-204 flex-w flex-m respon6-next">
									<div class="wrap-num-product flex-w m-r-20 m-tb-10">
										<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-minus"></i>
										</div>
                                
										<input id="num-product" name="num-product" class="mtext-104 cl3 txt-center num-product" type="number"  value="1">

										<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-plus"></i>
										</div>
									</div>
                                
									
									<input name="add_to_cart" type="submit" value="Kosárba" class="flex-c-m stext-101 cl0 size-101 pointer bg1 bor1 hov-btn1 p-lr-15 trans-04"/>
                                   
                                </form>
								</div>
							</div>	
						</div>
					</div>
				</div>
			</div>
<?php



	if (isset($_POST['add_to_cart']) && intval($_POST['num-product']) > 0) { 
		if (isset($_SESSION['loginSucces'])) {
			if ($isProductAlreadyExsist == false) {
				$productQuantity = $_POST['num-product'];
				$userID = $_SESSION["userID"];
				$_SESSION['cartNum'] += intval($_POST['num-product']);
				$colorPostTranslated = getRealColor($colorPost, $fromEnglishToHungarian = false);
				$sql = "INSERT INTO cart (productID, userID, name, sku, price, color, size, quantity)
				VALUES ('$singleItemID' , '$userID', '$name', '$sku', '$DBprice', '$colorPostTranslated', '$sizePost', '$productQuantity')";
				mysqli_query($link, $sql);
			} else {
				if (isset($_POST['num-product'])) {
					$productQuantity += $_POST['num-product'];
					
					$sql = "UPDATE cart SET quantity = $productQuantity WHERE productID = ($singleItemID) AND color = '$colorPost' AND size = '$sizePost'";
					mysqli_query($link, $sql);
				}
			}
		} else  {
			echo "<script>";
			echo "document.location.replace('/bejelentkezes');";
			echo "alert('Jelentkezzen be, vagy regisztráljon a kosárhoz adáshoz.');";
			echo "</script>";
			}
 } 


?>
			<div class="bor10 m-t-50 p-t-43 p-b-40">
				<!-- Tab01 -->
				<div class="tab01">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item p-b-10">
							<a class="nav-link active" data-toggle="tab" href="#description" role="tab">Leírás</a>
						</li>
						<li class="nav-item p-b-10">
							<a class="nav-link" data-toggle="tab" href="#sizetable" role="tab">Mérettáblázat</a>
						</li>
						<li class="nav-item p-b-10">
							<a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Értékelés</a>
						</li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content p-t-43">
						<div class="tab-pane fade" id="sizetable" role="tabpanel">
								<div class="how-pos2 p-lr-15-md">
									<?php
									
									echo "<img align='middle' src='../images/sizetable/" . $category . ".jpg' 
									style='	width:70%;
											display: block;
											margin-left: auto;
											margin-right: auto;
											'>";
									
									?>
								</div>
							</div>

						<!-- - -->
						<div class="tab-pane fade show active" id="description" role="tabpanel">
							<div class="how-pos2 p-lr-15-md">
								<p class="stext-102 cl6">
									<?php
									echo $desc;
									
									?>
									</p>
							</div>
						</div>

<div class="tab-pane fade" id="reviews" role="tabpanel">
	<div class="row">
		<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
			<div class="p-b-30 m-lr-15-sm">

					
										
							<?php
							
							if (isset($_SESSION['loginSucces'])) {
								?>

										<!-- Add review -->
										<form class="w-full" method="post" action="/item?id=<?php echo $singleItemID ?>">
											<div class="p-b-45">
												<h3 class="ltext-106 cl5 txt-center">
												Szóljon hozzá!
												</h3>
											</div>


											<div class="flex-w flex-m p-t-50 p-b-23">
												<span class="stext-102 cl3 m-r-16">
													Értékelés
												</span>

												<span class="wrap-rating fs-18 cl11 pointer">
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<input class="dis-none" type="number" name="rating" id="rating">
													
												</span>
											</div>

											<div class="row p-b-25">
												<div class="col-12 p-b-5">
													<label class="stext-102 cl3" for="review">Hozzászólás</label>
													<textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" name="review"></textarea>
												</div>

												<div class="col-sm-6 p-b-5">
													<label class="stext-102 cl3" for="name">Név</label>
													<span><?php echo $_SESSION['username']; ?></span>
												</div>
											</div>
											<input type="submit" id="submit" value="Küldés" class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10 pointer">
											
										</form>
										<?php
											if ($_SERVER["REQUEST_METHOD"] == "POST" && (int)$_POST['rating'] != 0 && $_POST['review'] != "") {
												$userID = $_SESSION['userID'];
												$name = $_SESSION['username'];												
												$desc = $_POST['review'];
												$rating = (int)$_POST['rating'];
												$ratingInsert = "INSERT INTO review (name,userID,description,rating, itemID) VALUES ('$name', '$userID', '$desc', $rating, '$singleItemID')";
												mysqli_query($link, $ratingInsert);
												$updateSelect = "UPDATE product SET rating = rating + $rating, countOfRatings = countOfRatings + 1 WHERE id = '$singleItemID'";
												mysqli_query($link, $updateSelect);
											}
												
											?>
								<?php
							} else {
								?>
								<div class="p-b-45">
									<h3 class="ltext-106 cl5 txt-center">
									<a href="/bejelentkezes">Jelentkezzen be a hozzászóláshoz!</a>
									</h3>
								</div>
								
								<?php
							}
							?>
<?php

$revSelect = "SELECT * FROM review WHERE itemID = '$singleItemID'";
$revRes = mysqli_query($link, $revSelect);
if (mysqli_num_rows($revRes)) {
	while ($revRow = mysqli_fetch_object($revRes)) {
?>

				<div class="flex-w flex-t p-b-68">
					<div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
						<img src="images/avatar-01.jpg" alt="AVATAR">
					</div>

					<div class="size-207">
						<div class="flex-w flex-sb-m p-b-17">
							<span class="mtext-107 cl2 p-r-20">
								<?php echo $revRow->name; ?>
							</span>

							<span class="fs-18 cl11">
							<?php 
								$csillag = 0;
								for ($i = 0; $i < $revRow->rating;$i++) {
									$csillag++;
									echo '<i class="zmdi zmdi-star p-r-2"></i>';
								}
								for ($i = 0; $i < 5 - $csillag; $i++) {
									echo  '<i class="item-rating zmdi zmdi-star-outline p-r-2"></i>';
								}
								
							?>
							</span>
						</div>

						<p class="stext-102 cl6">
							
						<?php echo $revRow->description; ?>
						</p>
					</div>
				</div>



<?php
	}
}

?>
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	<!-- Related Products -->
	<section class="sec-relate-product bg0 p-t-45 p-b-105">
		<div class="container">
			<div class="p-b-45">
				<h3 class="ltext-106 cl5 txt-center">
					Kapcsolódó áruk
				</h3>
			</div>


			<div class="wrap-slick2">
				<div class="slick2">
<?php

$relatedSelect = "SELECT * FROM product WHERE category = ('$category') AND id != $singleItemID LIMIT 5";
$relatedRes = mysqli_query($link, $relatedSelect);
if (mysqli_num_rows($relatedRes)) {
	while ($relatedRow = mysqli_fetch_object($relatedRes)) {
		if ($relatedRow->discount && ($relatedRow->discountTime == 0 || $relatedRow->discountTime >= date("Y-m-d"))) {
			$price = webshopNumberFormat($relatedRow->discount) . " FT.-";
			$origPrice = webshopNumberFormat($relatedRow->price) . " FT.-";
		} else {
			$price = webshopNumberFormat($relatedRow->price) . " FT.-";
			$origPrice = NULL;
		}
?>
					<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-pic hov-img0">
								<img src="images/<?php echo $relatedRow->sku; ?>/product1.jpg" alt="IMG-PRODUCT">

								<a href="/item?id=<?php echo $relatedRow->id; ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
									Részletek
								</a>
							</div>
							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l">
									<a href="/item?id=<?php echo $relatedRow->id; ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									<?php echo $relatedRow->name; ?>
									</a>

									<span class="stext-105 cl3">
									<ins><?php echo $price; ?></ins> &nbsp; &nbsp;  <del><?php echo $origPrice; ?></del>
									</span>
									<span class="fs-18 cl11">
									<?php 
													if ((int)$relatedRow->countOfRatings > 0) {
													$csillag = 0;
													for ($i = 0; $i < round($relatedRow->rating / $relatedRow->countOfRatings);$i++) {
														$csillag++;
														echo '<i class="zmdi zmdi-star p-r-2"></i>';
													}
													for ($i = 0; $i < 5 - $csillag; $i++) {
														echo  '<i class="item-rating zmdi zmdi-star-outline p-r-2"></i>';
													}
												} else {
													echo  '<i class="item-rating zmdi zmdi-star-outline p-r-2"></i>';
													echo  '<i class="item-rating zmdi zmdi-star-outline p-r-2"></i>';
													echo  '<i class="item-rating zmdi zmdi-star-outline p-r-2"></i>';
													echo  '<i class="item-rating zmdi zmdi-star-outline p-r-2"></i>';
													echo  '<i class="item-rating zmdi zmdi-star-outline p-r-2"></i>';
												}
													?>
									</span>
								</div>
							</div>
						</div>
					</div>

<?php
	}
}

?>
				</div>
			</div>
		</div>
	</section>
</div>

