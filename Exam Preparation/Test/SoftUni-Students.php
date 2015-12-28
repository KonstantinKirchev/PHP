<?php
$column = $_GET['column'];
$order = $_GET['order'];
$students = preg_split('/[\n\r]+/', $_GET['students'], -1, PREG_SPLIT_NO_EMPTY);
$result = [];
$id = 0;
$output = [];
foreach ($students as $student) {
    $id++;
    $info = explode(', ', $student);
    $userName = $info[0];
    $email = $info[1];
    $type = $info[2];
    $result = (int)$info[3];
    $result = [
        "id" => $id,
        "username" => $userName,
        "email" => $email,
        "type" => $type,
        "result" => $result
    ];
    $output[] = $result;
}
if ($column == 'id') {
    usort($output, function ($a, $b) use ($order) {
        if ($order == 'ascending') {
            return $a['id'] - $b['id'];
        } else {
            return $b['id'] - $a['id'];
        }
    });
} else if ($column == 'username') {
    usort($output, function ($a, $b) use ($order) {
        if ($a['username'] == $b['username']) {
            if ($order == 'ascending') {
                return $a['id'] - $b['id'];
            } else {
                return $b['id'] - $a['id'];
            }
        }
        if ($order == 'ascending') {
            return $a['username'] > $b['username'] ? 1 : -1;
        } else {
            return $a['username'] < $b['username'] ? 1 : -1;
        }
    });
} else if ($column == 'result') {
    usort($output, function ($a, $b) use ($order) {
        if ($a['result'] == $b['result']) {
            if ($order == 'ascending') {
                return $a['id'] - $b['id'];
            } else {
                return $b['id'] - $a['id'];
            }
        }
        if ($order == 'ascending') {
            return $a['result'] - $b['result'];
        } else {
            return $b['result'] - $a['result'];
        }
    });
}
echo '<table><thead><tr><th>Id</th><th>Username</th><th>Email</th><th>Type</th><th>Result</th></tr></thead>';
foreach ($output as $student) {
    echo "<tr><td>".htmlspecialchars($student['id'])."</td><td>".htmlspecialchars($student['username'])."</td><td>".htmlspecialchars($student['email'])."</td><td>".htmlspecialchars($student['type'])."</td><td>".htmlspecialchars($student['result'])."</td></tr>";
}
echo '</table>';
?>