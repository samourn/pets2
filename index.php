<?php
    // require autoload file
    require_once('vendor/autoload.php');

    // create instance of base class
    $f3 = Base::instance();

    // set debug level
    $f3->set('DEBUG', 3);

    // define a default route
    $f3->route('GET /', function() {
            $template = new Template();
            echo $template->render('views/home.html');
        }
    );

    // define a route using parameters
    $f3->route('GET /pets/show/@pet', function($f3, $params) {
            switch($params['pet']) {
                case 'dog':
                    echo '<img src="https://s7d1.scene7.com/is/image/PETCO/dog-category-090617-369w-269h-hero-cutout-d?fmt=png-alpha" alt="dog">'; break;
                case 'cat':
                    echo '<img src="http://www.catster.com/wp-content/uploads/2017/08/A-fluffy-cat-looking-funny-surprised-or-concerned.jpg" alt="cat">'; break;
                case 'hippo':
                    echo '<img src="http://ichef.bbci.co.uk/wwfeatures/wm/live/624_351/images/live/p0/3d/tk/p03dtkw2.jpg" alt="hippo">'; break;
                case 'phoenix':
                    echo '<img src="https://theswisspub.com/wp-content/uploads/2017/07/THE-PHOENIX.jpg" alt="phoenix">'; break;
                default:
                    $f3->error(404);
            }
        }
    );

//Define a form 1(order) route
$f3->route('GET /', function() {
    $template = new Template();
    echo $template->render('views/form1.html');
}
);

//Define a form 2(order2) route
$f3->route('GET /pets/order2', function() {
    echo'<h1>Form 2</h1>';
}
);

//Define a results route
$f3->route('GET /pets/results', function() {
    echo'<h1>Results</h1>';
}
);

    // run fat free
    $f3->run();