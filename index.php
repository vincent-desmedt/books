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
    echo $e->getMessage();
}

include('book.php');

if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    $book = getBook($id);
    $view = 'singlebook.php';
}else{
    $books = getBooks();
    $view = 'allbooks.php';
}

include('view.php');
