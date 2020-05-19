<div class="content">
        <div class="container-fluid">
            <div class="row " style="background-image: url(<?php echo base_url('public/img/blog-04.jpg')?>); background-size: cover;img-: 0.5; padding-top: 50px;padding-bottom: 50px">
                                <div class="col-sm-4" style="float:none;margin:auto;padding: inherit">
                                    <div class="order-details-confirmation" style="background-color: rgb(255,255,255);border-radius: 25px;">
                                    <?php foreach($order as $orderID){?>
                                        <center><h4>Order: <?php echo $orderID['_id']?></h4></center>
                                        
                                        <ul class="order-details-form mb-4">
                                            <div class="">
                                            <?php foreach($orderdetails as $value){?>
                                                <div class="cart-item-desc"><li><span><?php echo getProductNameFromId($value['product_id']['$oid'])?></span><span style="width:30px"></span><span>$<?php echo (getProductPriceFromId($value['product_id']['$oid'])*$value['qualityOrder'])?></span></li>
                                                </div>
                                                <?php } ?>
                                                <li><span><b></b>Total</span> <span>$<?php
                                                    $total = 0.0;
                                                foreach($orderdetails as $value)
                                                        {
                                                            $total += (getProductPriceFromId($value['product_id']['$oid'])*$value['qualityOrder']);
                                                        }                         
                                                    echo ($total); ?></span></li>
                                            </div>
                                        </ul>
                                        <center><a href="<?php echo base_url('confirm/updateOrderId/'.$orderID['_id']);?>"><input class="btn essence-btn" type="submit" value="Confirm" ></a></center>   
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                       
        </div>
    </div>