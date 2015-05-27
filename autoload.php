<?php
    function __autoload($classe){
        require_once("lib/{$classe}.php");
    }
