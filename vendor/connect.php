<?php

    $connect = mysqli_connect('localhost', 'root', '', 'sb');

    if (!$connect) {
        die('Error connect to DataBase');
    }