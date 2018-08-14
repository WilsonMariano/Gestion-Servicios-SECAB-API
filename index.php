    <?php

    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;

    require_once 'composer/vendor/autoload.php';
    require_once 'clases/AccesoDatos.php';
    require_once 'clases/apis/facturaApi.php';
    require_once 'clases/apis/facturaPagaApi.php';
    require_once 'clases/apis/empresaApi.php';
   
   
    $config['displayErrorDetails'] = true;
    $config['addContentLengthHeader'] = false;

    $app = new \Slim\App(["settings" => $config]);


    // $app->add(function ($req, $res, $next){
	// 	$response = $next($req, $res);
	// 	return $response
	// 		->withHeader('Access-Control-Allow-Origin', '*')
    //         ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
    //         ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
	// });

	$app->group('/factura', function () {

        $this->get('/traer-todo[/]', \facturaApi::class . ':TraerTodo');
        $this->post('/insertar[/]', \facturaApi::class . ':Insertar');
        $this->post('/editar[/]', \facturaApi::class . ':Editar');
    });

	$app->group('/factura-paga', function () {

        $this->get('/traer/{id}', \facturaPagaApi::class . ':TraerTodo');
        $this->post('/insertar[/]', \facturaPagaApi::class . ':Insertar');
    });

    $app->group('/empresa', function () {

        $this->get('/traer-todo[/]', \empresaApi::class . ':TraerTodo');
    });


	$app->run();