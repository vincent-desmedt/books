<?php
$dbConfig = parse_ini_file('db.ini');


try {
    $dsn = sprintf('%s:host=%s;dbname=%s',$dbConfig['driver'],$dbConfig['host'],$dbConfig['dbname']);
    $cn = new PDO($dsn, $dbConfig['username'], $dbConfig['password']);
    $cn->query('SET CHARACTER SET UTF8');
    $cn->query('SET NAMES UTF8');
} catch(PDOException $e) {
    // quand on a un objet pour accèder aux méthodes on utilise ->
    echo $e->getMessage();
}

$booksStmnt = 'SELECT * from books';
$pdoStmnt = $cn->query($booksStmnt);
$books = $pdoStmnt->FetchAll();

foreach ($books as $books) {
    echo $books['title'].'<br>';
}
