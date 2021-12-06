<?php
if(empty($_SESSION['user'])){
    header('location: /'.'home');
    exit;
}
?>
<section class="register_new">
    <div class="container_new">
        <div class="header_new">
            <h2>Update information</h2>
            <?php
            if(isset($_SESSION['UPDATEISSUES'])){
                echo '<h2> Invalid data!</h2>';
            }
            unset($_SESSION['UPDATEISSUES']);
            ?>
        </div>
        <form action="/profile/change" method = "post" id="form" class="form" enctype="multipart/form-data">
            <div class="form-control">
                <label for="username">Username</label>
                <input type="text" value="<?php echo $data['username'] ?>" id="username" name="username" />
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
            </div>
            <div class="form-control">
                <label for="username">Email</label>
                <input type="email" value="<?php echo $data['email'] ?>" id="email" name="email" />
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
            </div>
            <div class="form-control">
                <label for="username">Phone number</label>
                <input type="number" value="<?php echo $data['phone'] ?>" id="password2" name="phone" />
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
            </div>
            <div class="form-control">
                <label for="username">Avatar</label>
                <input type="file" name="img" />
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
            </div>
            <p style="color:#777;"><a style="color:#777;" href="/profile">Back</a></p>
            <button>Submit</button>
        </form>
    </div>
</section>