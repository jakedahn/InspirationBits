        <pre style="height:200px; overflow:scroll; border:1px dotted #8F8F8F; background: rgba(0,0,0,0.08);">
        	<?= print_r($query->result()); ?>
        </pre>
        <? foreach ($query->result() as $post): ?>
			<?php if ($post->status == 0): ?>
	            <div class="post <?=$post->type?>">
	                <h3 class="title"><?=$post->title?></h3>
	                <p class="desc"><?=$post->text?></p>
	                <img src="<?=$post->url?>" alt="<?=$post->text?>" title="<?=$post->title?>"/>
	            </div>
			<?endif?>
        <? endforeach?>

    </div><!-- /#content -->
    <div class="clear"></div>
</div> <!-- /#wrapper -->

<?php if ($this->redux_auth->logged_in()): ?>
	<? $this->load->view('forms/allForms'); ?>
<?php endif ?>