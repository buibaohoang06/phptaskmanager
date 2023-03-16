<?php
function dd($value){
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

function litLink($current_page){
    if (parse_url($_SERVER['REQUEST_URI'])['path'] == $current_page){
        return true;
    } else{
        return false;
    }
}

?>