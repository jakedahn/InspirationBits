<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Inspiration</title>
        <? $this->load->view('global/meta'); ?>
        <? $this->load->view('global/css'); ?>
        <? $this->load->view('global/js'); ?>

    </head>
    <body>
        <div id="wrapper">
            <div id="header">
                <h1>InspirationBits</h1>
                <?if ($this->redux_auth->logged_in()) { ?>
                  <select name="classes" id="classes" onchange="javascript:document.location.href = '/classes/'+this.value;" size="1">
                     <?php
                     if($this->uri->segment(2, 0) == 0) { ?>
                       <option value="0">No Class Selected</option>
<?php                      }
                     
                     if($this->redux_auth->profile()->group == "teacher") {
                      
                      $classes = $this->educlass->fetchTeacherClasses($this->redux_auth->profile()->id);
                     
                     foreach ($classes as $result): ?>
                      <option value="<?=$result->class_id;?>"<?php if($this->uri->segment(2, 0) == $result->class_id) echo " selected";?>><?=$result->class_id;?></option>
                    <? endforeach;
      					  }
      					else
      					{
      					  ?>
      					  <?php
      					  $classes = $this->educlass->fetchStudentClasses($this->redux_auth->profile()->id);
      					  if($classes['0'] != "") {
                  foreach ($classes as $result) {
                    $class = $this->educlass->fetchClassbyClassID($result);
                    ?>
                  <option value="<?=$class->class_id;?>"<?php if($this->uri->segment(2, 0) == $class->class_id) echo " selected";?>><?=$class->class_name;?></option>
              <?php }}
              else
              { ?>
                <option value="0">You Have No Classes Added</option>
<?php        }
              } ?>
               </select>
               <?=form_open('classes/add');?>
                    <input type="text" name="add_class_id" value="" id="add_class_id"/>
                   <input type="submit" name="submit" value="Add" id="submit" />
               </form>
             <?php  } ?>
                
				<ul id="auth">
					<?if ($this->redux_auth->logged_in()): ?>
						<li><a href="<?= base_url()?>manage">Manage</a></li>
						<li><a href="<?= base_url()?>auth/logout">Logout</a></li>
					<?endif ?>
					<?php if (!$this->redux_auth->logged_in()): ?>
						<li><a href="<?= base_url()?>auth">Login</a></li>
						<li><a href="<?= base_url()?>auth/register">Register</a></li>
					<?php endif ?>
				</ul>
                <ul id="nav">
                    <li><a href="<?= base_url() ?>">Home</a></li>
                    <li><a href="<?= base_url() ?>links">Links</a></li>
                    <li><a href="<?= base_url() ?>images">Images</a></li>
                    <li><a href="<?= base_url() ?>quotes">Quotes</a></li>
                    <li><a href="<?= base_url() ?>about">About</a></li>
                </ul>
            </div>
            <div id="content">