<?php
// Front-end
$app->get('/', 'Phonebook\\Controller\\PhoneController::indexAction');

$app->get('/admin', 'Phonebook\\Controller\\SecurityController::loginAction');

$app->post('/admin', 'Phonebook\\Controller\\PhoneController::addAction');

// REST API
$app->get('/api/v1/phones', 'Phonebook\\Controller\\RestController::getPhonesAction');

$app->get('/api/v1/phones/{id}', 'Phonebook\\Controller\\RestController::getPhonesOneAction');

$app->post('/api/v1/phones', 'Phonebook\\Controller\\RestController::addPhonesAction');
