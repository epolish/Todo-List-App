<?php

use Example\REST;
use Example\User;

spl_autoload_register(function($class_name) {
    require_once 'classes/'.str_replace('\\', '/', $class_name).'.php';
});

new REST($_SERVER['REQUEST_METHOD'], new User());