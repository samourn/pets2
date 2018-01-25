<?php
    //Start the session
    session_start();

    // require autoload file
    require_once('vendor/autoload.php');

    // create instance of base class
    $f3 = Base::instance();
    $f3->set('colors', array('pink', 'green', 'blue'));

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
    $f3->route('GET /pets/order', function($f3, $params) {
            $template = new Template();
            echo $template->render('views/form1.html');
        }
    );

    //Define a form 2(order2) route
    $f3->route('POST /pets/order2', function($f3, $params) {
            $template = new Template();
            echo $template->render('views/form2.html');

            $_SESSION['animal'] = $_POST['animal'];
        }
    );

    //Define a results route
    $f3->route('POST /pets/results', function($f3, $params) {
            echo'<h1>Results</h1>';

            $_SESSION['color'] = $_POST['color'];
            echo "<h3>Thank you for ordering a ".$_SESSION['color']." ".
                $_SESSION['animal']."</h3>";
        }
    );

    //define a order form route
    $f3->route('GET|POST /new-pet', function($f3) {
        $template = new Template();
        echo $template->render('views/new-pet.html');

        if(isset($_POST['submit'])) {
            $color = $_POST['pet-color'];
            include('model/validate.php');
            $f3->set('color', $color);
        }
    }
    );



    // run fat free
    $f3->run();