        
        <? foreach ($query->result() as $post): ?>
			<?php if ($post->disabled == 0): ?>
	            <div class="post <?=$post->type?>">
	                <p class="quote"><?=$post->quote_text?> &mdash; <em><?=$post->quote_author?><?php if (!empty($post->quote_year)): ?>, <?=$post->quote_year?><?php endif ?></em></p>
	            </div>
			<?endif?>
        <? endforeach?>
        
        

    </div><!-- /#content -->
    <div class="clear"></div>
</div> <!-- /#wrapper -->

<?php if ($this->redux_auth->logged_in()): ?>
	<? $this->load->view('forms/allForms'); ?>
<?php endif ?>