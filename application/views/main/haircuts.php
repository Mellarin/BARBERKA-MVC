<section class="haircuts" id="Haircuts">
    <h1 class="heading"> Popular haircuts </h1>
    <div class="box-container">
        <?php foreach($list as $value): ?>
            <div class="box">
                <img src="<?php echo '/public/usersImages/'.$value['ID'].'.jpg' ?>" alt="">
                <div class="info">
                    <h3><?php echo $value['name'] ?></h3>
                    <p><?php echo $value['description'] ?></p>
                    <a href="<? echo '/haircut/'.$value['ID']?>" class="btn">Details</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>