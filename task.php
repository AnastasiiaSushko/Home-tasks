<?php

//функція, яка б приймала в якості параметру текст, а повертала текст зі словами
// в зворотньому напрямку

$text = <<<EOD
       PHP is a server-side scripting language designed for web development but also used as a 
       general-purpose programming language. PHP code may be embedded into HTML code, or it can be used in 
       combination with various web template systems, web content management systems and web frameworks. 
       PHP code is usually processed by a PHP interpreter implemented as a module in the web server or as a 
       Common Gateway Interface (CGI) executable. 
EOD;

function changeDirection($str)
{
    $array = explode (' ',$str);                      //Розбити на масив
    $reversedArray = array_reverse($array);           //Перевернути масив
    $reversedString = implode(' ',$reversedArray);    //Склеїти масив в строку
    return $reversedString;

}
echo changeDirection($text);
echo "<br/><br/>";



//функція, яка б виводила текст, але замість смайликів ':)' вставляла зображення смайлів

$string = "Hello :) world  :) !";

function addSmile($str)
{
    $newString = str_replace(':)', '<img src=\'http://wiki.colivre.net/pub/Aurium/CreateYourSmile/smile.svg\' width=\'30px\'>', $str);
    return $newString;
}
echo addSmile($string);
echo "<br/><br/>";



//функція, яка б виводила статистику слів у тексті із вказуванням кількості
$someString = "Hello, world! hello hi php. css php php :) name.";

function statisticOfWords($str)
{
    $str = mb_strtolower($str);
    $array = preg_split("/[.!\s,]+/", $str);               //Розбити на масив
    foreach ($array as $key=>$val)
    {
        if(empty($val)||$val==':)')
        {
            unset($array[$key]);}
    }
    $pos = array_count_values($array);                   //Асоціативний масив. Ключ - слово, значення - кількість слів
    return $pos;
}

//Виведення таблиці
function statisticTable($arr)
{
?>
    <table>
        <tr>
            <th>Words</th>
            <th>Count</th>
        </tr>
        <?php foreach ($arr as $key => $value)
        {?>

            <tr>
                <td><?php echo $key ?></td>
                <td><?php echo $value ?></td>

            </tr>
        <?php } ?>
    </table>
<?php
}

$statisticArray1 = statisticOfWords($someString);
statisticTable($statisticArray1);

echo "<br/><br/>";
$statisticArray2 = statisticOfWords($text);
statisticTable($statisticArray2);


?>
<style type="text/css">
    table{
        border: 1px solid darkblue;
        border-collapse: collapse;
        width: 100px;
    }
    td, th{
        border-right: 1px solid darkblue;
        border-bottom: 1px solid darkblue;
        padding: 10px;
    }
    th{
        border-bottom: 1px solid darkblue;
    }
</style>



<?php

/*
//функція, яка б виводила кількість слів у тексті
function calculateWords_noSmile($str)
{
$count = str_word_count($str);
echo "The count of words is $count";
}
calculateWords_noSmile($string);

//функція, яка б виводила текст, але замість смайликів ':)' вставляла зображення смайлів
function addSmile($str)
{
$array = explode (' ',$str);               //Розбити на масив
$length = count($array);                   //Кількість елементів масиву
for ($i = 0; $i<$length; $i++)             //Цикл, який перевіряє кожен елемент на співпадіння
{
if($array[$i]==':)')
{
$array[$i]="<img src='http://wiki.colivre.net/pub/Aurium/CreateYourSmile/smile.svg' width='30px'>";
}
}
$string = implode(' ',$array);             //Склеїти масив в строку
return $string;
}

echo addSmile($string);
echo "<br/><br/>";

*/


