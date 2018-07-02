<?php
	require('config/config.php');
	require('config/db.php');

	if (isset($_POST['delete'])) {
		// get form data
		$delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);


	$query = "DELETE FROM posts WHERE id = {$delete_id}";

		 if (mysqli_query($conn, $query)) {
		 	var_dump($query);
		 	header('Location: '.ROOT_URL.'');
		 	var_dump($query);
		 }else {
		 	echo "error".mysqli_error($conn);
		 }
    }
    function dateDiff($dateCreate) {
        $dateToday = new DateTime();
        $diff=date_diff(new DateTime($dateCreate),$dateToday);
        

        return $diff;
    }
    //get id
	$id = mysqli_real_escape_string($conn, $_GET['id']);

	//create query
	$query = 'SELECT * FROM posts WHERE id = '.$id;
	//get result
	$result =  mysqli_query($conn, $query);

	//fetch data
	$post = mysqli_fetch_assoc($result);
    //var_dump($posts);
  //  print_r($post);
    $diff = dateDiff($post['created_at'])->format("%R%a days");
    echo('created before '. strtotime($diff,0).' seconds');
	//free
	mysqli_free_result($result);

    
	//close connection
	mysqli_close($conn);

?>

	<?php include('inc/header.php'); ?> 

		<div class="container">
		<article class="">
			<div class="row">
			<div class="col-md-6">
				<a class="btn " href="<?php echo ROOT_URL ?>">Back</a>
				<h1><?php echo $post['title']; ?></h1>
				<small><?php echo $post['created_at']; ?><br>
                <?php echo('created before '. strtotime($diff,0).' seconds'); ?><br>
					by <?php echo $post['author']; ?>
				</small>
				<p><?php echo $post['body']; ?></p>
				<hr>

			<a class="btn" href="<?php echo ROOT_URL; ?>editpost.php?id=<?php echo $post['id']; ?>">Edit </a>
			<form method="POST" class="post_form" action="<?php echo $_SERVER['PHP_SELF'];?>">
					<input type="hidden" name="delete_id" value="<?php echo $post['id']; ?>">
					<input type="submit" name="delete" value="Delete" class="btn btn-danger">
			</form>
			</div>
			<div class="gallery-container col-md-6"></div>
			</div>

			
			</article>
		</div>
	<?php include('inc/footer.php'); ?> 