<?php

require './libs/Application.php';
require './libs/Controller.php';
require './db/Db.php';
require  './config/config.php';
require './libs/Utils.php';
require_once './Repository/AbstractRepository.php';
require './libs/Authentication.php';

session_start();
$app = new Application();

?>