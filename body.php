<div class="main main-raised">
	<div class="container mainn-raised" style="width:100%;">
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<!-- Wrapper for slides -->
			<div class="carousel-inner">
				<div class="item active">
					<img src="img/banner4.jpg" alt="Los Angeles" style="width:100%; height:400px;">
				</div>
			</div>
    		<!-- Left and right controls -->
			<a class="left carousel-control _26sdfg" href="#myCarousel" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
				<span class="sr-only" >Previous</span>
			</a>
    		<a class="right carousel-control _26sdfg" href="#myCarousel" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
				<span class="sr-only">Next</span>
			</a>
  		</div>
	</div>
	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h3 class="title">New Products</h3>
						<div class="section-nav">
							<ul class="section-tab-nav tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Idiophones</a></li>
								<li><a data-toggle="tab" href="#tab1">Membranophones</a></li>
								<li><a data-toggle="tab" href="#tab1">Chordophones</a></li>
								<li><a data-toggle="tab" href="#tab1">Aerophones</a></li>
								<li><a data-toggle="tab" href="#tab1">Electrophones</a></li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /section title -->
				<!-- Products tab & slick -->
				<div class="col-md-12 mainn mainn-raised">
					<div class="row">
						<div class="products-tabs">
							<!-- tab -->
							<div id="tab1" class="tab-pane active">
								<div class="products-slick" data-nav="#slick-nav-1" >
									<?php
                    					include 'db.php';
										$product_query = "SELECT * FROM products,categories WHERE p_cat=cat_id AND p_id BETWEEN 1 AND 21";
										$run_query = mysqli_query($con,$product_query);
										if(mysqli_num_rows($run_query) > 0)
										{
											while($row = mysqli_fetch_array($run_query))
											{
												$pro_id    = $row['p_id'];
												$pro_cat   = $row['p_cat'];
												$pro_brand = $row['p_brand'];
												$pro_title = $row['p_name'];
												$pro_price = $row['p_price'];
												$pro_image = $row['p_img'];
												$cat_name = $row["cat_name"];
												echo "
													<div class='product'>
														<a href='product.php?p=$pro_id'>
															<div class='product-img'>
																<img src='product_images/$pro_image' style='max-height: 170px;' alt=''>
																<div class='product-label'>
																	<span class='sale'>-30%</span>
																	<span class='new'>NEW</span>
																</div>
															</div>
														</a>
														<div class='product-body'>
															<p class='product-category'>$cat_name</p>
															<h3 class='product-name header-cart-item-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
															<h4 class='product-price header-cart-item-info'>$pro_price<del class='product-old-price'>$990.00</del></h4>
															<div class='product-rating'>
																<i class='fa fa-star'></i>
																<i class='fa fa-star'></i>
																<i class='fa fa-star'></i>
																<i class='fa fa-star'></i>
																<i class='fa fa-star'></i>
															</div>
															<div class='product-btns'>
																<button class='add-to-wishlist'><i class='fa fa-heart-o'></i><span class='tooltipp'>add to wishlist</span></button>
																<button class='add-to-compare'><i class='fa fa-exchange'></i><span class='tooltipp'>add to compare</span></button>
																<button class='quick-view'><i class='fa fa-eye'></i><span class='tooltipp'>quick view</span></button>
															</div>
														</div>
														<div class='add-to-cart'>
															<button pid='$pro_id' id='product' class='add-to-cart-btn block2-btn-towishlist' href='#'><i class='fa fa-shopping-cart'></i> add to cart</button>
														</div>
													</div>               
												";
											};
    									}
									?>
								</div>
								<div id="slick-nav-1" class="products-slick-nav"></div>
							</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Accessories</h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									<li class="active"><a data-toggle="tab" href="#tab2">For Guitar</a></li>
									<li><a data-toggle="tab" href="#tab2">For Drum</a></li>
									<li><a data-toggle="tab" href="#tab2">Recording</a></li>
									<li><a data-toggle="tab" href="#tab2">Sound-Boards</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->
					<!-- Products tab & slick -->
					<div class="col-md-12 mainn mainn-raised">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab2" class="tab-pane fade in active">
									<div class="products-slick" data-nav="#slick-nav-2">
										<!-- product -->
										<?php
                    						include 'db.php';
											$product_query = "SELECT * FROM products,categories WHERE p_cat=cat_id AND p_id BETWEEN 22 AND 27";
											$run_query = mysqli_query($con,$product_query);
											if(mysqli_num_rows($run_query) > 0)
											{
												while($row = mysqli_fetch_array($run_query))
												{
													$pro_id    = $row['p_id'];
													$pro_cat   = $row['p_cat'];
													$pro_brand = $row['p_brand'];
													$pro_title = $row['p_name'];
													$pro_price = $row['p_price'];
													$pro_image = $row['p_img'];
													$cat_name = $row["cat_name"];
													echo "
														<div class='product'>
															<a href='product.php?p=$pro_id'>
																<div class='product-img'>
																	<img src='product_images/$pro_image' style='max-height: 170px;' alt=''>
																	<div class='product-label'>
																		<span class='sale'>-30%</span>
																		<span class='new'>NEW</span>
																	</div>
																</div>
															</a>
															<div class='product-body'>
																<p class='product-category'>$cat_name</p>
																<h3 class='product-name header-cart-item-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
																<h4 class='product-price header-cart-item-info'>$pro_price<del class='product-old-price'>$990.00</del></h4>
																<div class='product-rating'>
																	<i class='fa fa-star'></i>
																	<i class='fa fa-star'></i>
																	<i class='fa fa-star'></i>
																	<i class='fa fa-star'></i>
																	<i class='fa fa-star'></i>
																</div>
																<div class='product-btns'>
																	<button class='add-to-wishlist'><i class='fa fa-heart-o'></i><span class='tooltipp'>add to wishlist</span></button>
																	<button class='add-to-compare'><i class='fa fa-exchange'></i><span class='tooltipp'>add to compare</span></button>
																	<button class='quick-view'><i class='fa fa-eye'></i><span class='tooltipp'>quick view</span></button>
																</div>
															</div>
															<div class='add-to-cart'>
																<button pid='$pro_id' id='product' class='add-to-cart-btn block2-btn-towishlist' href='#'><i class='fa fa-shopping-cart'></i> add to cart</button>
															</div>
														</div>
				                        			";
												};
    										}
										?>	
										<!-- /product -->
									</div>
									<div id="slick-nav-2" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- /Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
	</div>
</div>