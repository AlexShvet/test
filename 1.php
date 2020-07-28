<?php
for($i = 0; $i <= 10000; $i++){//делаем
$number = mt_rand(0,999);//рандомный
$array[] = $number;//массив
}

$start = hrtime(true);//время начала сортировки пузырьком
for($j = 1; $j <= count($array)-1; $j++){
    for($i = 0; $i <= (count($array)-1)-$j; $i++){
        if($array[$i]>$array[$i+1]){
            list($array[$i],$array[$i+1]) = array($array[$i+1],$array[$i]);
        }//взял с сайта
    }//https://ru.wikipedia.org/wiki/Сортировка_пузырьком
}
$end = hrtime(true);//время конца сортировки
echo ($bable = ($end - $start)/1000000000)."<---время сортировки пузырьком<br>";

$start = hrtime(true);//время начала сортировки родной функцией
sort($array);
$end = hrtime(true);
echo ($php = ($end - $start)/1000000000)."<---время сортировки родной функцией php sort()<br>";
echo (round($bable/$php))."<---во столько раз быстрее родная функция";
?>