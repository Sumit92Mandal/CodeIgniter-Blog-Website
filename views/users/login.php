
<?php echo form_open('users/login'); ?>
  <div class ="row">
  	<div class="col-md-4 col-md-offset-4">
      		<h1 class="text-centre"><?= $title; ?></h1>
      		<div class="form-group">
           	<input type="text"  class ="form-control" name="username" placeholder="Enter username" required autofocus>
          </div>
            <div class="form-group">
      	    <input type="password"  class ="form-control" name="password" placeholder="Enter password" required autofocus>
          </div>
       <button type="submit" class="btn btn-danger btn-block">Login</button>
  </div>
</div>
<?php echo form_close(); ?>