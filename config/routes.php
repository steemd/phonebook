<?php
// Front-end
$app->get('/', 'Phonebook\\Controller\\PhoneController::indexAction');

$app->get('/add', 'Phonebook\\Controller\\PhoneController::addAction')
->before(function() {
  return App\Security\Security::varifyRoute();
});

$app->match('/login', 'Phonebook\\Controller\\SecurityController::loginAction')
->method('GET|POST');

$app->get('/logout', 'Phonebook\\Controller\\SecurityController::logoutAction');

// REST API
$app->get('/api/v1/phones', 'Phonebook\\Controller\\RestController::getPhonesAction');

$app->get('/api/v1/phones/{id}', 'Phonebook\\Controller\\RestController::getPhonesOneAction');

$app->post('/api/v1/phones', 'Phonebook\\Controller\\RestController::addPhonesAction');
