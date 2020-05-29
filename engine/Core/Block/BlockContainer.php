<?php


namespace Engine\Core\Block;


use Content\Controller\BlockController\FooterBlockController;
use Content\Controller\BlockController\HeaderBlockController;

class BlockContainer
{
    /**
     * @var array
     */
    private $blocks = [];

    public function __construct(
        HeaderBlockController $header,
        FooterBlockController $footer
    ) {
        try {
            $this->add('header', $header);
            $this->add('footer', $footer);
        } catch (\Exception $e) {
            $e->getMessage();
        }
    }

    /**
     * @param $name
     * @param $block
     * @throws \Exception
     */
    public function add($name, $block)
    {
        if (!isset($blocks[$name])){
            $this->blocks[$name] = $block;
        } else {
            throw new \Exception(
                sprintf("'%s' block already exist in blocks list", $name)
            );
        }
    }

    /**
     * @param $name
     * @return mixed
     * @throws \Exception
     */
    public function load($name)
    {
        if (isset($this->blocks[$name])) {
           return  $this->blocks[$name];
        } else {
            throw new \Exception(
                sprintf("'%s' block not found", $name)
            );
        }
    }
}