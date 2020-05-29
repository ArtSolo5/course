<?php


namespace Content\Model\Genre;


use Content\Model\Book\Book;
use Content\Model\Book\BookCollection;
use Engine\Core\Model\DomainObject;

class Genre extends DomainObject
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var BookCollection
     */
    private $books;

    /**
     * Genre constructor.
     * @param int $id
     * @param string $name
     */
    public function __construct(
        int $id,
        string $name
    ) {
        $this->name  = $name;

        parent::__construct($id);
    }

    /**
     * @param Book $book
     * @throws \Exception
     */
    public function addBook(Book $book)
    {
        $this->getBooks()->add($book);
        $book->setGenre($this);
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