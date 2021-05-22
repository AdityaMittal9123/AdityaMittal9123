<?php
$datas=App::get('database')->selectAll('books');
require './view/Book_details.php';

?>