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