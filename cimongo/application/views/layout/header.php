<body>
    <!-- ##### Header Area Start ##### -->
    <header class="header_area">
        <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
            <!-- Classy Menu -->
            <nav class="classy-navbar" id="essenceNav">
                <p>
                  <!-- Logo -->
                <a class="nav-brand" href="<?php echo base_url('home')?>"><img src="<?php echo base_url('public/img/icons/logo.png')?>" alt="" width="101" height="34"/></a></p>
                <p>
                  <!-- Navbar Toggler -->
                </p>
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>
                <!-- Menu -->
                <div class="classy-menu">
                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>
                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            <li><a href="#">Shop</a>
                                <div class="megamenu">
                                    <ul class="single-mega cn-col-4">
                                        <li class="title">Game Type</li>
                                        <?php foreach($categories as $value){?>
                                        <li><a href="<?php echo base_url('categories/'.$value['_id'])?>"><?php echo $value['categories_name']?></a></li>
                                        <?php } ?>
                                    </ul>
                                    <ul class="single-mega cn-col-4">
                                        <li class="title">New GAME</li>
                                        <?php foreach($categories as $value){?>
                                        <li><a href="<?php echo base_url('categories/'.$value['_id'])?>"><?php echo $value['categories_name']?></a></li>
                                        <?php } ?>
                                    </ul>
                                    <ul class="single-mega cn-col-4">
                                        <li class="title">Best Game</li>
                                        <?php foreach($categories as $value){?>
                                        <li><a href="<?php echo base_url('categories/'.$value['_id'])?>"><?php echo $value['categories_name']?></a></li>
                                        <?php } ?>
                                    </ul>
                                    <div class="single-mega cn-col-4">
                                        <img src="<?php echo base_url('public/img/bg-img/bg-6.jpg')?>" alt="">
                                    </div>
                                </div>
							</li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>

            <!-- Header Meta Data -->
            <div class="header-meta d-flex clearfix justify-content-end">
                <!-- Search Area -->
                <div class="search-area">
                    <form action="" method="">
                        <input type="text" name="namesearch" id="headerSearch" placeholder="Type for search">
                        <button type="submit" name="search" value="search"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>
                <!-- Favourite Area -->
                <div class="favourite-area"></div>
                <!-- User Login Info -->
                <div class="user-login-info">
                    <a href="#"><img src="<?php echo base_url('public/img/core-img/user.svg')?>" alt=""></a>
              </div>
                <!-- Cart Area -->
                <div class="cart-area">
                    <a href="#" id="essenceCartBtn"><img src="<?php echo base_url('public/img/core-img/bag.svg')?>" alt=""><span><?php
                $Count = 0;
               foreach($orderdetails as $value)
                    {
                        $Count += $value['qualityOrder'];
                    }                         
                echo ($Count); ?></span></a>
                </div>
            </div>

        </div>
    </header>
    <!-- ##### Header Area End ##### -->
        <!-- ##### Right Side Cart Area ##### -->
   <div class="cart-bg-overlay"></div>

<div class="right-side-cart-area">

    <!-- Cart Button -->
    <div class="cart-button">
        <a href="#" id="rightSideCart"><img src="<?php echo base_url('public/img/core-img/bag.svg')?>" alt=""> <span><?php
                $Count = 0;
               foreach($orderdetails as $value)
                    {
                        $Count += $value['qualityOrder'];
                    }                         
                echo ($Count); ?></span></a>
    </div>

    <div class="cart-content d-flex">

        <!-- Cart List Area -->
        <div class="cart-list">
            <!-- Single Cart Item -->
            <?php foreach($orderdetails as $value){?>
            <div class="single-cart-item">
                <a href="#" class="product-image">
                <img src="<?php echo base_url('public/img/product-img/'. getProductImg($value['product_id']['$oid']))?> ?>" alt="">
                    <!-- Cart Item Desc -->
                    <div class="cart-item-desc">
                    <span class="product-remove" onclick="window.location.href='<?php echo base_url('single/DelFromCart/'.$value['_id']);?>';"><i class="fa fa-close" aria-hidden="true"></i></span>
                        <h6><?php echo getProductNameFromId($value['product_id']['$oid'])?></h6>
                        <p class="size">Size: <?php echo $value['productSize']?></p>
                        <p class="color">Quality Order: <?php echo $value['qualityOrder']?></p>
                        <p class="price">$<?php echo (getProductPriceFromId($value['product_id']['$oid'])*$value['qualityOrder'])?></p>
                    </div>
                </a>
            </div>
            <?php } ?>
        </div>

        <!-- Cart Summary -->
        <div class="cart-amount-summary">

            <h2>Summary</h2>
            <ul class="summary-table">
                <li><span>ProductCount:</span> <span><?php
                $Count = 0;
               foreach($orderdetails as $value)
                    {
                        $Count += $value['qualityOrder'];
                    }                         
                echo ($Count); ?></span></li>
                <li><span>total:</span> <span>$<?php
                $total = 0.0;
               foreach($orderdetails as $value)
                    {
                        $total += (getProductPriceFromId($value['product_id']['$oid'])*$value['qualityOrder']);
                    }                         
                echo ($total); ?></span></li>
            </ul>
            <div class="checkout-btn mt-100">
                <a href="<?php echo base_url('order')?>" class="btn essence-btn">check out</a>
            </div>
        </div>
    </div>
</div>
<!-- ##### Right Side Cart End ##### -->