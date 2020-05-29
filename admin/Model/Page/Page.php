<?php


namespace Admin\Model\Page;


use Engine\Core\Model\DomainObject;

class Page extends DomainObject
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $content;

    /**
     * @var string
     */
    private $date;

    /**
     * Page constructor.
     * @param int $id
     * @param string $title
     * @param string $content
     * @param string $date
     */
    public function __construct(
        int $id,
        string $title,
        string $content,
        string $date
    ) {
        $this->title   = $title;
        $this->content = $content;
        $this->date    = $date;
        parent::__construct($id);
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }
}