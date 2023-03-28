<?php

use App\Models\Option;

function getValueByTitle($title){
    $option = Option::where('title', $title)->first();
    return $option->value;
}
