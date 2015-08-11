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

						<?php echo validation_errors(); ?>

						<?php echo form_open('product/add') ?>
                        
                        <!--/ Personal Particular -->
                        <div class="panel panel-default btn-nuce">
                        	<div class="panel-heading">Product Details</div>
                        	<div class="panel-body">
                        		<div class="row">
                        			<div class="col-sm-11 center-block" style="float:none;">
                        				<div class="row">
                        					<div class="input-group">
												<input class="form-control" type="text" name="product_name" value="<?php echo set_value('product_name'); ?>" placeholder="Product name" required autofocus>
                                                <div class="input-group-addon"><i class="icon-asterisk"></i></div>
											</div>											
                                            <div class="input-group">
                                                <div class="input-group-addon">RM</div>
                                                <input class="form-control"  type="text"  name="product_price" value="<?php echo set_value('product_price'); ?>" placeholder="Price in 2 decimal places ( ex- 2.20" required>
                                                <div class="input-group-addon"><i class="icon-asterisk"></i></div>
                                            </div>
											<div class="form-group">
												<textarea class="form-control" rows="3" name="product_desc" placeholder="Product descriptions"><?php echo set_value('product_desc'); ?></textarea>
											</div>                                            									
                        				</div>
                        			</div>                        			
                        		</div>
                        	</div>
                        </div>
                        <button class="btn btn-primary btn-md btn-block" type="submit">Save</button>
                        </form>
                    </div>
                </div><!--/.blog-item-->           
            </div>
        </div><!--/.col-md-8-->
    </div><!--/.row-->
</section><!--/#blog-->