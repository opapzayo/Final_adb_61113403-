<div class="breadcumb_area bg-img" style="background-image: url(<?php echo base_url('public/img/bg-img/blog2.jpg')?>);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Checkout</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Checkout Area Start ##### -->
    <div class="checkout_area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="checkout_details_area mt-50 clearfix">
                    <form action="<?php echo base_url('order/addOrder');?>" method="post">
                        <div class="cart-page-heading mb-30">
                            <h5>Billing Address</h5>
                        </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="customer_firstname">First Name <span>*</span></label>
                                    <input type="text" class="form-control" name="customer_firstname" value="" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="customer_lastname">Last Name <span>*</span></label>
                                    <input type="text" class="form-control" name="customer_lastname" value="" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="address">Address <span>*</span></label>
                                    <input type="text" class="form-control mb-3" name="address" value="" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="province">Province <span>*</span></label>
                                    <input type="text" class="form-control" name="province" value="" required>
                                </div>
								 <div class="col-12 mb-3">
                                    <label for="towncity">Town/City <span>*</span></label>
                                    <input type="text" class="form-control" name="towncity" value="" required>
                                </div>
							  <div class="col-12 mb-3">
                                    <label for="country">Country <span>*</span></label>
                                    <input type="text" class="form-control" name="country" value="" required>
                                </div>
							  <div class="col-12 mb-3">
                                    <label for="postcode">Postcode <span>*</span></label>
                                    <input type="text" class="form-control" name="postcode" value="" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="phone_no">Phone No <span>*</span></label>
                                    <input type="tel" class="form-control" name="phone_no" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" value="" required>
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="email_address">Email Address <span>*</span></label>
                                    <input type="email" class="form-control" name="email_address" value="" required>
                                </div>
                            </div>
						
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                    <div class="order-details-confirmation">

                        <div class="cart-page-heading">
                            <h5>Your Order</h5>
                            <p>The Details</p>
                        </div>

                        <ul class="order-details-form mb-4">
                        <?php foreach($orderdetails as $value){?>
							<div class="cart-item-desc"><li><span><?php echo getProductNameFromId($value['product_id']['$oid'])?></span><span style="width:30px"></span><span class="product-remove">$<?php echo (getProductPriceFromId($value['product_id']['$oid'])*$value['qualityOrder'])?></span></li>
                            </div>
                            <?php } ?>
                            <li><span><b></b>Total</span> <span>$<?php
                                $total = 0.0;
                            foreach($orderdetails as $value)
                                    {
                                        $total += (getProductPriceFromId($value['product_id']['$oid'])*$value['qualityOrder']);
                                    }                         
                                echo ($total); ?></span></li>
                        </ul>

                        <div id="accordion" role="tablist" class="mb-4">
                            <div class="card">
                                <div class="card-header" role="tab" id="headingTwo">
                                    <h6 class="mb-0">
                                        <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><i class="fas fa-circle"></i> cash on delievery</a>
                                    </h6>
                                </div>
                                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Delivery of the package to the customer for collection of goods at the destination In which the buyer does not have to transfer money for products before.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" role="tab" id="headingThree">
                                    <h6 class="mb-0">
                                        <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><i class="fas fa-circle"></i> credit card</a>
                                    </h6>
                                </div>
                                <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                                    <div class="card-body">
										<p>Card Number<input type="text" class="form-control" value=""></p>
										<div class="row">
										<div class="col-8 ">
                                        	<p>Expiry Date<input type="text" class="form-control" value=""></p>
										</div>
										<div class="col-4 ">
											<p>CVV<input type="text" class="form-control" value=""></p>
										</div>
										</div>
										
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" role="tab" id="headingFour">
                                    <h6 class="mb-0">
                                        <a class="collapsed" data-toggle="collapse" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour"><i class="fas fa-circle"></i> direct bank transfer</a>
                                    </h6>
                                </div>
                                <div id="collapseFour" class="collapse show" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Slip Number<input type="text" class="form-control" value=""></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <span><input class="btn essence-btn" type="submit" value="Place Order"></span><span> </span><span> </span><span><input class="btn essence-btn" type="submit" value="Cancel" onclick="window.history.go(-1); return false;"></span>                   
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>