        <h2>Profile</h2>
        <pre style="height:200px; overflow:scroll; border:1px dotted #8F8F8F; background: rgba(0,0,0,0.08);">
            <?= print_r($profile); ?>
        </pre>
		<?= validation_errors(); ?>
        	<?= form_open('profile/update'); ?>
        		<fieldset class="auth">
        			<label for="first_name">First Name</label>
        			<?= form_input('first_name', $profile->first_name); ?>

        			<label for="last_name">Last Name</label>
        			<?= form_input('last_name', $profile->last_name); ?>

        			<label for="email">Email Address</label>
        			<?= form_input('email', $profile->email); ?>

        			<label for="password">Password</label>
        			<?= form_password('password'); ?>

        			<label for="confirm_password">Confirm Password</label>
        			<?= form_password('confirm_password'); ?>
        		</fieldset>

        		<fieldset><?= form_submit('submit', 'Update'); ?></fieldset>
        <?= form_close(''); ?>
        
    </div><!-- /#content -->
    <div class="clear"></div>
</div> <!-- /#wrapper -->


<?php if ($this->redux_auth->logged_in()): ?>
	<?php if ($this->redux_auth->logged_in()): ?>
	<? $this->load->view('forms/allForms'); ?>
<?php endif ?>
<?php endif ?>