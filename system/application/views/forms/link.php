<div id="linkForm">
    <h2>Submit Link</h2>
    <?=form_open('links/submit');?>
		<fieldset>
	        <label for="title">Title:</label><input type="text" name="title" value="<?=set_value('title')?>" id="title" />
	        <label for="url">URL:</label><input type="text" name="url" value="<?=$this->form_validation->prep_url(set_value('url'))?>" id="url" />
	        <label for="desc">Description:</label><textarea id="desc" name="desc" rows="8" cols="40"><?=set_value('desc')?></textarea>
		</fieldset>
		<?php if(isset($class_id) && isset($class_name) && isset($class_db_id)) {
	    
	    echo "Posting to ".$class_id.": ".$class_name;
	    ?>
	    <input type="hidden" name="class" value="<?php echo $class_db_id; ?>"/>
    <?php } ?>
        <input type="submit" name="submit" value="Submit" id="submit" />
    </form>
</div>