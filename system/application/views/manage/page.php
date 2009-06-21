        <h2>Posts</h2>
        <?= $this->pagination->create_links(); ?>

        <? foreach ($results->result() as $post): ?>
			<?php if ($post->id == 1): ?>
				<div class="post <?=$post->type?>">
	                <h3 class="title"><a href="<?=$post->url?>" class="linkItem"><?=$post->title?></a></h3>
	                <p class="desc"><?=$post->desc?></p>
	            </div>
			<?php endif ?>
			<?php if ($post->id == 2): ?>
				<div class="post <?=$post->type?>">
	                <h3 class="title"><?=$post->title?></h3>
	                <p class="desc"><?=$post->desc?></p>
	                <img src="<?=$post->img_url?>" alt="<?=$post->title?>" title="<?=$post->title?>"/>
	            </div>
			<?php endif ?>
			<?php if ($post->id == 3): ?>
				<div class="post <?=$post->type?>">
	                <h3 class="author"><?=$post->title?></h3>
	                <p class="quote"><?=$post->quote?> &emdash; <?=$post->author?><?php if (!empty(<?=$post->year?>)): ?>, <?=$post->year?><?php endif ?></p>
	                <img src="<?=$post->img_url?>" alt="<?=$post->title?>" title="<?=$post->title?>"/>
	            </div>
			<?php endif ?>
        <? endforeach?>
        
        

    </div><!-- /#content -->
    <div class="clear"></div>
</div> <!-- /#wrapper -->

<?php if ($this->redux_auth->logged_in()): ?>
	<? $this->load->view('forms/allForms'); ?>
<?php endif ?>