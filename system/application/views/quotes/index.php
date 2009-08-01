
        <? foreach ($query->result() as $post): ?>
			<?php if ($post->status == 0): ?>
	            <div class="post <?=$post->type?>">
	                <p class="quote"><?=$post->text?> &mdash; <em><?=$post->author?></em></p>
	            </div>
			<?endif?>
        <? endforeach?>
    </div><!-- /#content -->
    <div class="clear"></div>
</div> <!-- /#wrapper -->

<?php if ($this->redux_auth->logged_in()): ?>
	<? $this->load->view('forms/allForms'); ?>
<?php endif ?>