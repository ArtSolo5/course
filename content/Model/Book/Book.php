<?php


namespace Content\Model\Book;


use Content\Model\Author\Author;
use Content\Model\Genre\Genre;
use Content\Model\Publisher\Publisher;
use Engine\Core\Model\DomainObject;

class Book  extends DomainObject
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var Genre
     */
    private $genre;

    /**
     * @var Author
     */
    private $author;

    /**
     * @var Publisher
     */
    private $publisher;

    /**
     * @var int
     */
    private $price;

    /**
     * @var int
     */
    private $pages;

    /**
     * @var string
     */
    private $image;

    /**
     * @var string
     */
    private $description;

    /**
     * Book constructor.
     * @param int $id
     * @param string $name
     * @param Genre $genre
     * @param Author $author
     * @param Publisher $publisher
     * @param int $price
     * @param int $pages
     * @param string $image
     * @param string $description
     */
    public function __construct(
        int $id,
        string $name,
        Genre $genre,
        Author $author,
        Publisher $publisher,
        int $price,
        int $pages,
        string $image,
        string $description
    ) {
        $this->name        = $name;
        $this->genre       = $genre;
        $this->author      = $author;
        $this->publisher   = $publisher;
        $this->price       = $price;
        $this->pages       = $pages;
        $this->description = $description;
        $this->image       = $image;

        parent::__construct($id);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return Genre
     */
    public function getGenre(): Genre
    {
        return $this->genre;
    }

    /**
     * @param Genre $genre
     */
    public function setGenre(Genre $genre): void
    {
        $this->genre = $genre;
    }

    /**
     * @return Author
     */
    public function getAuthor(): Author
    {
        return $this->author;
    }

    /**
     * @param Author $author
     */
    public function setAuthor(Author $author): void
    {
        $this->author = $author;
    }

    /**
     * @return Publisher
     */
    public function getPublisher(): Publisher
    {
        return $this->publisher;
    }

    /**
     * @param Publisher $publisher
     */
    public function setPublisher(Publisher $publisher): void
    {
        $this->publisher = $publisher;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    /**
     * @return int
     */
    public function getPages(): int
    {
        return $this->pages;
    }

    /**
     * @param int $pages
     */
    public function setPages(int $pages): void
    {
        $this->pages = $pages;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage(string $image): void
    {
        $this->image = $image;
    }
}