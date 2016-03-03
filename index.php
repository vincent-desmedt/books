<?php
$view = 'allbooks.php';
$dbConfig = parse_ini_file('db.ini');
$PDOOptions = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
];

try {
    $dsn = sprintf('%s:host=%s;dbname=%s',$dbConfig['driver'],$dbConfig['host'],$dbConfig['dbname']);
    $cn = new PDO($dsn, $dbConfig['username'], $dbConfig['password'],$PDOOptions);
    $cn->query('SET CHARACTER SET UTF8');
    $cn->query('SET NAMES UTF8');
} catch(PDOException $e) {
    // quand on a un objet pour accèder aux méthodes on utilise ->
    die($e->getMessage());
}


$a = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'index';
$e = isset($_REQUEST['e']) ? $_REQUEST['e'] : 'books';
include('controllers/'.$e.'controller.php');

$datas = call_user_func($a);

include('views/view.php');
