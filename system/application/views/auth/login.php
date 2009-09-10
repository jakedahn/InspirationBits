<?= validation_errors(); ?>
<?=$this->session->flashdata('message');;?>
	<?= form_open('auth/login'); ?>
		<fieldset class="auth">
			<label for="email">Email Address</label><?= form_input('email', set_value('email')); ?>
			<label for="password">Password</label><?= form_password('password'); ?>
		</fieldset>
		<?= form_submit('submit', 'Login'); ?>
	<?= form_close(''); ?>

    </div><!-- /#content -->
    <div class="clear"></div>
</div> <!-- /#wrapper -->
