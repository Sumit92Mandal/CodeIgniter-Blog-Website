<h2><?= $title ;?></h2>

<?php echo validation_errors();  ?>
 
<?php echo form_open('users/register');?>

  <div class ="form-group">
  	<label> Name</label>
  	<input type="text"  class ="form-control" name="name" placeholder="Enter name">
  </div>

  <div class ="form-group">
  	<label> Zip</label>
  	<input type="text"  class ="form-control" name="zipcode" placeholder="Zipcode">
  </div>

  <div class ="form-group">
  	<label> Email</label>
  	<input type="email"  class ="form-control" name="email" placeholder="Enter Email">
  </div>

  <div class ="form-group">
  	<label> Username</label>
  	<input type="text"  class ="form-control" name="username" placeholder="Username">
  </div>

  <div class ="form-group">
  	<label>Password</label>
  	<input type="password"  class ="form-control" name="password" placeholder="Password">
  </div>

  <div class ="form-group">
  	<label>ConfirmPasword</label>
  	<input type="password"  class ="form-control" name="password2" placeholder="ConfirmPasword">
  </div>

  <button type="submit" class="btn btn-danger">Submit</button>
  <?php echo form_close();  ?>