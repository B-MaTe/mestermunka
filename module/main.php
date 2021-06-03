
	<!-- Slider -->
	<section class="section-slide">
		<div class="wrap-slick1 rs1-slick1">
			<div class="slick1">
				<div class="item-slick1" style="background-image: url(images/slide-0<?php echo rand(4,7); ?>.jpg);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30">
							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-202 cl2 respon2">
									Férfi Kollekció
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
								<h2 class="ltext-104 cl2 p-t-19 p-b-43 respon1">
									Új Áruk
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
								<a href="/aruhaz" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Áruház
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="item-slick1" style="background-image: url(images/slide-0<?php echo rand(1,3); ?>.jpg);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30">
							<div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
								<span class="ltext-202 cl2 respon2">
									Női Kollekció
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
								<h2 class="ltext-104 cl2 p-t-19 p-b-43 respon1">
									 Nyári Stílus
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
								<a href="/aruhaz" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Áruház
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- Banner -->
	<div class="sec-banner bg0">
		<div class="flex-w flex-c-m">
			<div class="size-202 m-lr-auto respon4">
				<!-- Block1 -->
				<div class="block1 wrap-pic-w">
					<img src="images/banner-04.jpg" alt="IMG-BANNER">

					<a href="/aruhaz" onclick="localStorage.setItem('category', 'women')" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
						<div class="block1-txt-child1 flex-col-l">
							<span class="block1-name ltext-102 trans-04 p-b-8">
								Női
							</span>

							<span class="block1-info stext-102 trans-04">
								Ruházat
							</span>
						</div>

						<div class="block1-txt-child2 p-b-4 trans-05">
							<div class="block1-link stext-101 cl0 trans-09">
							Vásárlás most!
							</div>
						</div>
					</a>
				</div>
			</div>

			<div class="size-202 m-lr-auto respon4">
				<!-- Block1 -->
				<div class="block1 wrap-pic-w">
					<img src="images/banner-05.jpg" alt="IMG-BANNER">

					<a href="/aruhaz" onclick="localStorage.setItem('category', 'man')" class="button block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
						<div class="block1-txt-child1 flex-col-l">
							<span class="block1-name ltext-102 trans-04 p-b-8">
								Férfi
							</span>

							<span class="block1-info stext-102 trans-04">
								Ruházat
							</span>
						</div>

						<div class="block1-txt-child2 p-b-4 trans-05">
							<div class="block1-link stext-101 cl0 trans-09">
								Vásárlás most!
							</div>
						</div>
					</a>
				</div>
			</div>

			<div class="size-202 m-lr-auto respon4">
				<!-- Block1 -->
				<div class="block1 wrap-pic-w">
					<img src="images/banner-06.jpg" alt="IMG-BANNER">

					<a href="/aruhaz" onclick="localStorage.setItem('category', 'bags')" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
						<div class="block1-txt-child1 flex-col-l">
							<span value="bags" class="block1-name ltext-102 trans-04 p-b-8">
								Táskák
							</span>

							<span class="block1-info stext-102 trans-04">
								új stílus
							</span>
						</div>

						<div class="block1-txt-child2 p-b-4 trans-05">
							<div class="block1-link stext-101 cl0 trans-09">
								Vásárlás most!
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>


	<!-- Product -->
	<section class="sec-product bg0 p-t-100 p-b-50">
		<div class="container">
			<div class="p-b-32">
				<h3 class="ltext-105 cl5 txt-center respon1">
					Fő Termékeink
				</h3>
			</div>

			<!-- Tab01 -->
			<div class="tab01">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item p-b-10">
						<a class="nav-link active" data-toggle="tab" href="#best-seller" role="tab">Legtöbbet vásárolt</a>
					</li>

					<li class="nav-item p-b-10">
						<a class="nav-link" data-toggle="tab" href="#sale" role="tab">Akció</a>
					</li>

					<li class="nav-item p-b-10">
						<a class="nav-link" data-toggle="tab" href="#top-rate" role="tab">Legjobb értékelés</a>
					</li>
				</ul>
	<div class="tab-content p-t-50">
		<div class="tab-pane fade show active" id="best-seller" role="tabpanel">
			<div class="wrap-slick2">
				<div class="slick2">
<?php

$bestSellerSelect = "SELECT DISTINCT * FROM product GROUP BY sold DESC LIMIT 5";
$bestSellerRes = mysqli_query($link, $bestSellerSelect);
if (mysqli_num_rows($bestSellerRes)) {
	while ($bestSellerRow = mysqli_fetch_object($bestSellerRes)) {
		if ($bestSellerRow->discount && ($bestSellerRow->discountTime == 0 || $bestSellerRow->discountTime >= date("Y-m-d"))) {
			$price = webshopNumberFormat($bestSellerRow->discount) . " FT.-";
			$origPrice = webshopNumberFormat($bestSellerRow->price) . " FT.-";
		} else {
			$price = webshopNumberFormat($bestSellerRow->price) . " FT.-";
			$origPrice = NULL;
		}
?>

								<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
									<!-- Block2 -->
									<div class="block2">
										<div class="block2-pic hov-img0">
											<img src="images/<?php echo $bestSellerRow->sku; ?>/product1.jpg" alt="IMG-PRODUCT">

											<a href="/item?id=<?php echo $bestSellerRow->id; ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
												Részletek
											</a>
										</div>

										<div class="block2-txt flex-w flex-t p-t-14">
											<div class="block2-txt-child1 flex-col-l ">
												<a href="/item?id=<?php echo $bestSellerRow->id; ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
													<?php echo $bestSellerRow->name; ?>
												</a>

												<span class="stext-105 cl3">
												<ins><?php echo $price; ?></ins> &nbsp; &nbsp;  <del><?php echo $origPrice; ?></del>
												</span>
												<span class="fs-18 cl11">
												<?php 
												if ((int)$bestSellerRow->countOfRatings > 0) {
                                                    $csillag = 0;
													for ($i = 0; $i < round($bestSellerRow->rating / $bestSellerRow->countOfRatings);$i++) {
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


		<div class="tab-pane fade" id="sale" role="tabpanel">
			<div class="wrap-slick2">
				<div class="slick2">
<?php

$saleRes = DBproduct($link);
if (mysqli_num_rows($saleRes)) {
	$saleCounter = 5;
	while ($saleRow = mysqli_fetch_object($saleRes)) {
		if ((int)$saleRow->discount && ($saleRow->discountTime == 0 || $saleRow->discountTime >= date("Y-m-d"))) {
			$price = webshopNumberFormat($saleRow->discount) . " FT.-";
			$origPrice = webshopNumberFormat($saleRow->price) . " FT.-";
			$saleCounter--;
			if ($saleCounter < 0) {
				break;
			}
			
	
?>
								<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
									<!-- Block2 -->
									<div class="block2">
										<div class="block2-pic hov-img0">
										<img src="images/<?php echo $saleRow->sku; ?>/product1.jpg" alt="IMG-PRODUCT">

											<a href="/item?id=<?php echo $saleRow->id; ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
												Részletek
											</a>
										</div>

										<div class="block2-txt flex-w flex-t p-t-14">
											<div class="block2-txt-child1 flex-col-l ">
												<a href="/item?id=<?php echo $saleRow->id; ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
													<?php echo $saleRow->name; ?>
												</a>

												<span class="stext-105 cl3">
												<ins><?php echo $price; ?></ins> &nbsp; &nbsp;  <del><?php echo $origPrice; ?></del>
												</span>
												<span class="fs-18 cl11">
												<?php 
												if ((int)$saleRow->countOfRatings > 0) {
                                                    $csillag = 0;
													for ($i = 0; $i < round($saleRow->rating / $saleRow->countOfRatings);$i++) {
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
}
?>
				</div>
			</div>
		</div>

	<div class="tab-pane fade" id="top-rate" role="tabpanel">
		<div class="wrap-slick2">
			<div class="slick2">

<?php
	$ratingSelect = "SELECT * FROM product ORDER BY (rating / countOfRatings)  DESC LIMIT 5";
	$ratingRes = mysqli_query($link, $ratingSelect);
	if (mysqli_num_rows($ratingRes)) {
		while ($ratingRow = mysqli_fetch_object($ratingRes)) {
			if ($ratingRow->discount && ($ratingRow->discountTime == 0 || $ratingRow->discountTime >= date("Y-m-d"))) {
				$price = webshopNumberFormat($ratingRow->discount) . " FT.-";
				$origPrice = webshopNumberFormat($ratingRow->price) . " FT.-";
			} else {
				$price = webshopNumberFormat($ratingRow->price) . " FT.-";
				$origPrice = NULL;
			}
?>


								<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
									<!-- Block2 -->
									<div class="block2">
										<div class="block2-pic hov-img0">
										<img src="images/<?php echo $ratingRow->sku; ?>/product1.jpg" alt="IMG-PRODUCT">

											<a href="<?php echo $ratingRow->id; ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
												Részletek
											</a>
										</div>

										<div class="block2-txt flex-w flex-t p-t-14">
											<div class="block2-txt-child1 flex-col-l ">
												<a href="/item?id=<?php echo $ratingRow->id; ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
												<?php echo $ratingRow->name; ?>
												</a>
												

												<span class="stext-105 cl3">
												<ins><?php echo $price; ?></ins> &nbsp; &nbsp;  <del><?php echo $origPrice; ?></del>

												</span>
												<span class="fs-18 cl11">
												<?php 
													if ((int)$ratingRow->countOfRatings > 0) {
                                                    $csillag = 0;
													for ($i = 0; $i < round($ratingRow->rating / $ratingRow->countOfRatings);$i++) {
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
				</div>
			</div>
		</div>
	</section>


