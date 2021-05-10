<?php

App::bind('config', require 'config.php');
// var_dump(App::get('config'));
// die;

App::bind('database', new QueryBuilder(
    Connection::make(App::get('config')['database'])
));