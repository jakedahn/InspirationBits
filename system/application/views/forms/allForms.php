<ul class="tabs">
	<li><a href="#">Images</a></li>
	<li><a href="#">Links</a></li>
	<li><a href="#">Quotes</a></li>
</ul>
<div id="images" class="tab">
	<? $this->load->view('forms/image'); ?>
</div>
<div id="links" class="tab">
	<? $this->load->view('forms/link'); ?>
</div>
<div id="quotes" class="tab">
	<? $this->load->view('forms/quote'); ?>
</div>
