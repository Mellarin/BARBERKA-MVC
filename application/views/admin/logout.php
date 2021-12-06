<?php

if (!empty($_SESSION['admin'])) {
    header('location: /' . 'home');
    exit;
} else {
    unset($_SESSION['admin']);
    header('location: /' . 'home');
    exit;
}
