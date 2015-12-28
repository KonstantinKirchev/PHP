<?php
$output = 15;
if (gettype($output) == 'string' || gettype($output) == 'array' || gettype($output) == 'object' || gettype($output) == 'resources') {
    echo gettype($output);
} else {
    var_dump($output);
}
?>