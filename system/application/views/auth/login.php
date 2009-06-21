<?= validation_errors(); ?>
<?=$this->session->flashdata('message');;?>
	<?= form_open('auth/login'); ?>
		<fieldset><label for="email">Email Address</label><?= form_input('email', set_value('email')); ?></fieldset>
		<fieldset><label for="password">Password</label><?= form_password('password'); ?></fieldset>
		<fieldset><?= form_submit('submit', 'Login'); ?></fieldset>
<?= form_close(''); ?>

    </div><!-- /#content -->
    <div class="clear"></div>
</div> <!-- /#wrapper -->
