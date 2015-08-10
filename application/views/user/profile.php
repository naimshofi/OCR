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
                        <h3>Firstname + Lastname</h3>
                        <!--/ Personal Particular -->
                        <div class="panel panel-default btn-nuce">
                        	<div class="panel-heading">Personal Pariculars</div>
                        	<div class="panel-body">
                        		<div class="row">
                        			<div class="col-sm-12">
                        				<div class="row center">
                        					<p><?=$profile['profile_contact_number'];?></p>
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
                        					<a class="btn btn-social btn-facebook" href="<?=$profile['profile_facebook'];?>"><i class="icon-facebook"></i></a>
                        					<a class="btn btn-social btn-twitter" href="<?=$profile['profile_twitter'];?>"><i class="icon-twitter"></i></a>
                        					<a class="btn btn-social btn-instagram" href="<?=$profile['profile_instagram'];?>"><i class="icon-instagram"></i></a>
                        				</div>
                        			</div>                        			
                        		</div>
                        	</div>
                        </div>
                    </div>
                </div><!--/.blog-item-->           
            </div>
        </div><!--/.col-md-8-->
    </div><!--/.row-->
</section><!--/#blog-->