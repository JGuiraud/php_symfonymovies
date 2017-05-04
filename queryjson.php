<?php
$json = 'films.json';
$jsondecoded = json_decode(file_get_contents($json), true);
foreach ($jsondecoded as $id => $row) {
    foreach ($row['entry'] as $key => $value) {
        $title = $value['im:name']['label'];
        $title = str_replace("'", " ", $title);
        $summary = $value['summary']['label'];
        $summary = str_replace("'", " ", $summary);

        echo "INSERT INTO `movie`(`title`, `summary`) VALUES ('".$title."','".$summary."');"."\n";
    }
}
