<?php
if($_SESSION['admin']['access']!='admin'){
    header('location: /'.'admin/panel');
    exit;
} else {
    header('location: /'.'admin/addhaircuts');
    exit;
}

