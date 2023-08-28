<?php
define("URL_BASE","http://projetospw/TCC%2022.0/");
define("CSS","assets/css/");
define("JS","assets/js/");
define("IMG","assets/img/");

function url($uri = null){
    if($uri){
        return URL_BASE.$uri;
    }
    return URL_BASE;
}
?>