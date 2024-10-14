<?php 
session_start();
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap-5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="wrapper">

        <?php include 'inc/navbar.php'; ?>
        
        <div class="content">
            <?php
        if (isset($_GET['pg'])) {
            if (file_exists('content/'. $_GET['pg']. '.php')) {
                include 'content/' . $_GET['pg']. '.php';
            } else {
                echo "<h1>Halaman tidak ditemukan</h1>";           }
            }else {
                include 'content/dashboard.php';
            }
            ?>
    </div>
    
    
    <footer class="fixed-bottom text-center border-top">
        Copyright &copy 2024 PPKD - Jakarta Pusat
    </footer>
    <script src="bootstrap-5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</div>
</body>

</html>