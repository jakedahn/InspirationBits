<div id="linkForm">
	<h2>Submit Image</h2>
	<?=form_open_multipart('images/upload');?>
		<fieldset>
			<label for="title">Title:</label><input type="text" name="title" value="<?=set_value('title')?>" id="title" />
			<label for="image">Image:</label><input type="file" name="image" id="image" value=""/>
			<label for="desc">Description:</label><textarea id="desc" name="desc" rows="8" cols="40"><?=set_value('desc')?></textarea>
		</fieldset>
		<input type="submit" name="submit" value="Submit" id="submit" />
	</form>
</div>