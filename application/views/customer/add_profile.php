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

						<?php echo form_open('customer/add_profile') ?>
                        
                        <!--/ Personal Particular -->
                        <div class="panel panel-default btn-nuce">
                        	<div class="panel-heading">Personal Pariculars</div>
                        	<div class="panel-body">
                        		<div class="row">
                        			<div class="col-sm-11 center-block" style="float:none;">
                        				<div class="row">
                        					<div class="form-group">
												<input class="form-control" type="text" name="firstname" value="<?php echo set_value('firstname'); ?>" placeholder="Firstname" required autofocus>
											</div>
											<div class="form-group">
												<input class="form-control" type="text" name="lastname" value="<?php echo set_value('lastname'); ?>" placeholder="Lastname">
											</div>
											<div class="form-group">
												<input class="form-control" type="email" name="email" value="<?php echo set_value('email'); ?>" placeholder="Email">
											</div>
											<div class="form-group">
												<input class="form-control" type="text" name="contact_number" value="<?php echo set_value('contact_number'); ?>" placeholder="Contact Number">
											</div>
											<div class="form-group">
												<textarea class="form-control" rows="4" name="address" placeholder="Address"><?php echo set_value('address'); ?></textarea>
											</div>
                        				</div>
                        			</div>                        			
                        		</div>
                        	</div>
                        </div>
                        <!--/ Sosical Sites -->
                        <div class="panel panel-default btn-nuce">
                        	<div class="panel-heading">Social Sites</div>
                        	<div class="panel-body">
                        		<div class="row">
                        			<div class="col-sm-11 center-block" style="float:none;">
                        				<div class="row">                        					
											<div class="input-group">
					                          	<input class="form-control" type="text" name="facebook" value="<?php echo set_value('facebook'); ?>" placeholder="Facebook profile link(ex-https://www.facebook.com/eastbullet)">													
												<span class="input-group-btn">
					                                <button class="btn btn-social btn-facebook" type="button"><i class="icon-facebook"></i></button>
					                            </span>
					                        </div>
					                        <div class="input-group">
					                          	<input class="form-control" type="text" name="twitter" value="<?php echo set_value('twitter'); ?>" placeholder="Twitter profile link(ex-https://twitter.com/eastbullet)">													
												<span class="input-group-btn">
					                                <button class="btn btn-social btn-twitter" type="button"><i class="icon-twitter"></i></button>
					                            </span>
					                        </div>										
											<div class="input-group">
					                          	<input class="form-control" type="text" name="instagram" value="<?php echo set_value('instagram'); ?>" placeholder="Instagram profile link(ex-https://instagram.com/officialhafizhsyahrin_55)">													
												<span class="input-group-btn">
					                                <button class="btn btn-social btn-instagram" type="button"><i class="icon-instagram"></i></button>
					                            </span>
					                        </div>
                        				</div>
                        			</div>                        			
                        		</div>
                        	</div>
                        </div>
                        <button class="btn btn-primary btn-md btn-block" type="submit">Add Record</button>
                        </form>
                    </div>
                </div><!--/.blog-item-->           
            </div>
        </div><!--/.col-md-8-->
    </div><!--/.row-->
</section><!--/#blog-->