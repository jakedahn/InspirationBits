<div id="linkForm">
    <h2>Submit Link</h2>
    <?=form_open('links/submit');?>
        <fieldset><label for="title">Title:</label><input type="text" name="title" value="<?=set_value('title')?>" id="title" /></fieldset>
        <fieldset><label for="url">URL:</label><input type="text" name="url" value="<?=$this->form_validation->prep_url(set_value('url'))?>" id="url" /></fieldset>
        <fieldset><label for="text">Description:</label><textarea id="text" name="text" rows="8" cols="40"><?=set_value('text')?></textarea></fieldset>
        <fieldset><input type="submit" name="submit" value="Submit" id="submit" /></fieldset>
    </form>
</div>