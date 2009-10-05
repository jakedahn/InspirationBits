<?php if(isset($class_id)) $data['class_id'] = $class_id; ?>
<?php if(isset($class_db_id)) $data['class_db_id'] = $class_db_id; ?>
<?php if(isset($class_name)) $data['class_name'] = $class_name; ?>

<?php $data['breaker'] = TRUE; ?>
<ul class="tabs">
	<li><a href="#">Images</a></li>
	<li><a href="#">Links</a></li>
	<li><a href="#">Quotes</a></li>
</ul>
<div id="images" class="tab">
	<? $this->load->view('forms/image', $data); ?>
</div>
<div id="links" class="tab">
	<? $this->load->view('forms/link', $data); ?>
</div>
<div id="quotes" class="tab">
	<? $this->load->view('forms/quote', $data); ?>
</div>
