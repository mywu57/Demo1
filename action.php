<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if ($_POST)
{
    $text = $_POST["mytextarea"];
    $lowtext = strtolower($text);
    echo "<h1>$lowtext</h1>";
    echo 'Độ dài của nội dung gửi lên: ' . strlen($text);
    echo '<br />';

    echo 'Chuỗi có ' . str_word_count($text) . ' từ';
    echo '<br />';

    $arr = explode(' ',$lowtext);
    $result = array_unique($arr);
    echo 'Đếm số lần mỗi từ xuất hiện: ';
    foreach($result as $value){
        echo $value . ' (' . substr_count($lowtext, $value) . ' lần), ';
    }
    echo '<br />';

    $arr_count_value = array_count_values($arr);
    echo 'Từ xuất hiện thường xuyên nhất: ' . array_search(max($arr_count_value), $arr_count_value);
    echo '<br />';
    /**
    * Get key of the max value
    *
    * @var array $array
    * @return mixed
    */
    function array_key_max_value($array){
    $max = null;
    $result = null;
    foreach ($array as $key => $value) {
        if ($max === null || $value > $max) {
            $result = $key;
            $max = $value;
        }
    }
    return $result;
    }
    
    function myfunction($v){
        return strlen($v);
    }

    //array with strlen is value
    $arrMap = array_map("myfunction",$result);
    // print_r($arrMap);
    $id = array_key_max_value($arrMap); //index of max strlen
    echo 'Từ có chiều dài lớn nhất: ' . $result[$id];

}
?>
</body>
</html>