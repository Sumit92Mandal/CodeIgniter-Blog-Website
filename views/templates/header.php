<html>
	<head>
		<title>ciblog</title>
		<link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css"> 
	</head>
	<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item active">
        <a class="nav-link" href="/">ciBlog <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>/about">About</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>/posts">blog</a>
      </li>
        <a class="nav-link" href="<?php echo base_url(); ?>Categories">Categories</a>
   
     <?php if(!$this->session->userdata('logged_in')) : ?>
      <li> <a class="nav-link" href="<?php echo base_url(); ?>/users/register">Register</a></li>

      <li> <a class="nav-link" href="<?php echo base_url(); ?>/users/login">login</a></li>
    <?php endif; ?>
 </ul>


    <ul class="navbar-nav mr-right"> 
      <?php if($this->session->userdata('logged_in')) : ?>
       <a class="nav-link" href="<?php echo base_url(); ?>/users/logout">logout</a>
      <li class="nav-item">

        <a class="nav-link" href="<?php echo base_url(); ?>posts/create">CREATE POST</a>

      </li>
      <a class="nav-link" href="<?php echo base_url(); ?>Categories/create">CREATE CATEGORIES</a>
       <?php endif; ?>
    </ul>
  </div>
</nav>

<div class="container">
  <!--flash message-->
  <?php if($this->session->flashdata('user_registered')): ?>
    <?php echo '<p class="btn btn-danger">'.$this->session->flashdata('user_registered').'</p>'; ?>
    <?php endif; ?>

     <?php if($this->session->flashdata('post_created')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_created').'</p>'; ?>
    <?php endif; ?>

     <?php if($this->session->flashdata('category_created')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_created').'</p>'; ?>
    <?php endif; ?>

     <?php if($this->session->flashdata('post_deleted')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_deleted').'</p>'; ?>
    <?php endif; ?>

 <?php if($this->session->flashdata('post_updated')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_updated').'</p>'; ?>
    <?php endif; ?>


 <?php if($this->session->flashdata('login_failed')): ?>
    <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
    <?php endif; ?>

 <?php if($this->session->flashdata('user_loggedin')): ?>
    <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('user_loggedin').'</p>'; ?>
    <?php endif; ?>
  
     <?php if($this->session->flashdata('user_loggedout')): ?>
    <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('user_loggedout').'</p>'; ?>
    <?php endif; ?>