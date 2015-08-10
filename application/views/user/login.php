<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section class="container">
	<div class="row">
		<div class="col-sm-5 center-block" style="float:none;">

			<div class="status alert alert-danger" <?php if(set_value('email')=="") echo 'style="display: none">'?>>
				<?php echo validation_errors(); ?>
			</div>

			<?php echo form_open('user/login') ?>

				<div class="form-group">
					<input class="form-control" type="email" name="email" placeholder="Email" value="<?php echo set_value('email'); ?>" required autofocus>
				</div>
				<div class="form-group">

				<input class="form-control" type="password" name="password" placeholder="Password" required>
				</div>
				<div class="form-group">
					<button class="btn btn-primary btn-md btn-block" type="submit">Sign In</button>
				</div>
			</form>
			<a href="<?=site_url('user/forgot');?>">Forgot Password?</a><span class="clearfix"></span>
			<a href="<?=site_url('user/register');?>">Create an account</a>
		</div>
	</div>
</section>