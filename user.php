<?php

require_once('./vendor/autoload.php');

$smarty = new Smarty;
$smarty->template_dir = 'templates/';

if(isset($_GET['infoUser'])) {
    $url = $_GET['infoUser'];

    $info_arr = [];
    $urlUser = file_get_contents("https://youla.ru/moskva$url");
    preg_match_all('/"owner":{"id":\"([A-Za-z0-9]+)"/uis', $urlUser, $userID);
    preg_match_all('#"owner":{"id":"[A-Za-z0-9]+","name":"([^"]+?)"#uis', $urlUser, $userNAME);
    preg_match_all('/"displayPhoneNum":"([0-9]+)"/uis', $urlUser, $userPHONE);
    preg_match_all('#"location":{"description":\"([^"]+?)"#uis', $urlUser, $userCITY);
    preg_match_all('/"image":{"id":"[A-Za-z0-9]+","num":[0-9]+,"url":"(.+?)"/uis', $urlUser, $userURL);

    $info_arr['userNAME'] = unicode_convert($userNAME[1][0]);
    $info_arr['userID'] = $userID[1][0];
    $info_arr['userPHONE'] = $userPHONE[1][0];
    $info_arr['userCITY'] = unicode_convert($userCITY[1][0]);
    $info_arr['userURL'] = $userURL[1][0];

    $smarty->assign('infoUser', $info_arr);
}

$smarty->display('user.tpl.htm');

function unicode_convert($str)
{
    $str = preg_replace_callback('/\\\\u([0-9a-fA-F]{4})/', function ($match) {
        return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');
    }, $str);
    return $str;
}