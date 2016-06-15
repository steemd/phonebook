<?php
// Front-end
$app->get('/', 'Phonebook\\Controller\\PhoneController::indexAction');

$app->get('/admin', 'Phonebook\\Controller\\PhoneController::adminAction')
->before(function() {
  return App\Security\Security::varifyRoute();
});

$app->get('/admin/phone/list', 'Phonebook\\Controller\\PhoneController::listAction')
->before(function() {
  return App\Security\Security::varifyRoute();
});

$app->get('/admin/phone/add', 'Phonebook\\Controller\\PhoneController::addAction')
->before(function() {
  return App\Security\Security::varifyRoute();
});

$app->match('/login', 'Phonebook\\Controller\\SecurityController::loginAction')
->method('GET|POST');

$app->get('/logout', 'Phonebook\\Controller\\SecurityController::logoutAction');

// REST API
$app->get('/api/v1/phones', 'Phonebook\\Controller\\RestController::getPhonesAction');

$app->get('/api/v1/phones/{id}', 'Phonebook\\Controller\\RestController::getPhonesOneAction');

$app->post('/api/v1/phones', 'Phonebook\\Controller\\RestController::addPhonesAction')
->before(function() {
  return App\Security\Security::varifyRoute();
});

$app->delete('/api/v1/phones/{id}', 'Phonebook\\Controller\\RestController::removePhonesAction')
->before(function() {
  return App\Security\Security::varifyRoute();
});
