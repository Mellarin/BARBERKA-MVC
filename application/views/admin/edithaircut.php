<?php
if(empty($_SESSION['admin'])){
    header('location: /'.'home');
    exit;
}
?>
<div class="content-wrapper" style="font-size:2rem;">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?php echo $title; ?></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <form action=" " method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Name</label>
                                <input style = "font-size:20px;"class="form-control" value ="<?php echo $data['name'] ?>"type="text" name="name" required>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <input style = "font-size:20px;" class="form-control" type="text" value ="<?php echo $data['description'] ?>" name="description" required>
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input class="form-control" type="file" name="img">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>