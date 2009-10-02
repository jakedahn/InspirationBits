<div id="<?=$result->post_id?>" class="vote">
	<ul>
	  <?php
	  $check = $this->db->get_where('votes', array('post_id' => $result->post_id, 'user_id' => $this->redux_auth->profile()->id))->result();
		if(isset($check[0]) && $check[0]->vote == "down") { ?>
		<li id="v<?=$result->post_id?>u" class="like faded" style="visibility: visible; opacity: 0.4;"><a class="like">Like</a></li>
		<li id="v<?=$result->post_id?>d" class="dislike"><a class="dislike">Dislike</a></li>
		<?php } else if(isset($check[0]) && $check[0]->vote == "up") { ?>
		<li id="v<?=$result->post_id?>u" class="like"><a class="like">Like</a></li>
  	<li id="v<?=$result->post_id?>d" class="dislike faded" style="visibility: visible; opacity: 0.4;"><a class="dislike">Dislike</a></li>
		<?php } else { ?>
		  <li id="v<?=$result->post_id?>u" class="like"><a class="like">Like</a></li>
    	<li id="v<?=$result->post_id?>d" class="dislike"><a class="dislike">Dislike</a></li>
		<?php } ?>
		<li class="votes">Votes: </li>
		<li id="v<?=$result->post_id?>val" class="value"><?=$result->post_votes?></li>
	</ul>
</div>