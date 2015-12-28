<?php
$firstNumber = 2;
$secondNumber = 5;
$result = $firstNumber + $secondNumber;
if ($result % 1 == 0) {
    echo "\$firstNumber + \$secondNumber = {$firstNumber} + {$secondNumber} = " .sprintf("%.2f",$result);
    //echo "\$firstNumber + \$secondNumber = {$firstNumber} + {$secondNumber} = " .number_format($result,2);
}else{
    echo "\$firstNumber + \$secondNumber = {$firstNumber} + {$secondNumber} = " .round($result,2);
}
?>