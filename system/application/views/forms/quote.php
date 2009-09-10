<div id="linkForm">
	<h2>Submit Quote</h2>
	<?=form_open('quotes/submit');?>
		<fieldset>
			<label for="author">Author:</label><input type="text" name="author" value="<?=set_value('author')?>" id="author" />
			<label for="text">Quote:</label><textarea id="quote" name="text" rows="8" cols="40"><?=set_value('text')?></textarea>
		</fieldset>
		<input type="submit" name="submit" value="Submit" id="submit" />
	</form>
</div>