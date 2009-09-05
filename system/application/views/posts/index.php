		<h2>Posts</h2>
		<? foreach ($results as $result): ?>
			<?php if ($result->post_status == 0): ?>
				<?php if ($result->post_type == "link"): ?>
					<div id="postId-<?=$result->post_id?>" class="post <?=$result->post_type?>">
						<?php if($this->redux_auth->logged_in()): ?>
							<div id="<?=$result->post_id?>" class="vote">
								<ul>
									<li><a class="like">Like</a></li>
									<li><a class="dislike">Dislike</a></li>
								</ul>
							</div>
						<?php endif ?>
						<h3 class="title"><a href="<?=$result->link_url?>" class="linkItem"><?=$result->link_title?></a></h3>
						<p class="text"><?=$result->link_text?></p>
					</div>
				<?php endif ?>
				<?php if ($result->post_type == "image"): ?>
					<div id="postId-<?=$result->post_id?>" class="post <?=$result->post_type?>">
						<?php if($this->redux_auth->logged_in()): ?>
							<div id="<?=$result->post_id?>" class="vote">
								<ul>
									<li><a class="like">Like</a></li>
									<li><a class="dislike">Dislike</a></li>
								</ul>
							</div>
						<?php endif ?>
						<h3 class="title"><?=$result->image_title?></h3>
						<p class="text"><?=$result->image_text?></p>
						<img src="<?=$result->image_url?>" alt="<?=$result->image_title?>" title="<?=$result->image_title?>"/>
					</div>
				<?php endif ?>
				<?php if ($result->post_type == "quote"): ?>
					<div id="postId-<?=$result->post_id?>" class="post <?=$result->post_type?>">
						<?php if($this->redux_auth->logged_in()): ?>
							<div id="<?=$result->post_id?>" class="vote">
								<ul>
									<li><a class="like">Like</a></li>
									<li><a class="dislike">Dislike</a></li>
								</ul>
							</div>
						<?php endif ?>
						<p class="quote"><?=$result->quote_text?> &mdash; <em><?=$result->quote_author?></em></p>
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