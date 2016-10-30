<?php
//function get_way_info($startPoint, $destination, $year, $month, $day, $hour, $minuteFirst, $minuteSecond) {
//$time =  date(i);
//var_dump($time);1
//if ($time % 5 == 0) {
//$url =  "http://transit.yahoo.co.jp/search/result?flatlon=&from=${startPoint}&tlatlon=&to=${destination}&via=&via=&via=&=${year}&m=${month}&d=${day}&hh=${hour}&m2=${minuteFirst}&m1=${minuteSecond}&type=1&ticket=ic&al=1&shin=1&ex=1&hb=1&lb=1&sr=1&s=0&expkind=1&ws=2&kw=${destination}";
$url = "http://transit.yahoo.co.jp/search/result?flatlon=&from=%E6%9D%89%E7%94%B0&tlatlon=&to=%E5%93%81%E5%B7%9D&via=&via=&via=&y=2016&m=10&d=29&hh=18&m2=0&m1=1&type=4&ticket=ic&al=1&shin=1&ex=1&hb=1&lb=1&sr=1&s=0&expkind=1&ws=2&kw=%E5%93%81%E5%B7%9D";
$trainWayHtml = file_get_contents($url);
//htmlデータを一行ずつわけて保存
$trainRaws = explode("\n", $trainWayHtml);
var_dump($trainRaws);

for($i = 0; $i < count($trainRaws)-1; $i++) {
  //第一候補を検索
  $pos = strpos($trainRaws[$i], "elmRouteDetail");
  if ($pos !== false) {
    for($n = 0; $n < 600; $n++) {
      //icnAlertを検索
      $pos = strpos($trainRaws[$i + $n], "icnAlert");
      if($pos !== false) {
        //遅延しているかどうか
        $pos = strpos($trainRaws[$i + $n], "遅延");
          if($pos !== false) {
            echo "遅延しています"; //遅延していたら1
            break 2;
          } else {
            $pos = strpos($trainRaws[$i + $n], "運休");
              if($pos !== false) {
                echo "運休しています"; //運休していたら2
                break 2;
              } else {
                echo "何かがおかしいです"; //何かがおかしいので2
                break 2;
              }
            }
          } else {
            echo "平常通りです"; //平常通りなら0
            break 2;
          }
        }
      }
    }
//  }
//  }
