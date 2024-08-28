<?php

if (!function_exists('show'))
{
    function show($message): void
    {
        echo "<p>$message</p>";
    }
}