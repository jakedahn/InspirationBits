
		<? foreach ($results as $result): $data['result'] = $result; ?>
			<?php if ($result->post_status == 0): ?>
				<?php if ($result->post_type == "image"): ?>
					<div id="postId-<?=$result->post_id?>" class="post <?=$result->post_type?>">
						<h3 class="title"><?=$result->image_title?></h3>
						<p class="text"><?=$result->image_text?></p>
						<img src="<?=$result->image_url?>" alt="<?=$result->image_title?>" title="<?=$result->image_title?>"/>
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