<?php

if (!function_exists("format_time")) {
    function format_time($value)
    {
        $value = strtotime($value);

        return date("H:i", $value);
    }
}
