<?php if(!empty($_SESSION['user'])){
    header('location: /'.'profile');
    exit;
}
?>
<section class="login">
    <div class="container_new">
        <div class="header_new">
            <h2>LOGIN IN</h2>
            <?php
            if(isset($_SESSION['ACTIVATION_ISSUES'])){
                echo '<h2>YOU NEED TO ACTIVATE YOUR ACCOUNT TO LOGIN</h2>';
            }
            unset($_SESSION['ACTIVATION_ISSUES']);
            if(isset($_SESSION['USER_NOT_EXISTS'])){
                echo '<h2>User is not exists!</h2>';
            }
            unset($_SESSION['USER_NOT_EXISTS']);
            ?>
        </div>
        <form action ="/login" method="post" id="form" class="form">
            <div class="form-control">
                <label for="username">Email</label>
                <input type="email" placeholder="example@example.com" id="email" name="email" />
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
            </div>
            <div class="form-control">
                <label for="username">Password</label>
                <input type="password" placeholder="Password" id="password" name = "password"/>
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
            </div>
            <p>Does'nt have an accout?<a href="/register"> Register here</a></p>
            <button>Submit</button>
        </form>
    </div>
</section>