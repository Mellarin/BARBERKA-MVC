<!DOCTYPE html>
<html lang="en" ng-app>
<head>
    <title><?php echo $title; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="/public/styles/style_new.css" rel="stylesheet">
    <link href="/public/styles/style.css" rel="stylesheet">
    <link href="/public/styles/style_form.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="/public/scripts/jquery.js"></script>
    <script src="/public/scripts/bootstrap.js"></script>
    <script src="/public/scripts/script.js"></script>
</head>
<body ng-apps=" ">
<header class="header">
    <a href="/home" class="logo">BARBERKA</a>
    <nav class ="navbar">
        <a href="/home">Home</a>
        <a href="/about">About Us</a>
        <a href="/gallery">Gallery</a>
        <a href="/haircuts">Haircuts</a>
        <a href="/price">Price</a>
        <?php if(empty($_SESSION['user']))
        {
            echo '<a href="/login">Login</a>';
        } else {
            echo '<a href="/profile">Profile</a>';
        }
            ?>
    </nav>
    <div id="menu-btn" class="fas fa-bars"></div>
</header>
<?php echo $content; ?>
<div class="footer">
    <div class="SHAREUS">
        <a href="https://www.youtube.com/watch?v=-452p_9ESbM">Youtube</a>
        <a href="https://www.youtube.com/watch?v=-452p_9ESbM">Instagram</a>
        <a href="https://www.youtube.com/watch?v=-452p_9ESbM">Twitter</a>
        <a href="https://www.youtube.com/watch?v=-452p_9ESbM">Facebook</a>
    </div>
    <h1 class="me">created by Oleksiy Vakhniuk</h1>
</div>
<script src="script.js"></script>
</body>

</html>

</html>