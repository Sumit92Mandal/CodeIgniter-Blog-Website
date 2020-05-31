<h2><?php echo $post['title']; ?></h2>
<small class ="post-date">Posted on: <?php echo $post['created_at'];?></small><br>
<div class ="post-body">
	 <?php echo $post['body']; ?>
</div>

<?php if($this->session->userdata('user_id')== $post['user_id']): ?>
    <hr>
    <?php echo form_open('/posts/edit/'.$post['slug']); ?>
    <input type="submit" value="EDIT" class="btn btn-danger">
    </form>

    <hr>
    <?php echo form_open('/posts/delete/'.$post['id']); ?>
       <input type="submit" value="delete" class="btn btn-danger">
    </form>
<?php endif; ?>

<hr>
<h3>Comment</h3>
<?php if($comments) : ?>
	<?php foreach ($comments as $comment):  ?> 
	  <div class= "well">
	  <h5> <?php echo $comment['body']; ?>[by <strong>
	  	<?php echo $comment['name']; ?>  </strong>]</h5>
	 	
	<?php endforeach; ?>
<?php else : ?>
	<p> no comments to display</p>
<?php endif;?>

<hr>
<h3>Add Comment</h3>
<?php echo validation_errors(); ?>
<?php echo form_open('comments/create/'.$post['id']); ?>
     <div class="form-group">
     	<label>Name</label>
     	<input type="text" name="name" class="form-control">	
     </div>
        <div class="form-group">
     	<label>Email</label>
     	<input type="text" name="email" class="form-control">	
     </div>
        <div class="form-group">
     	<label>Body</label>
     	<textarea name="body" class="form-control"></textarea>
     </div>
     <input type="hidden" name="slug" value="<?php echo $post['slug']; ?>">
     <button class="btn btn-danger" type="submit"> Submit</button>
</form>
     