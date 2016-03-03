<?php
try {
    $cn = new PDO('mysql:host=localhost;dbname=bibliographie','root','');
    $cn->query('SET CHARACTER SET UTF8');
    $cn->query('SET NAMES UTF8');
} catch(PDOException $e) {
    // quand on a un objet pour accèder aux méthodes on utilise ->
    echo $e->getMessage();
}
