<section class="welcome_area bg-img background-overlay" style="background-image: url(<?php echo base_url('public/img/bg-img/slide-01.png') ?>);">
	</div>
    </section>
    <!-- ##### Welcome Area End ##### -->

    <!-- ##### Top Catagory Area Start ##### -->
    <section class="new_arrivals_area section-padding-80 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>Game</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="popular-products-slides owl-carousel">
                    <?php foreach($products as $value){?>
                        <!-- Single Product -->
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="<?php echo base_url('public/img/product-img/'.$value['imgPart'])?> ?>" alt="">
                                <!-- Hover Thumb -->
                                <img class="hover-img" src="" alt="">
                                <!-- Favourite -->
                                
                          </div>
                            <!-- Product Description -->
                            <div class="product-description">
                                <a href="<?php echo base_url('categories/singleproduct/'.$value['_id'])?>">
                                    <h6><?php  echo $value['product_name']?></h6>
                                </a>
                                <p class="product-price">$<?php echo $value['priceEach']?></p>

                                <!-- Hover Content -->
                                <div class="hover-content">
                                    <!-- Add to Cart -->
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
    <!-- ##### Top Catagory Area End ##### -->

    <!-- ##### CTA Area Start ##### -->
    
    <!-- ##### CTA Area End ##### -->

    <!-- ##### New Arrivals Area Start ##### -->

<!-- ##### New Arrivals Area End ##### -->

    <!-- ##### Brands Area Start ##### -->
    <div class="brands-area d-flex align-items-center justify-content-between">
        <!-- Brand Logo -->
        
		
    </div>