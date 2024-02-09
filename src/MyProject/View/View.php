<?php

namespace App\MyProject\View;

class View
{
    protected string $templatesPath;

    public function __construct(string $templatesPath)
    {
        $this->templatesPath = $templatesPath;
    }

    public function renderHtml(string $templateName, array $vars = [], int $code = 200)
    {
        http_response_code($code);
        extract($vars);
        ob_start();
        $test = $this->templatesPath . '/' . $templateName;
        include $this->templatesPath . '/' . $templateName;
        $bufer = ob_get_contents();
        ob_end_clean();
        echo $bufer;
    }
}