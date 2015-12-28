<?php
$board = $_GET['board'];
$rows = preg_split('/\//',$board);
$countP = 0;
$countQ = 0;
$countK = 0;
$countR = 0;
$countH = 0;
$countB = 0;
//var_dump($rows);
echo '<table>';
$r=0;
$c=0;
foreach ($rows as $figures) {
    $r++;
    echo '<tr>';
    //echo $figures.'<br/>';
    $figure = preg_split('/\-/', $figures);
    foreach ($figure as $value) {
        $c++;
        echo '<td>'.$value.'</td>';
        switch ($value){
            case 'B':
                $countB++;
                break;
            case 'R':
                $countR++;
                break;
            case 'P':
                $countP++;
                break;
            case 'K':
                $countK++;
                break;
            case 'Q':
                $countQ++;
                break;
            case 'H':
                $countH++;
                break;
        }
    }

    //var_dump($figure);
    echo '</tr>';
}
echo '</table>';
$assArr = [
    "Bishop" => $countB,
    "Horseman" => $countH,
    "King" => $countK,
    "Pawn" => $countP,
    "Queen" => $countQ,
    "Rook" => $countR,
];
echo json_encode($assArr);

?>