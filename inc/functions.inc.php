<?php


function espaceHtml(string $value)
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function csrfField(): string
{
    $csrfService = new \App\Service\CsrfService();

    return '<input type="hidden" name="csrf_token" value="' . espaceHtml($csrfService->getToken()) . '"/>';
}
