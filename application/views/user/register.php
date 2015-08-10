<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section class="container">
	<div class="row">
		<div class="col-sm-5 center-block" style="float:none;">

			<?php echo validation_errors(); ?>

			<?php echo form_open('user/register') ?>
				<div class="form-group">
					<input class="form-control" type="text" name="firstname" placeholder="Firstname" value="<?php echo set_value('firstname'); ?>"required autofocus>
				</div>
				<div class="form-group">
					<input class="form-control" type="text" name="lastname" placeholder="Lastname" value="<?php echo set_value('lastname'); ?>" required>
				</div>
				<div class="form-group">
					<input class="form-control" type="email" name="email" placeholder="Email" value="<?php echo set_value('email'); ?>" required>
				</div>
				<div class="form-group">
					<input class="form-control" type="password" name="password" placeholder="Password" required>
				</div>
				<div class="form-group">
					<input class="form-control" type="password" name="passwordcf" placeholder="Password Confirmation" required>
				</div>
				<div class="form-group">
					<button class="btn btn-primary btn-md btn-block" type="submit">Register</button>
				</div>
			</form>
			<a href="<?=site_url('user/login');?>">Already have an account?</a>
		</div>
	</div>
</body>
</html>