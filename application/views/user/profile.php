<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section id="blog" class="container">
    <div class="row">
        <aside class="col-sm-4 col-sm-push-8">
            <div class="widget categories">
                <h3>Side Menu</h3>
                <div class="row">
                    <div class="col-sm-6">
                        <ul class="arrow">
                            <li><a href="#">Development</a></li>
                        </ul>
                    </div>                 
                </div>                     
            </div><!--/.categories-->           
        </aside>        
        <div class="col-sm-8 col-sm-pull-4">
            <div class="blog">
                <div class="blog-item">
                    <div class="blog-content">
                    	<div class="row">
                    		<div class="col-sm-10">
                    			<h3><?=$profile['profile_firstname'];?>&nbsp;<?=$profile['profile_lastname'];?></h3>
                    		</div>
                    		<div class="col-sm-2">
                    			<img src="http://www.gravatar.com/avatar/<?=$gravatar_url?>">
                    		</div>
                    	</div>
                    	<!--/ Personal Particular -->
                        <div class="panel panel-default btn-nuce">
                        	<div class="panel-heading">Personal Pariculars</div>
                        	<div class="panel-body">
                        		<div class="row">
                        			<div class="col-sm-12">
                        				<div class="row center">
                        					<p><?=$profile['profile_contact_number'];?></p>
                        					<p><?=$profile['user_email'];?></p>
                        					<p><?=$profile['profile_address'];?></p>
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
                        			<div class="col-sm-12">
                        				<div class="row center">
                        					<?php 
                        					if($profile['profile_facebook'] != null)
                        					{
                        						echo '<a class="btn btn-social btn-facebook" href="'.$profile['profile_facebook'].'"><i class="icon-facebook"></i></a>';
                        					}
                        					if($profile['profile_twitter'] != null)
                        					{
                        						echo '<a class="btn btn-social btn-twitter" href="'.$profile['profile_twitter'].'"><i class="icon-twitter"></i></a>';
                        					}
                        					if($profile['profile_instagram'] != null)
                        					{
                        						echo '<a class="btn btn-social btn-instagram" href="'.$profile['profile_instagram'].'"><i class="icon-instagram"></i></a>';
                        					}
                        					?>
                        				</div>
                        			</div>
                        		</div>
                        	</div>
                        </div>
	                    <a href="<?=site_url('account/update')?>" class="btn btn-primary">Update User Profile <i class="icon-angle-right"></i></a>
                        </form>
                    </div>
                </div><!--/.blog-item-->           
            </div>
        </div><!--/.col-md-8-->
    </div><!--/.row-->
</section><!--/#blog-->