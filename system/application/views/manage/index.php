        <h2>Inspiration Management</h2>

		<? foreach ($fetchUserPosts->result() as $post): ?>
			<?php if ($post->disabled == 0): ?>
				<?php if ($post->type == 1): ?>
					<div class="post <?=$post->type?>">
						<ul class="manage">
							<li><a href="<?=base_url()?>manage/delete/<?=$post->id?>"><img src="<?=base_url()?>public/images/delete.png" alt="Delete" /></a></li>
						</ul>
			            <h3 class="title"><a href="<?=$post->url?>" class="linkItem"><?=$post->title?></a></h3>
			            <p class="desc"><?=$post->desc?></p>
			        </div>
				<?php endif ?>
				<?php if ($post->type == 2): ?>
					<div class="post <?=$post->type?>">
						<ul class="manage">
							<li><a href="<?=base_url()?>manage/delete/<?=$post->id?>"><img src="<?=base_url()?>public/images/delete.png" alt="Delete" /></a></li>
						</ul>
			            <h3 class="title"><?=$post->title?></h3>
			            <p class="desc"><?=$post->desc?></p>
			            <img src="<?=$post->img_url?>" alt="<?=$post->title?>" title="<?=$post->title?>"/>
			        </div>
				<?php endif ?>
				<?php if ($post->type == 3): ?>
					<div class="post <?=$post->type?>">
						<ul class="manage">
							<li><a href="<?=base_url()?>manage/delete/<?=$post->id?>"><img src="<?=base_url()?>public/images/delete.png" alt="Delete" /></a></li>
						</ul>
			            <p class="quote"><?=$post->quote_text?> &mdash; <?=$post->quote_author?><?php if (!empty($post->quote_year)): ?>, <?=$post->quote_year?><?php endif ?></p>
			        </div>
				<?php endif ?>
			<?php endif ?>
        <? endforeach?>
		
    </div><!-- /#content -->
    <div class="clear"></div>
</div> <!-- /#wrapper -->


<?php if ($this->redux_auth->logged_in()): ?>
	<?php if ($this->redux_auth->logged_in()): ?>
	<? $this->load->view('forms/allForms'); ?>
<?php endif ?>
<?php endif ?>