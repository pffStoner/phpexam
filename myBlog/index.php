<?php 
        require('config/config.php');
        require('config/db.php');
    if (isset($_POST['delete'])) {
      $delete_id = mysqli_real_escape_string($conn,$_POST['delete_id']);

    $query = "DELETE FROM posts WHERE id = {$delete_id}";
        if (mysqli_query($conn, $query)) {
            var_dump($query);
            header('Location: '.ROOT_URL.'');
            var_dump($query);
        }else {
            echo "error".mysqli_error($conn);
        }
    }

    if (isset($_GET['order'])) {
        $order = $_GET['order'];
    }else{
        $order = 'id';
    }
    if (isset($_GET['sort'])) {
        $sort = $_GET['sort'];
    }else{
        $sort = 'DESC';
    }

    $sort == 'ASC' ? $sort = 'DESC' :  $sort = 'ASC';
    $query = "SELECT * FROM posts ORDER BY id $sort";

    $result = mysqli_query($conn, $query);
  
    $tHead =mysqli_fetch_assoc($result);
     $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
  //  var_dump($posts);


  //print_r(array_keys($posts));
   //print_r(array_keys($head));

    mysqli_close($conn); 
 ?>

    <?php include('inc/header.php') ?>
        <div class="contairner">
        <h1>Posts</h1>
        <table>
        <?php $h =array_keys($tHead); ?> 
            <tr>
                <th><a href="?order=id&&sort=<?php echo $sort ?>">id</a></th>
                <th><?php echo $h[1]; ?></th>
                <th><?php echo $h[2]; ?></th>
                <th><?php echo $h[3]; ?></th>



            </tr>
            <?php foreach($posts as $post): ?>       
            </tr>
            <tr>
           <td> <?php echo $post['id']; ?></td>  
           <td> <?php echo $post['title']; ?></td>  
           <td> <?php echo $post['body']; ?></td>  
           <td> <?php echo $post['author']; ?></td>  
           <td><a class="btn btn-success" href="<?php echo ROOT_URL; ?>
                editpost.php?id=<?php echo $post['id']; ?>">Edit</a></td>
                <td>
                <form method="POST" class="post_form" action="<?php echo $_SERVER['PHP_SELF'];?>">
					<input type="hidden" name="delete_id" value="<?php echo $post['id']; ?>">
					<input type="submit" name="delete" value="Delete" class="btn btn-danger">
			    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>

        <!-- <?php  foreach($searchRes as $res):?>
            <h1><?php echo $post['title']; ?></h1>
    <?php endforeach;?> -->

        </div>
    <?php include('inc/footer.php') ?>

 