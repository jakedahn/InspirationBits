
		<? foreach ($results as $result): $data['result'] = $result; ?>
			<?php if ($result->post_status == 0): ?>			
				<?php if ($result->post_type == "link"): ?>
					<div id="postId-<?=$result->post_id?>" class="post <?=$result->post_type?>">
						<h3 class="title"><a href="<?=$result->link_url?>" class="linkItem"><?=$result->link_title?></a></h3>
						<p class="text"><?=$result->link_text?></p>
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