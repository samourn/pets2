<?php
    // require autoload file
    require_once('vendor/autoload.php');

    // create instance of base class
    $f3 = Base::instance();

    // define a route using a template
    $f3->route('GET /', function() {
            $template = new Template();
            echo "Pets 2";
        }
    );

    // run fat free
    $f3->run();