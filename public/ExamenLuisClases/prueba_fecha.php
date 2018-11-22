<?php

    $fecha = date ('Y-m-d H:i:s');

    echo '<pre>';
    print_r ($fecha);
    echo '</pre>';


    $email = 'luis/@gmai.com';

    function sanitiza ($data) {

        return filter_var ( $data, FILTER_SANITIZE_EMAIL );
    }

    $email2 = sanitiza($email);

    echo $email2;