<?php

require_once ('./vendor/autoload.php');
include ("D:\dev\g173116\SmatryTest\bd.php");

$smarty = new Smarty;
$smarty->template_dir = 'templates/';

//массив с категориями
$categories = [
    "Спецтехника и мотоциклы" => [
        [
            "cId" => "25",
            "scId" => '',
            "name" => "Все"
        ],
        [
            "cId" => "25",
            "scId" => '01',
            "name" => "Автобусы и грузовики"
        ],
        [
            "cId" => "25",
            "scId" => '02',
            "name" => "Водный транспорт"
        ],
        [
            "cId" => "25",
            "scId" => '03',
            "name" => "Мототехника"
        ]
    ],
    "Запчасти и автотовары" => [
        [
            "cId" => "1",
            "scId" => '',
            "name" => "Все"
        ],
        [
            "cId" => "1",
            "scId" => '09',
            "name" => "Запчасти"
        ],
        [
            "cId" => "1",
            "scId" => '10',
            "name" => "Шины и диски"
        ],
        [
            "cId" => "1",
            "scId" => '19',
            "name" => "Аксесуары и инструменты"
        ]
    ],
    "Недвижимость" => [
        [
            "cId" => "20",
            "scId" => '',
            "name" => "Все"
        ],
        [
            "cId" => "20",
            "scId" => '01',
            "name" => "Продажа квартиры"
        ],
        [
            "cId" => "20",
            "scId" => '04',
            "name" => "Продажа участка"
        ],
        [
            "cId" => "20",
            "scId" => '08',
            "name" => "Прочие строения"
        ]
    ],
    "Услуги" => [
        [
            "cId" => "16",
            "scId" => '',
            "name" => "Все"
        ],
        [
            "cId" => "16",
            "scId" => '02',
            "name" => "Ремонт и строительство"
        ],
        [
            "cId" => "16",
            "scId" => '08',
            "name" => "Красота и здоровье"
        ],
        [
            "cId" => "16",
            "scId" => '19',
            "name" => "Уход за животными"
        ]
    ],
    "Для бизнеса" => [
        [
            "cId" => "21",
            "scId" => '',
            "name" => "Все"
        ],
        [
            "cId" => "21",
            "scId" => '01',
            "name" => "Готовый бизнес"
        ],
        [
            "cId" => "21",
            "scId" => '02',
            "name" => "Оборудование"
        ]
    ]
];

$smarty->assign('categories', $categories);

$query = isset($_REQUEST['search'])
    ? $_REQUEST['search']
    : '';

$smarty->assign('query', $query);

if(isset($_REQUEST['category'])) {
    $category = $_REQUEST['category'];
    $arr_category = explode("&", $category);
    $cId = isset($arr_category[0]) &&  is_numeric($arr_category[0]) ? $arr_category[0] : '';
    $scId = isset($arr_category[1]) &&  is_numeric($arr_category[1])? $arr_category[1] : '';
    $smarty->assign('scId', $scId);
    $smarty->assign('cId', $cId);
}
else {
    $cId = '';
    $scId = '';
}

$cityID = "576d0612d53f3d80945f8b5d";
$cityNAME = "Москва";
if (isset($_REQUEST['city']) && $_REQUEST['city'] != ''){
    $city = $_REQUEST['city'];
    $city = unicode_convert($city);
    $url_city = "https://youla.ru/web-api/geo/search?query=$city";
    $response_json = @file_get_contents($url_city, FALSE);

    if ($response_json == null) {
        $cityID = "576d0612d53f3d80945f8b5d";
        $cityNAME = "Москва";
    }
    else {
        $response = json_decode($response_json, true);
        $cityID = $response[0]['id'];
        $cityNAME = $response[0]['name'];
    }
}

$smarty->assign('cityNAME', $cityNAME);
$new_ads = []; // новые объявления на сайте
// обработка запроса
if (($query || $cId) && $cityID) {

    $requests_arr = [];
    $requests_arr['query'] = $query;
    $requests_arr['category'] = $cId;
    $requests_arr['subcategory'] = $scId;


    $all_ads_arr = read_ads($query, $cityID, $cId, $scId); // все объявления, найденные по запросу


    $requestArr = R::find('requests', 'query = ?', [$query]);

    if (!empty($requestArr)) {
        $query_id = key($requestArr);
        $result = R::load('requests', $query_id);
        $resulta = $result->sharedAds;

        foreach ($all_ads_arr as $key => $ad_arr) {
            $tru = true;
            foreach ($resulta as $resultb) {
                if ($resultb->url == $ad_arr['url'] && $resultb->title == $ad_arr['title'] && $resultb->image == $ad_arr['image'] &&
                    $resultb->price == $ad_arr['price'] && $resultb->date == $ad_arr['date']) {
                    $tru = false;
                }
            }
            if ($tru == true) {
                $new_ads[] = $ad_arr;

                to_data_base('ads', $ad_arr);
                $ad_id = R::getInsertID();

                many_to_many($query_id, $ad_id);
            }
        }
    } else {
        to_data_base('requests', $requests_arr);
        $query_id = R::getInsertID();

        $ads_arr = R::getAll('SELECT * FROM `ads`');

        foreach ($all_ads_arr as $ad_arr) {
            if (!empty($ads_arr)) {
                $tru = true;
                foreach ($ads_arr as $ad) {
                    if ($ad['url'] == $ad_arr['url'] && $ad['title'] == $ad_arr['title'] && $ad['image'] == $ad_arr['image'] &&
                        $ad['price'] == $ad_arr['price'] && $ad['date'] == $ad_arr['date']) {
                        $tru = false;
                    }
                }
                if ($tru == true) {
                    to_data_base('ads', $ad_arr);
                    $ad_id = R::getInsertID();

                    many_to_many($query_id, $ad_id);
                    $new_ads[] = $ad_arr;
                }
            } else {
                to_data_base('ads', $ad_arr);
                $ad_id = R::getInsertID();

                many_to_many($query_id, $ad_id);

                $new_ads[] = $ad_arr;
            }
        }
    }
    if(isset($_REQUEST['r11']) && $_REQUEST['r11'] == "all"){
        $smarty->assign('table', $all_ads_arr);
    }
    else{
        $smarty->assign('table', $new_ads);
    }
}

$smarty->display('index.tpl.htm');

// парсит html-код по Xpath-запросу
function parsing_html($html_code, $xquery)
{
    $dom = new DOMDocument();
    @$dom->loadHTML($html_code);

    $xpath = new DOMXPath($dom);
    $results = $xpath->query($xquery);

    $temp = [];
    foreach ($results as $key => $value) {
        $temp[] = utf8_decode($results[$key]->nodeValue);
    }
    return $temp;
}

// переводит строку в русские буквы
function unicode_convert($str)
{
    $str = preg_replace_callback('/\\\\u([0-9a-fA-F]{4})/', function ($match) {
        return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');
    }, $str);
    return $str;
}

// чтение всех объявлений по запросу с сайта Юла
function read_ads($query, $cityID, $cId, $scId){
    $result_arr = [];

    $xquery_image = '//div[@class="product_item__image"]/img/@src';
    $xquery_title = '//div[@class="product_item__title"]';
    $xquery_price = '//div[./@class[contains(.,"product_item__description")]]';
    $xquery_product_url = '//li[@class="product_item"]/a/@href';
    $xquery_date = '//span[@class="visible-xs"]';

    for ($i = 1; $i < 4; ++$i) {
        $url = "https://youla.ru/web-api/products?attributes[sort_field]=date_published&city=$cityID&cId=$cId&page=$i&q=$query&scId=$scId";

        $response_json = @file_get_contents($url, FALSE);
        if ($response_json == null) {
            print "ЧТО БЛЯТЬ ЗА ХУЙНЯ";
            break;
        }

        $response = json_decode($response_json, true);

        $html_code = $response["html"];

        $product_urls_arr = parsing_html($html_code, $xquery_product_url); // ссылка на объявление
        $image_arr = parsing_html($html_code, $xquery_image); // картинка
        $title_arr = parsing_html($html_code, $xquery_title); // название объявления
        $price_arr = parsing_html($html_code, $xquery_price); // цена продукта
        foreach($price_arr as &$value) {
            if(strpos($value,"?") !== false)
                $value = substr($value,0,strpos($value,"?") - 1);
        }
        $date_arr = parsing_html($html_code, $xquery_date); // дата размещения

        foreach ($product_urls_arr as $key => $url) {
            $obj = [];
            $obj["url"] = $url;
            $obj["title"] = $title_arr[$key];
            $obj["image"] = $image_arr[$key];
            $obj["price"] = $price_arr[$key];
            $obj["date"] = $date_arr[$key];

            $result_arr[] = $obj;
        }
    }
    return $result_arr;
}