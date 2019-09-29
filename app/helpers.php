<?php
/** Nova костыль */
if (! function_exists('studly_case')) {
    function studly_case($value) {
        return \Illuminate\Support\Str::studly($value);
    }
}
