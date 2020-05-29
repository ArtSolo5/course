<?php


namespace Content\Model\Author;


use Content\Model\Book\Book;
use Content\Model\Book\BookCollection;
use Engine\Core\Model\DomainObject;

class Author extends DomainObject
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $country;

    /**
     * @var BookCollection
     */
    private $books;

    /**
     * Author constructor.
     * @param int $id
     * @param string $name
     * @param string $country
     */
    public function __construct(
        int $id,
        string $name,
        string $country
    ) {
        $this->name    = $name;
        $this->country = $country;

        parent::__construct($id);
    }

    /**
     * @param Book $book
     * @throws \Exception
     */
    public function addBook(Book $book)
    {
        $this->books->add($book);
        $book->setAuthor($this);
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
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry(string $country): void
    {
        $this->country = $country;
    }

    /**
     * @return BookCollection
     */
    public function getBooks(): BookCollection
    {
        return $this->books;
    }

    /**
     * @param BookCollection $books
     */
    public function setBooks(BookCollection $books): void
    {
        $this->books = $books;
    }
}