<?= validation_errors(); ?>
	<?= form_open('auth/register'); ?>
		<fieldset class="auth">
			<label for="first_name">First Name</label>
			<?= form_input('first_name', set_value('first_name')); ?>
			
			<label for="last_name">Last Name</label>
			<?= form_input('last_name', set_value('last_name')); ?>
			
			<label for="username">Username</label>
			<?= form_input('username', set_value('username')); ?>
			
			<label for="email">Email Address</label>
			<?= form_input('email', set_value('email')); ?>
			
			<label for="password">Password</label>
			<?= form_password('password'); ?>
			
			<label for="confirm_password">Confirm Password</label>
			<?= form_password('confirm_password'); ?>
		</fieldset>
		
		<fieldset><?= form_submit('submit', 'Register'); ?></fieldset>
<?= form_close(''); ?>

    </div><!-- /#content -->
    <div class="clear"></div>
</div> <!-- /#wrapper -->
