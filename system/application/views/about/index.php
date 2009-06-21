        <h2>About</h2>
		<p>InspirationBits is a simple and easy to use site for students and professionals, alike, to share all of the design inspiration that they come across.</p>
    </div><!-- /#content -->
    <div class="clear"></div>
</div> <!-- /#wrapper -->

<?php if ($this->redux_auth->logged_in()): ?>
	<? $this->load->view('forms/allForms'); ?>
<?php endif ?>