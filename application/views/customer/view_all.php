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
                        	<div class="panel-heading">Customer</div>
                        	<table class="table">
                                <?php foreach ($profile as $profile_item): ?>
                                    <tr>
                                        <td>
                                            <strong><a href="customer/view_profile/<?php echo $profile_item['profile_id'] ?>"><?php echo $profile_item['profile_firstname'] ?>&nbsp;<?php echo $profile_item['profile_lastname'] ?></strong></a><br>
                                            <?php echo $profile_item['profile_contact_number'] ?><br>
                                            <?php echo $profile_item['profile_email'] ?><br>
                                            <?php echo $profile_item['profile_address'] ?><br>
                                        </td>
                                        <td>
                                            <div class="row center">
                                                <?php 
                                                if($profile_item['profile_facebook'] != null)
                                                {
                                                    echo '<a class="btn btn-social btn-facebook" target="_blank" href="'.$profile_item['profile_facebook'].'"><i class="icon-facebook"></i></a>';
                                                }
                                                if($profile_item['profile_twitter'] != null)
                                                {
                                                    echo '<a class="btn btn-social btn-twitter" target="_blank" href="'.$profile_item['profile_twitter'].'"><i class="icon-twitter"></i></a>';
                                                }
                                                if($profile_item['profile_instagram'] != null)
                                                {
                                                    echo '<a class="btn btn-social btn-instagram" target="_blank" href="'.$profile_item['profile_instagram'].'"><i class="icon-instagram"></i></a>';
                                                }
                                                ?>
                                            </div>
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