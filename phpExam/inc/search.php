<?php

$search = mysqli_real_escape_string($conn,$_POST['serachWorld'] );
$sql = "SELECT * FROM posts WHERE title LIKE '%".$search."%'";
$resulst = mysqli_query($sql);
$searchRes = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (isset($_POST['serachWorld'])) {
    foreach ($searchRes as $key) {
       echo '<p>'. $key['title'].'</p>';
    }
}

