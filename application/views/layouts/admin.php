<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $title; ?></title>
    <link href="/public/styles/bootstrap.css" rel="stylesheet">
    <link href="/public/styles/admin.css" rel="stylesheet">
    <link href="/public/styles/font-awesome.css" rel="stylesheet">
    <link href="/public/styles/style_new.css" rel="stylesheet">
    <script src="/public/scripts/jquery.js"></script>
    <script src="/public/scripts/bootstrap.js"></script>
</head>
<body class="fixed-nav sticky-footer bg-dark">
<?php if ($this->route['action'] != 'login'): ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav" style="font-size:2.5rem;">
        <a style="font-size:3rem"class="navbar-brand" href="/admin/posts">BARBERKA</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                <li class="nav-item">
                    <a class="nav-link" href="/admin/addhaircuts">
                        <i class="fa fa-fw fa-plus"></i>
                        <span class="nav-link-text">Add</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/posts">
                        <i class="fa fa-fw fa-list"></i>
                        <span class="nav-link-text">Haircuts</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/logout">
                        <i class="fa fa-fw fa-sign-out"></i>
                        <span class="nav-link-text">Exit</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
<?php endif; ?>
<?php echo $content; ?>
</body>
</html>