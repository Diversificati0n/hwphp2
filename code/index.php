
<?php

//1. Реализовать основные 4 арифметические операции в виде функции с тремя параметрами
//– два параметра это числа, третий – операция. Обязательно использовать оператор return.

function arithmeticOperation($num1, $num2, $operation) {
    switch ($operation) {
        case 'add':
            return $num1 + $num2;
        case 'subtract':
            return $num1 - $num2;
        case 'multiply':
            return $num1 * $num2;
        case 'divide':
            if ($num2 != 0) {
                return $num1 / $num2;
            } else {
                return "Нельзя делить на ноль!";
            }
        default:
            return "Неверная операция!";
    }
}

$result = arithmeticOperation(5, 0, 'divide');
//echo "Результат: " . $result;



//2. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), где $arg1,
//$arg2 – значения аргументов,
//$operation – строка с названием операции.
//В зависимости от переданного значения операции выполнить одну из арифметических операций
//(использовать функции из пункта 3) и вернуть полученное значение (использовать switch).

function mathOperation($arg1, $arg2, $operation) {
    switch ($operation) {
        case 'add':
            return $arg1 + $arg2;
        case 'subtract':
            return $arg1 - $arg2;
        case 'multiply':
            return $arg1 * $arg2;
        case 'divide':
            if ($arg2 != 0) {
                return $arg1 / $arg2;
            } else {
                return "Нельзя делить на ноль!";
            }
        default:
            return "Неверная операция!";
    }
}

$result = mathOperation(5, 3, 'add');
//echo "Результат: " . $result;



//3. Объявить массив, в котором в качестве ключей будут использоваться названия областей, а в качестве значений – массивы
//с названиями
//городов из соответствующей области.
// Вывести в цикле значения массива, чтобы результат был таким: Московская область: Москва, Зеленоград, Клин Ленинградская
//  область:
// Санкт-Петербург, Всеволожск, Павловск, Кронштадт Рязанская область … (названия городов можно найти на maps.yandex.ru).

$arr = [
    'Московская' => [
        'Москва',
        'Москва',
        'Москва',
        'Москва',
    ]
];

foreach ($arr as $region => $cities) {
//    echo $region . ': <br>';
    foreach ($cities as $city) {
//        echo $city . '<br>';
    }
}



//4. Объявить массив, индексами которого являются буквы русского языка, а значениями – соответствующие латинские
// буквосочетания
// (‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’). Написать функцию
// транслитерации строк.

$alfabet = [
    'а' => 'a',   'б' => 'b',   'в' => 'v',
    'г' => 'g',   'д' => 'd',   'е' => 'e',
    'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
    'и' => 'i',   'й' => 'y',   'к' => 'k',
    'л' => 'l',   'м' => 'm',   'н' => 'n',
    'о' => 'o',   'п' => 'p',   'р' => 'r',
    'с' => 's',   'т' => 't',   'у' => 'u',
    'ф' => 'f',   'х' => 'h',   'ц' => 'c',
    'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
    'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
    'э' => 'e',   'ю' => 'yu',  'я' => 'ya'
];

function transliterate($text, $alfabet) {
    $transliteratedText = '';
    for ($i = 0; $i < strlen($text); $i++) {
        $char = substr($text, $i, 1);
        $transliteratedText .= isset($alfabet[$char]) ? $alfabet[$char] : $char;
    }
    return $transliteratedText;
}

$inputText = 'привет мир';
$transliteratedText = transliterate($inputText, $alfabet);
//echo "Транслитерированный текст: " . $transliteratedText;



//5. *С помощью рекурсии организовать функцию возведения числа в степень. Формат:
//function power($val, $pow), где $val – заданное число, $pow – степень.

function power($val, $pow) {
    if ($pow == 0) {
        return 1;
    } else {
        return $val * power($val, $pow - 1);
    }
}

$result = power(2, 3);
//echo "Результат: " . $result;



//6. *Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными
//склонениями, например:
//22 часа 15 минут
//21 час 43 минуты.

function formatCurrentTime() {
    $hours = date('G');
    $minutes = date('i');

    // Формируем строку с правильными склонениями
    $hoursStr = getFormattedNumber($hours, 'час', 'часа', 'часов');
    $minutesStr = getFormattedNumber($minutes, 'минута', 'минуты', 'минут');

    return "$hoursStr $minutesStr";
}

function getFormattedNumber($number, $form1, $form2, $form5) {
    $number = (int)$number;
    $mod10 = $number % 10;
    $mod100 = $number % 100;

    if ($mod10 === 1 && $mod100 !== 11) {
        return "$number $form1";
    } elseif ($mod10 >= 2 && $mod10 <= 4 && ($mod100 < 10 || $mod100 >= 20)) {
        return "$number $form2";
    } else {
        return "$number $form5";
    }
}

$currentFormattedTime = formatCurrentTime();
echo $currentFormattedTime;










