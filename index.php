<?php 
require_once (/Class/ReversStrops.php);
$str = 'При!вет! Давно не виде.лись.';
$stropsrevers = new ReversStrops;
$stropsrevers ->getStrops($str);
echo $stropsrevers;
exit;




/*
 * убираем все знаки из массивов и делаем реверс
 */
foreach ($chars as $charss){
    $subject[$carsshet] = mb_strrev(preg_replace('/[^ a-zа-яё\d]/ui', '',$charss ));
    $carsshet ++;
}


    $countcharset = count($chars)-1;
    $newresultarray = array();
for ($i=0;$i <=$countcharset;$i++){
    $gotstr = getarraystr($chars[$i]);  // получаем массив побуквенно со знаками препинания
    $gotstra = getarraystr($subject[$i]); // получаем массив побуквенно без знаков
    $result = array_diff($gotstr, $gotstra); // получаем количество знаков препинания в массив
    $result  = array_values($result); // сбрасываем ключи массива
    $resaltarray = getstrupper($gotstr,$gotstra,$result); // получаем массив побуквенно перевенутый со знаками и сохраненным регистром

/*
 * если массив есть то объединяем его в строку
 */
    if ($resaltarray){
        $newstring = '';
        foreach ($resaltarray as $item) {
            $newstring .= $item;
        }
        $newresultarray[$i] = $newstring;
    }
}
    $newresultarray = implode(' ',$newresultarray);
    echo '<pre>';
    echo '<p>' . $newresultarray . '</p>';
    echo '</pre>';

    ?>
</div>


<?php
function getstrupper ($chars,$gotstra,$simbols){
  $go = 0;
  $ch = 0;
  $cq = 0;
  $result = array();
      foreach ($chars as $charss) {
          if (is_symbol($charss, $simbols, $cq)) {  // если это не буква
              $result[$ch] = $charss;
              $cq++;
              $ch++;

          }else {
              // проверка на регистр символа
              $chr = mb_substr($charss, 0, 1, 'utf-8');
              if (mb_strtolower($chr, 'utf-8') != $chr) {
                  $result[$ch] = mb_strtoupper($gotstra[$go]);
                  $go++;
                  $ch++;
              }else {
                  $result[$ch] = mb_strtolower($gotstra[$go]);
                  $go++;
                  $ch++;
              }


          }
      }


    return $result;
}

function mb_strrev($string)
{
    $strrev = "";
    for($i = mb_strlen($string, "UTF-8"); $i >= 0; $i--) {
        $strrev .= mb_substr($string, $i, 1, "UTF-8");
    }
    return $strrev;
}

function getarraystr($str){
    $str =  preg_split('//u', $str, -1, PREG_SPLIT_NO_EMPTY);
    return $str;
}

function is_symbol($charss,$simbols,$cq){
if (array_key_exists($cq,$simbols)) {  // если это не буква
    if ($charss === $simbols[$cq]){
        return true;
    }
}
return false;
}