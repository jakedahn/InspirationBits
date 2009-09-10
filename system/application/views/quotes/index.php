
		<? foreach ($results as $result): $data['result'] = $result; ?>
			<?php if ($result->post_status == 0): ?>
				<?php if ($result->post_type == "quote"): ?>
					<div id="postId-<?=$result->post_id?>" class="post <?=$result->post_type?>">
						<p class="quote"><?=$result->quote_text?> &mdash; <em><?=$result->quote_author?></em></p>
					<?php if($this->redux_auth->logged_in()): ?>
						<? $this->load->view('forms/voteForm', $data);?>
					<?php endif ?>
					</div>
				<?php endif ?>
			<?php endif ?>
		<? endforeach?>
	</div><!-- /#content -->
	<div class="clear"></div>
</div> <!-- /#wrapper -->

<?php if ($this->redux_auth->logged_in()): ?>
	<? $this->load->view('forms/allForms'); ?>
<?php endif ?>