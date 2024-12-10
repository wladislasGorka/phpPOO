<?php
    spl_autoload_register(function ($class) {
        if(file_exists('./Application/' . $class . '.php')){
            include './Application/' . $class . '.php';
        }
        if(file_exists('./Application/Race/' . $class . '.php')){
            include './Application/Race/' . $class . '.php';
        }
        if(file_exists('./Application/Talent/' . $class . '.php')){
            include './Application/Talent/' . $class . '.php';
        }
        if(file_exists('./Application/Skill/' . $class . '.php')){
            include './Application/Skill/' . $class . '.php';
        }
    });