<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section id="blog" class="container">
    <div class="row">
        <?php $this->load->view('layout/sidebar'); ?>
        <div class="col-sm-8 col-sm-pull-4">
            <div class="blog">
                <div class="blog-item">
                    <div class="blog-content">                    	
                    	<!--/ Product Table -->
                        <div class="panel panel-default btn-nuce">
                        	<div class="panel-heading">Product</div>
                        	<table class="table">
                                <?php foreach ($product as $product_item): ?>
                                    <tr>
                                        <td>
                                            <strong><?php echo $product_item['product_name'] ?></strong><br>
                                            <?php echo $product_item['product_desc'] ?><br>
                                            RM <?php echo $product_item['product_price'] ?><br>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                        	</div>
                        </div>                        
                    </div>
                </div><!--/.blog-item-->           
            </div>
        </div><!--/.col-md-8-->
    </div><!--/.row-->
</section><!--/#blog-->