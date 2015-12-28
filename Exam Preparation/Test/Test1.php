<?php
$person = [
    "name" => "Konstantin",
    "age" => 33,
    "student" => true,
    "city" => "Sofia",
    "grades" => ["Hello" , 6, 4, 5 , 6, -3]
];
//$person['grades'] = implode(', ',$person['grades']);
//foreach ($person as $key => $value) {
//    if (is_string($key)) {
//        echo $key." -> ".$value."\n";
//    }
//}
echo json_encode($person)."\n";
echo "<pre>", print_r($person, true), "</pre>\n";
arsort($person['grades']);
foreach ($person['grades'] as $key => $value) {
    echo $key." -> ".$value."<br/>\n";

}
$str = "How many words do I have?";
echo str_word_count($str);

echo highlight_string('<?php phpinfo(); ?>')."<br/>";

$str1 = "carrot";
$str2 = "carrrott";
echo levenshtein($str1, $str2);

echo strstr('Hi What!', 'Hi')."<br/>\n";

$str = "Check the example: Supercalifragulistic";

var_dump( wordwrap($str,9));

function average(){
    return array_sum(func_get_args())/func_num_args();
}
print average(10, 15, 20, 25); // 17.5

?>