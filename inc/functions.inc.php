<?php


function espaceHtml(string $value)
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
