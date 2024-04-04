<?php

$arr_values = array(
  1  => 'one',
  2  => 'two',
  3  => 'three',
  4  => 'four',
  5  => 'five',
  6  => 'six',
  7  => 'seven',
  8  => 'eight',
  9  => 'nine',
  10  => 'ten',
  11  => 'eleven',
  12  => 'twelve',
  13  => 'thirteen',
  14  => 'fourteen',
  15  => 'fifteen',
  16  => 'sixteen',
  17  => 'seventeen',
  18  => 'eighteen',
  19  => 'nineteen',
  20  => 'twenty',
  30  => 'thirty',
  40  => 'fourty',
  50  => 'fifty',
  60  => 'sixty',
  70  => 'seventy',
  80  => 'eighty',
  90  => 'ninety',
  100  => 'hundred',
  1000 => 'thousand'
);


$integer_in_word = '';  // число в строковой интерпритации
function number2words(int $int): string
{
  global $arr_values;
  global $integer_in_word;
  $remainder = 0;

  if ($int == 0) {
    return $integer_in_word .= 'zero'; 
  }

  if ($int <= 99) {
    foreach ($arr_values as $key => $value) {
      if (($int / $key) >= 1) {
        $tens = $key; // вычисляем десятки
      }
    }
    $units = $int % $tens; // вычисляем единицы
    $remainder = $int - ($tens + $units);
    if ($units > 0) {
      $integer_in_word .= $arr_values[$tens] . '-' . $arr_values[$units];
    } elseif ($units <= 0) {
      $integer_in_word .= $arr_values[$tens];
    }
  }

  if ($int >= 100 and $int <= 999) {
    $hundreds = floor($int / 100); // вычисляем количество сотен
    $remainder = $int - ($hundreds * 100); // вычисляем остаток    
    $integer_in_word .= $arr_values[$hundreds] . ' ' . $arr_values[100];
  }
  if ($remainder > 0) {
    $integer_in_word .= ' ';
     return number2words($remainder); // рекурсия на десятки
  }

  if ($int >= 1000 and $int <= 999999) {
    $hundreds = floor($int / 1000); // вычисляем количество тысяч
    $remainder = $int - ($hundreds * 1000); // вычисляем остаток    
    number2words($hundreds); // вложенная рекурсия на сотни или десятки(поэтому return отсутствует)
    $integer_in_word .= ' ' . $arr_values[1000];
  }
  if ($remainder > 0) {
    $integer_in_word .= ' ';
    return number2words($remainder);
  }
  return $integer_in_word;
}

//Функция перевода число от 0 до 999999 в строку;
echo number2words(111887);