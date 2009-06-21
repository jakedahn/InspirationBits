        
        <div class="success">
            <h3 class="success">Success!</h3>
            <p>Your link has successfully made its way into our database.</p>
        </div>
        
    </div><!-- /#content -->
    <div class="clear"></div>
</div> <!-- /#wrapper -->

<?php if ($this->redux_auth->logged_in()): ?>
	<? $this->load->view('forms/allForms'); ?>
<?php endif ?>

