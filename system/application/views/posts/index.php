		<h2>Posts</h2>
<pre style="height:200px; overflow:scroll; border:1px dotted #8F8F8F; background: rgba(0,0,0,0.08);">
	<?= print_r($results); ?>
</pre>
		<? foreach ($results as $result): ?>
			<?php if ($result->status == 0): ?>
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
						<p class="text"><?=$result->text?></p>
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