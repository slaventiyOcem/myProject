<?php

namespace app\core;

class View
{
    /**
     * @var string|mixed
     */
    private string $template = 'main';
    /**
     * @param $template
     */
    public function __construct($template = null)
    {
        if($template != null){
            $this->template = $template;
        }
    }
    /**
     * @param $page
     * @param array $data
     * @return void
     */
    public function render ($page, array $data = [])
    {
        extract($data);
        include_once '../view/templates/' . $this->template . '_template.php';
    }
}