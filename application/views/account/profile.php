<?php
if(empty($_SESSION['user'])){
    header('location: /'.'home');
    exit;
}
echo $data['ID'];
?>

<section class = "profile">
    <div class="wrapper">
        <div class="left">
            <img src="<? echo './public/imagesOfAccounts/'. $data['ID'].'.jpg' ?>" alt="user" width="100">
            <h4><? echo $data['username'] ?></h4>
            <p><? echo $data['access'] ?></p>
        </div>
        <div class="right">
            <div class="info">
                <h3>Information</h3>
                <div class="info_data">
                    <div class="data">
                        <h4>Email</h4>
                        <p><? echo $data['email'] ?></p>
                    </div>
                    <div class="data">
                        <h4>Phone</h4>
                        <p><? echo $data['phone'] ?></p>
                    </div>
                </div>
            </div>
            <div class="info">
                <div class="projects_data">
                    <div class="data">
                        <h4>Barber</h4>
                        <p>Oleksii Vakhniuk</p>
                        <br>
                        <a href='/profile/change' style="color:#777;">Update</a>
                    </div>
                    <div class="data">
                        <h4>Date of registration</h4>
                        <p><? echo $data['dateofregistration'] ?></p>
                        <br>
                        <a href="/logout" style="color:#777;">Logout</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
