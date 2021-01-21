<?php 
/**
 * This function finds an item in nested array
 * */ 
function find_key_value($array, $key, $val) {
    foreach ($array as $item){
        if(isset($item[$key]) && $item[$key] == $val){
            return true;
        }
    } 
    return false;
}
/**
 * This function removes an item from nested array
 * */ 
function remove_array_item($array, $itemKey, $val) {
    $new_array  = $array;
    foreach ($array as $key => $item){
        if(isset($item[$itemKey]) && $item[$itemKey] == $val){
            unset($new_array[$key]);
        }
    } 
    return $new_array;
}
?>