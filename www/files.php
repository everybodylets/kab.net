<?php
session_start();
if ($_SESSION['authorized']<>1) {
    header("Location: login");
    exit;
}
header("Content-type: text/html; charset=UTF-8");
setlocale(LC_ALL, 'rus');
// Здесь нужно сделать все проверки передаваемых файлов и вывести ошибки если нужно

// Переменная ответа

$data = array();

if( isset( $_GET['uploadfiles'] ) ){
    $error = false;
    $files = array();

    $uploaddir = 'uploads/'.$_GET['id'].'/'; // . - текущая папка где находится submit.php

    // Создадим папку если её нет

    if( ! is_dir( $uploaddir ) ) mkdir($uploaddir);

    // переместим файлы из временной директории в указанную
    foreach( $_FILES as $file ){
        if( move_uploaded_file( $file['tmp_name'], $uploaddir . iconv("UTF-8","windows-1251", basename($file['name'])) ) ){
            $files[] = $file['name'];
        }
        else{
            $error = true;
        }
    }

    $data = $error ? array('error' => 'Ошибка загрузки файлов.') : array('files' => $files );

    echo json_encode( $data );
}