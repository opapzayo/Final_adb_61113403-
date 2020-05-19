<div class="col-12 col-md-8 col-lg-9">
    <div class="shop_grid_product_area">
        <div class="row">
            <div class="col-12">
                <div class="product-topbar d-flex align-items-center justify-content-between">
                    <!-- Total Products -->
                    <div class="total-products">
                        <p><span><?php echo $productfound ?></span> products found</p>
                    </div>
                    <!-- Sorting -->
                    <div class="product-sorting d-flex">
                        <p>Sort by:</p>
                        <form action="#" method="get">
                            <select name="sort" id="sort" onchange='this.form.submit()'>
                                <option value="desc">Price: $$ - $</option>
                                <option value="asc">Price: $ - $$</option>
                            </select>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <?php foreach ($products as $value) { ?>
                <!-- Single Product -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-product-wrapper">
                        <!-- Product Image -->
                        <a href="<?php echo base_url('categories/singleproduct/' . $value['_id']) ?>">
                            <div class="product-img">
                                <img src="<?php echo base_url('public/img/product-img/' . $value['imgPart']) ?> ?>" alt="">
                                <!-- Hover Thumb -->
                                <img class="hover-img" src="" alt="">

                                <!-- Product Badge -->

                                <!-- Favourite -->
                            </div>

                            <!-- Product Description -->
                            <div class="product-description">


                                <h6><?php echo $value['product_name'] ?></h6>

                                <p class="product-price">$<?php echo $value['priceEach'] ?></p>

                                <!-- Hover Content -->
                                <div class="hover-content">
                                    <!-- Add to Cart -->

                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <!-- Pagination -->
    <nav aria-label="navigation">
        <ul class="pagination mt-50 mb-70">
            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">...</a></li>
            <li class="page-item"><a class="page-link" href="#">21</a></li>
            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
        </ul>
    </nav>
</div>
</div>
</div>
</section>
<!-- ##### Shop Grid Area End ##### -->