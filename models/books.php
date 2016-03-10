<?php
function getBooks(){
    $booksStmnt = 'SELECT * from books';
    $pdoStmnt = $GLOBALS['cn']->query($booksStmnt);
    return $pdoStmnt->FetchAll();
}

function getBook($id){
    $bookSql = 'SELECT * FROM books WHERE id = :id';
    $bookStmnt = $GLOBALS['cn']->prepare($bookSql);
    $bookStmnt->execute([':id' => $id]);
    return $bookStmnt->fetch();
}
