<?php

function index(){
    include('models/'.$GLOBALS['e'].'.php');
    $data['book'] = getBooks();
    $data['view'] = 'views/'.$GLOBALS['a'].$GLOBALS['e'].'.php';
    return $data;
}

function show(){
    if(isset($_GET['id'])){
        $id = intval($_GET['id']);
        include('models/'.$GLOBALS['e'].'.php');
        $data['book'] = getBook($id);
        $data['view'] = 'views/'.$GLOBALS['a'].$GLOBALS['e'].'.php';
        return $data;
    }else{
        die('missing id');
    }
}
