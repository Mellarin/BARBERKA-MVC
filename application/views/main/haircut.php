
<section class="about" id="Haircuts" style="background-color:#868686;">
    <h1  class="heading"><? echo $data['name']?></h1>


    <div class="row" >


        <div class="image">


            <<img style="border: 25px solid #ffffff" src="<?php echo '/public/usersImages/'.$data['ID'].'.jpg' ?>" alt="">
        </div>


        <div class="content">


            <p><?php echo $data['description']?></p> ?></p>

            <a href="/haircuts" class="btn">Back</a>


        </div>


    </div>
</section>