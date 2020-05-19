<?php if($this->session->flashdata('success')){ ?>
        <div class="alert alert-success" style="text-align:center" role="alert">
            Product Added
        </div>
<?php } ?>
<?php foreach($products as $key => $value){?>
<section class="single_product_details_area d-flex align-items-center">
        <!-- Single Product Thumb -->
        <div class="single_product_thumb clearfix">
            <div class="">
                <img src="<?php echo base_url('public/img/product-img/'.$value['imgPart'])?> ?>" alt="">
            </div>
        </div>
        <!-- Single Product Description -->
        <div class="single_product_desc clearfix">
            <a href="">
                <h2><?php  echo $value['product_name']?></h2>
            </a>
            <p class="product-price">$<?php echo $value['priceEach']?></p>
            
           
            <!-- Form -->
            
            <form action="<?php echo base_url('single/addToCart');?>" class="cart-form clearfix" method="post">
                <!-- Select Box -->
                <input type="hidden" name="product_id" value="<?php echo $value['_id']?>"> 
                <div class="select-box d-flex mt-50 mb-30">
                <div class="col-lg-3">
                <input type="number" name="qualityOrder" class="form-control" value="1" min="1"> 
                </div>
                </div>
                <!-- Cart & Favourite Box -->
                <div class="cart-fav-box d-flex align-items-center">
                    <!-- Cart -->
                    <div class="col-4">
                    <button type="submit"  class="btn essence-btn">Add to cart</button>
                    </div>
                    <div></div>
                    <!-- Favourite -->
                
                <div class="col-4">
                <a href="<?php echo base_url('categories/5ea2838c03bcc980d6b6b3ca')?>" class="btn essence-btn">Back</a>
                </div>
                </div>
                </form>
        </div>  
        <?php } ?>
    </section>