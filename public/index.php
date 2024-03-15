<?php


use App\Word\Infrastructure\Controller\WordController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

require_once __DIR__ . '/../vendor/autoload.php';

$dc = [];

$routes = [
    'word' => (new Route('/', ['_controller' => WordController::class]))->setMethods(['GET']),
];

$rc = new RouteCollection();

foreach ($routes as $key => $route) {
    $rc->add($key, $route);
}

$context = new RequestContext();

$matcher = new UrlMatcher($rc, $context);
$request = Request::createFromGlobals();
$context->fromRequest($request);

try {
    $attributes = $matcher->match($context->getPathInfo());
    $ctrlName = $matcher->match($context->getPathInfo())['_controller'];
    $ctrl = new $ctrlName($dc);
    $request->attributes->add($attributes);
    if (isset($matcher->match($context->getPathInfo())['method'])) {
        $response = $ctrl->{$matcher->match($context->getPathInfo())['method']}($request);
    } else {
        $response = $ctrl($request);
    }
} catch (ResourceNotFoundException) {
    $response = new Response('Not found!', Response::HTTP_NOT_FOUND);
} catch (Exception $e) {
    $response = new Response(sprintf('An error occurred: %s', $e->getMessage()), Response::HTTP_INTERNAL_SERVER_ERROR);
}

$response->send();
