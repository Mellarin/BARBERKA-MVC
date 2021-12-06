<!DOCTYPE html>
<html lang="en">
<head>
    <title>PAGE NOT FOUND!</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="/public/styles/style_new.css" rel="stylesheet">
    <link href="/public/styles/style.css" rel="stylesheet">
    <script src="/public/scripts/jquery.js"></script>
    <script src="/public/scripts/form.js"></script>
    <script src="/public/scripts/popper.js"></script>
    <script src="/public/scripts/bootstrap.js"></script>
</head>
<body>
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
</html>
<section class="error" id="error">
    <h1 class="heading"> Page not found!</h1>
    <div class="row">
        <div class="content">
            <h3>404</h3>
            <a href="/home" class="btn">BACK</a>
        </div>
    </div>
</section>
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


