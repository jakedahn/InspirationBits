		<h2>Posts</h2>
		<?= $this->pagination->create_links(); ?>

		<? foreach ($results->result() as $post): ?>
			<?php if ($post->status == 0): ?>
				<?php if ($post->type == "link"): ?>
					<div id="postId-<?=$post->id?>" class="post <?=$post->type?>">
						<?php if($this->redux_auth->logged_in()): ?>
							<div id="<?=$post->id?>" class="vote">
								<ul>
									<li><a class="like">Like</a></li>
									<li><a class="dislike">Dislike</a></li>
								</ul>
							</div>
						<?php endif ?>
						<h3 class="title"><a href="<?=$post->url?>" class="linkItem"><?=$post->title?></a></h3>
						<p class="text"><?=$post->text?></p>
					</div>
				<?php endif ?>
				<?php if ($post->type == "image"): ?>
					<div id="postId-<?=$post->id?>" class="post <?=$post->type?>">
						<?php if($this->redux_auth->logged_in()): ?>
							<div id="<?=$post->id?>" class="vote">
								<ul>
									<li><a class="like">Like</a></li>
									<li><a class="dislike">Dislike</a></li>
								</ul>
							</div>
						<?php endif ?>
						<h3 class="title"><?=$post->title?></h3>
						<p class="text"><?=$post->text?></p>
						<img src="<?=$post->url?>" alt="<?=$post->title?>" title="<?=$post->title?>"/>
					</div>
				<?php endif ?>
				<?php if ($post->type == "quote"): ?>
					<div id="postId-<?=$post->id?>" class="post <?=$post->type?>">
						<?php if($this->redux_auth->logged_in()): ?>
							<div id="<?=$post->id?>" class="vote">
								<ul>
									<li><a class="like">Like</a></li>
									<li><a class="dislike">Dislike</a></li>
								</ul>
							</div>
						<?php endif ?>
						<p class="quote"><?=$post->text?> &mdash; <em><?=$post->author?></em></p>
					</div>
				<?php endif ?>
			<?php endif ?>
		<? endforeach?>
		
		<?= $this->pagination->create_links(); ?>

	</div><!-- /#content -->
	<div class="clear"></div>
</div> <!-- /#wrapper -->

<?php if ($this->redux_auth->logged_in()): ?>
	<? $this->load->view('forms/allForms'); ?>
<?php endif ?>