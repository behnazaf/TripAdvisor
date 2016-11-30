<?php
session_start();


require_once 'vendor/autoload.php';
require_once 'master.php';



$app = new \Slim\Slim(array(
    'view' => new \Slim\Views\Twig()
        ));

$view = $app->view();
$view->parserOptions = array(
    'debug' => true,
    'cache' => dirname(__FILE__) . '/cache'
);
$view->setTemplatesDirectory(dirname(__FILE__) . '/templates');


if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = array();
}

$twig = $app->view()->getEnvironment();
$twig->addGlobal('sessionUser', $_SESSION['user']);

$app->get('/', function() use ($app) {
   // $airportList = DB::query("SELECT * FROM airports");
    $app->render('index.html.twig');
});


$app->get('/viewAirport', function() use ($app) {
    $airportList = DB::query("SELECT * FROM airports");
    $app->render('airport.html.twig', array(
        'airportList' => $airportList
    ));
});

$app->get('/city', function() use ($app) {

    $record = DB::query("SELECT * FROM cities");
    // 404 if record not found
    if (!$record) {
        $app->response->setStatus(404);
        echo json_encode("Record not found");
        return;
    }
    echo json_encode($record, JSON_PRETTY_PRINT);
});


$app->post('/addAirport', function() use ($app) {
    $name = $app->request()->post('name');
    $code = $app->request()->post('code');
    $cityCount = $app->request()->post('city');
    $cityC=explode('-', $cityCount);
    $city=$cityC[0];
    $country=$cityC[1];
    
    // FIXME: make sure the item is not in the cart yet
    $item = DB::queryFirstRow("SELECT * FROM airports WHERE code=%s", $code);
    if ($item) {
       return;
    } else {
        DB::insert('airports', array(
            'name' => $name,
            'code' => $code,
            'city' => $city,
            'country'=>$country
        ));
         $airportList = DB::query("SELECT * FROM airports");
          $app->render('airport.html.twig', array(
        'airportList' => $airportList
    ));
    }
    });



$app->get('/login', function() use ($app, $log) {
    $app->render('login.html.twig');
});

$app->post('/login', function() use ($app, $log) {
    $email = $app->request->post('email');
    $pass = $app->request->post('pass');
    $user = DB::queryFirstRow("SELECT * FROM users WHERE email=%s", $email);
    if (!$user) {
        $log->debug(sprintf("USERRRUser failed for email %s from IP %s", $email, $_SERVER['REMOTE_ADDR']));
        $app->render('login.html.twig', array('loginFailed' => TRUE));
    } else {
        // password MUST be compared 
        //if ($user['password'] == hash('sha256', $pass)) {
        if ($pass==$user['password']) {
            // LOGIN successful
            unset($user['password']);
            $_SESSION['user'] = $user;
            $log->debug(sprintf("User %s logged in successfuly from IP %s", $user['ID'], $_SERVER['REMOTE_ADDR']));
            $app->render('login_success.html.twig');
        } else {
            $log->debug(sprintf("PASSSSSUser failed for email %s from IP %s", $email, $_SERVER['REMOTE_ADDR']));
            $app->render('login.html.twig', array('loginFailed' => TRUE));
        }
    }
});
$app->get('/register', function() use ($app, $log) {
    $app->render('register.html.twig');
});

$app->post('/register', function() use ($app, $log) {
    $name = $app->request->post('name');
    $email = $app->request->post('email');
    $pass1 = $app->request->post('pass1');
    $pass2 = $app->request->post('pass2');
    $valueList = array('name' => $name, 'email' => $email);
   
    $errorList = array();
    if (strlen($name) < 4) {
        array_push($errorList, "Name must be at least 4 characters long");
        unset($valueList['name']);
    }
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
        array_push($errorList, "Email does not look like a valid email");
        unset($valueList['email']);
    } else {
        $user = DB::queryFirstRow("SELECT ID FROM users WHERE email=%s", $email);
        if ($user) {
            array_push($errorList, "Email already registered");
            unset($valueList['email']);
        }
    }
    // ALTERNATIVE: if (($msg = verifyPassword($pass1)) !== TRUE) {
  //  $msg = verifyPassword($pass1);
    $msg =TRUE;
    if ($msg !== TRUE) {
        array_push($errorList, $msg);
    } else if ($pass1 != $pass2) {
        array_push($errorList, "Passwords don't match");
    }
    //
    if ($errorList) {
        // STATE 3: submission failed        
        $app->render('register.html.twig', array(
            'errorList' => $errorList, 'v' => $valueList
        ));
    } else {
        // STATE 2: submission successful
        DB::insert('users', array(
            'name' => $name, 'email' => $email,
            'password' =>$pass1
            //password_hash($pass1, CRYPT_BLOWFISH)
                // 'password' => hash('sha256', $pass1)
        ));
        $id = DB::insertId();
        $log->debug(sprintf("User %s created", $id));
        $app->render('register_success.html.twig');
    }
});


$app->get('/logout', function() use ($app, $log) {
    $_SESSION['user'] = array();
    $app->render('logout_success.html.twig');
});
$app->run();




