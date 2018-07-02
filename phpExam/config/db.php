<?php   

$conn = mysqli_connect(DB_HOST, DB_USER, '', DB_NAME);

if (mysqli_connect_errno()) {
    echo "Coonection failed".mysqli_connect_errno();
}else {
}
