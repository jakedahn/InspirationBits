        <h2>Inspiration Management</h2>
		<? foreach ($results as $result): ?>
			<?php if ($result->post_status == 0): ?>
				<?php if ($result->post_type == "link"): ?>
					<div id="postId-<?=$result->post_id?>" class="post <?=$result->post_type?>">
						<ul class="manage">
							<li><a href="<?=base_url()?>manage/delete/<?=$result->post_id?>"><img src="<?=base_url()?>public/images/delete.png" alt="Delete" /></a></li>
						</ul>
						<h3 class="title"><a href="<?=$result->link_url?>" class="linkItem"><?=$result->link_title?></a></h3>
						<p class="text"><?=$result->link_text?></p>
					<?php if($this->redux_auth->logged_in()): ?>
						<div id="<?=$result->post_id?>" class="vote">
							<ul>
								<li class="like"><a class="like">Like</a></li>
								<li class="dislike"><a class="dislike">Dislike</a></li>
								<li class="votes">Votes: <p><?=$result->post_votes?></p></li>
							</ul>
						</div>
					<?php endif ?>
					</div>
				<?php endif ?>
				<?php if ($result->post_type == "image"): ?>
					<div id="postId-<?=$result->post_id?>" class="post <?=$result->post_type?>">
						<ul class="manage">
							<li><a href="<?=base_url()?>manage/delete/<?=$result->post_id?>"><img src="<?=base_url()?>public/images/delete.png" alt="Delete" /></a></li>
						</ul>
						<h3 class="title"><?=$result->image_title?></h3>
						<p class="text"><?=$result->image_text?></p>
						<img src="<?=$result->image_url?>" alt="<?=$result->image_title?>" title="<?=$result->image_title?>"/>
					<?php if($this->redux_auth->logged_in()): ?>
						<div id="<?=$result->post_id?>" class="vote">
							<ul>
								<li class="like"><a class="like">Like</a></li>
								<li class="dislike"><a class="dislike">Dislike</a></li>
								<li class="votes">Votes: <p><?=$result->post_votes?></p></li>
							</ul>
						</div>
					<?php endif ?>
					</div>
				<?php endif ?>
				<?php if ($result->post_type == "quote"): ?>
					<div id="postId-<?=$result->post_id?>" class="post <?=$result->post_type?>">
						<ul class="manage">
							<li><a href="<?=base_url()?>manage/delete/<?=$result->post_id?>"><img src="<?=base_url()?>public/images/delete.png" alt="Delete" /></a></li>
						</ul>
						<p class="quote"><?=$result->quote_text?> &mdash; <em><?=$result->quote_author?></em></p>
					<?php if($this->redux_auth->logged_in()): ?>
						<div id="<?=$result->post_id?>" class="vote">
							<ul>
								<li class="like"><a class="like">Like</a></li>
								<li class="dislike"><a class="dislike">Dislike</a></li>
								<li class="votes">Votes: <p><?=$result->post_votes?></p></li>
							</ul>
						</div>
					<?php endif ?>
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