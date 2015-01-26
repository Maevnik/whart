<?php
class PageView
{
    private $template="/templates/";
    private $material;
    function __construct($content) {
        $this->material=$content;
    }
    function Show()
    {
    include __DIR__.$this->template.'header.php';
    include __DIR__.$this->template.'menu.php';
    include __DIR__.$this->template.'footer.php';
    }

}
