<?php
require('config/db.php');

if (isset($_POST['search'])) {
  $search =  mysqli_real_escape_string($conn, $_POST['serachWorld']);
  $sql = "SELECT * FROM posts WHERE title LIKE '%".$search."%'";
  $result = mysqli_query($conn, $sql);
  
    //$tHead =mysqli_fetch_assoc($result);
    $searchRes = mysqli_fetch_all($result, MYSQLI_ASSOC);


    foreach ($searchRes as $key) {
       echo $key['title'];
    }
     //var_dump($posts);
   //   var_dump($searchRes);
     //var_dump($s);
}

?>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">PHP Blog</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo ROOT_URL ?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo ROOT_URL ?>addPost.php">Add Post <span class="sr-only">(current)</span></a>
      </li>
     
     
    </ul>
    <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" name="serachWorld" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" name="search" type="submit">Search</button>
    </form>
  </div>
</nav>