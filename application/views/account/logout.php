<?php
if (!empty($_SESSION['user'])) {
    header('location: /' . 'home');
    exit;
} else {
    unset($_SESSION['user']);
    header('location: /' . 'home');
    exit;
}
