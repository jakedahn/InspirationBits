        
        <? foreach ($query->result() as $post): ?>
			<?php if ($post->disabled == 0): ?>
	            <div class="post <?=$post->type?>">
	                <h3 class="title"><a href="<?=$post->url?>" class="linkItem"><?=$post->title?></a></h3>
	                <p class="desc"><?=$post->desc?></p>
	            </div>
			<?endif?>
        <? endforeach?>
        
        

    </div><!-- /#content -->
    <div class="clear"></div>
</div> <!-- /#wrapper -->

<?php if ($this->redux_auth->logged_in()): ?>
	<? $this->load->view('forms/allForms'); ?>
<?php endif ?>