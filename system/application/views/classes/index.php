<h2>Classes</h2>
<?php if(isset($data) && $data['result'] != NULL) { ?>
  <? foreach ($results as $result): $data['result'] = $result; ?>
  <?php var_dump($result); ?>
  <? endforeach?>
<?php } ?>