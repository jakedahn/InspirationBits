<div id="linkForm">
    <h2>Submit Quote</h2>
    <?=form_open('quotes/submit');?>
        <fieldset><label for="author">Author:</label><input type="text" name="author" value="<?=set_value('author')?>" id="author" /></fieldset>
        <fieldset><label for="year">Year:</label><input type="text" name="year" value="" id="year" /></fieldset>
        <fieldset><label for="quote">Quote:</label><textarea id="quote" name="quote" rows="8" cols="40"><?=set_value('quote')?></textarea></fieldset>
        <fieldset><input type="submit" name="submit" value="Submit" id="submit" /></fieldset>
    </form>
</div>