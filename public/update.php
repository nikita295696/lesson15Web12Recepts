<?php

$id = $_POST["id"];
$title = $_POST["title"];
$description = $_POST["instruction"];
$recepts = [];

// обновление
foreach ($recepts as &$recept){
    if($recept["id"] == $id){
        $recept["title"] = $title;
        $recept["description"] = $description;
    }
}

$deleteIdx = -1;
foreach ($recepts as $idx => $recept){
    if($recept["id"] == $id){
        $deleteIdx = $idx;
        break;
    }
}
if($deleteIdx != -1) {
    unset($recepts[$deleteIdx]);
}
