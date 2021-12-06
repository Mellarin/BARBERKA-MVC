<?php if(!empty($_SESSION['admin'])){
    header('location: /'.'admin/panel');
    exit;
}
?>
<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div style="font-size:30px;font-align:center" class="card-header">ADMIN PANEL</div>
        <div style="font-size:30px;"class="card-body">
            <form action="/admin/login" method="post">
                <div class="form-group">
                    <label>Email</label>
                    <input style="font-size:20px;" class="form-control" type="text" name="email">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input style="font-size:20px;" class="form-control" type="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </form>
        </div>
    </div>
</div>