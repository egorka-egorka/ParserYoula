<?php

require_once('rb/rb-mysql.php');

R::setup('mysql:host=127.0.0.1;dbname=youlainf', 'root', '');

if(!R::testConnection()){
    exit('Нет соединения с базой данных');
}

// запись в базу данных
function to_data_base($table_name, $data_arr){

    $temp = R::dispense($table_name);

    foreach ($data_arr as $key => $data)
        $temp->$key = $data;
    R::store($temp);
}

//настраиваем связь между таблицами
function many_to_many($requestID, $adID){
    $resulta = R::load('requests', $requestID);
    $resultb = R::load('ads', $adID);

    $resulta->sharedRequests[] = $resultb;
    R::store($resulta);
}

//
//R::freeze(false);
//R::nuke();
//die();