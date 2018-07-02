<?php
 require('config/config.php');
 require('config/db.php');
 require('pagination.php');

 if (isset($_POST['submit'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $body = mysqli_real_escape_string($conn,$_POST['body']);

    $query = "INSERT INTO posts(title,author,body) VALUES ('$title','$author','$body')";
    if (mysqli_query($conn, $query)) {
        var_dump($query);
        header('Location: '.ROOT_URL.'');
        var_dump($query);
    }else {
        echo "error".mysqli_error($conn);
    }
 }

 $query = "SELECT * FROM posts ORDER BY id DESC LIMIT $start, $rpp";
 $res = mysqli_query($conn, $query);
 $posts = mysqli_fetch_all($res, MYSQLI_ASSOC);

// print_r($posts);
 //$keys =  mysqli_fetch_assoc($res);
 //print_r($keys);

 $query1 = "SELECT * FROM posts";
 $res1 = mysqli_query($conn, $query);

 mysqli_free_result($res);

 //close connection
 mysqli_close($conn);
?>

<?php include('inc/header.php'); ?> 
		<div class="container">
         <!-- Button trigger modal -->
         <button type="button" class="add btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          Add Post
        </button> 
        <!-- dropdown menu -->
        <select name="dropdown" id="">
            <?php
            while($row = mysqli_fetch_assoc($res1)){
               $option=  $row['title'];
                echo "<option value='$option'>$option</option>";
            }
            ?>
        </select>
			<h1>Posts</h1>
           <div class="posts">
           <?php foreach($posts as $post): ?>
                <article class="post">
                    <h3><?php echo $post['title']; ?></h3>
                    <small><?php echo $post['created_at']; ?>
                        by <?php echo $post['author']; ?>
                    </small>
                    <p><?php echo $post['body']; ?></p>
                    <a class="btn btn-success" href="post.php?id=<?php echo $post['id']; ?>">Read More</a>
                </article>
            <?php endforeach; ?>
            <?php for ($x=1; $x < $totalPages; $x++): ?>
                <a href="?page=<?php echo $x?>"><?php echo $x?></a>
            <?php endfor; ?>
            </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="<?php $_SERVER['PHP_SELF']?>">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group">
					<label>Author</label>
					<input type="text" name="author" class="form-control">
				</div>
				<div class="form-group">
					<label>Body</label>
					<textarea type="text" name="body" class="form-control"></textarea>
				</div>
				<input type="submit" name="submit" value="submit" class="btn btn-default pull-right">
            </form>
      </div>
    </div>
  </div>
</div>




		</div>
	<?php include('inc/footer.php'); ?> 
