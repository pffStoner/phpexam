<?php
$rpp = 3;

isset($_GET['page']) ? $page = $_GET['page'] : $page = 0;

if ($page > 1) {
    $start = ($rpp * $page) - $rpp;
}else {
    $start = 0;
}
$query = "SELECT id FROM posts";
$resultSet = mysqli_query($conn, $query);

//get max rows
$maxRows = mysqli_num_rows($resultSet);
$totalPages = $maxRows/$rpp;

$query = "SELECT * FROM posts LIMIT $start, $rpp";

$resultSet = mysqli_query($conn, $query);

echo($maxRows);