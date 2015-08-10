<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section class="container">
	<div class="row">
		<div class="col-sm-5 center-block" style="float:none;">

			<div class="status alert alert-danger" <?php if(set_value('email')=="") echo 'style="display: none">'?>>
				<?php echo validation_errors(); ?>
			</div>

			<?php echo form_open('user/register') ?>
				<div class="form-group">
					<input class="form-control" type="text" name="firstname" placeholder="Firstname" required autofocus>
				</div>
				<div class="form-group">
					<input class="form-control" type="text" name="lastname" placeholder="Lastname" required>
				</div>
				<div class="form-group">
					<input class="form-control" type="email" name="email" placeholder="Email" required>
				</div>
				<div class="form-group">
					<input class="form-control" type="password" name="password" placeholder="Password" required>
				</div>
				<div class="form-group">
					<button class="btn btn-primary btn-lg" type="submit">Register</button>
				</div>
			</form>
			<a href="<?=site_url('user/login');?>">Already have an account?</a>
		</div>
	</div>
</body>
</html>