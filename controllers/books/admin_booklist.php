<?php
$data=App::get('database')->selectAll('books');
require './admin_booklist.php';



?>