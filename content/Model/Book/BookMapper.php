<?php


namespace Content\Model\Book;


use Admin\Model\Carousel\CarouselMapper;
use Content\Model\Author\AuthorMapper;
use Content\Model\Genre\GenreMapper;
use Content\Model\Publisher\PublisherMapper;
use Engine\Core\Database\Connection;
use Engine\Core\Model\Collection;
use Engine\Core\Database\QueryBuilder;
use Engine\Core\Model\DomainObject;
use Engine\Core\Model\Mapper;
use Engine\Core\Model\ObjectWatcher;

class BookMapper extends Mapper
{
    private $genreMapper;
    private $authorMapper;
    private $publisherMapper;
    private $carouselMapper;

    public function __construct(
        Connection $db,
        QueryBuilder $builder,
        ObjectWatcher $watcher,
        GenreMapper $genreMapper,
        AuthorMapper $authorMapper,
        PublisherMapper $publisherMapper,
        CarouselMapper $carouselMapper
    ) {
        $this->genreMapper     = $genreMapper;
        $this->authorMapper    = $authorMapper;
        $this->publisherMapper = $publisherMapper;
        $this->carouselMapper  = $carouselMapper;

        parent::__construct($db, $builder, $watcher);
    }

    public function update(DomainObject $object)
    {
        $sql = $this->builder->update('book')
            ->set([
                'name'        => $object->getName(),
                'genre'       => $object->getGenre()->getId(),
                'author'      => $object->getAuthor()->getId(),
                'publisher'   => $object->getPublisher()->getId(),
                'price'       => $object->getPrice(),
                'pages'       => $object->getPages(),
                'image'       => $object->getImage(),
                'description' => $object->getDescription()
            ])
            ->where('id', $object->getId())
            ->sql();

        $this->db->execute($sql, $this->builder->values);
    }

    protected function doCreateObject(array $row): DomainObject
    {
        $genre     = $this->genreMapper->find($row['genre']);
        $author    = $this->authorMapper->find($row['author']);
        $publisher = $this->publisherMapper->find($row['publisher']);

        return new Book(
            $row['id'],
            $row['name'],
            $genre,
            $author,
            $publisher,
            $row['price'],
            $row['pages'],
            $row['image'],
            $row['description']
        );
    }

    protected function doInsert(DomainObject $object)
    {
        $sql = $this->builder->insert('book')
            ->values([
                'name'        => $object->getName(),
                'genre'       => $object->getGenre()->getId(),
                'author'      => $object->getAuthor()->getId(),
                'publisher'   => $object->getPublisher()->getId(),
                'price'       => $object->getPrice(),
                'pages'       => $object->getPages(),
                'image'       => $object->getImage(),
                'description' => $object->getDescription()
            ])
            ->sql();

        $this->db->execute($sql, $this->builder->values);
        $id = $this->db->lastInsertId();
        $object->setId((int)$id);
    }

    protected function doFind(int $id): array
    {
        $sql = $this->builder->select()
            ->from('book')
            ->where('id', $id)
            ->limit(1)
            ->sql();

        return $this->db->query($sql, $this->builder->values);
    }

    protected function doFindAll(): array
    {
        $sql = $this->builder->select()
            ->from('book')
            ->sql();

        return $this->db->query($sql, $this->builder->values);
    }

    public function findAllByName(array $params)
    {
        $sql = $this->builder->select()
            ->from('book')
            ->where('name', '%' . $params['name'] . '%', 'LIKE')
            ->sql();

        return $this->getCollection(
            $this->db->query($sql, $this->builder->values)
        );
    }

    public function findByFilter(array $params)
    {
        if ($params[0] == 'genre') {
            return $this->findByGenre($params[1]);
        } else {
            return $this->findByAuthor($params[1]);
        }
    }

    public function findByGenre(int $id): Collection
    {
        $sql = $this->builder->select()
            ->from('book')
            ->where('genre' , $id)
            ->sql();

        return new BookCollection(
            $this->db->query($sql, $this->builder->values), $this);
    }

    public function findByAuthor(int $id): Collection
    {
        $sql = $this->builder->select()
            ->from('book')
            ->where('author' , $id)
            ->sql();

        return new BookCollection(
            $this->db->query($sql, $this->builder->values), $this);
    }

    public function findByClient(): array
    {
        $sql = $this->builder->select('book_id')
            ->from('client_book')
            ->where('client_id' , $_SESSION['clientId'])
            ->sql();

        $books = $this->db->query($sql, $this->builder->values);

        $result = [];

        foreach ($books as $book) {
            $result[] = $this->find($book['book_id']);
        }

        return $result;
    }

    public function findByClientBookName($params)
    {
        $sql = $this->builder->select('book_id')
            ->from('client_book')
            ->where('client_id' , $_SESSION['clientId'])
            ->sql();

        $books = $this->db->query($sql, $this->builder->values);

        $result = [];

        foreach ($books as $book) {
            $book = $this->findByName($book['book_id'], $params['name']);

            if ($book != null) {
                $result[] = $book;
            }
        }

        return $result;
    }

    public function findByName($id, $name)
    {
        $sql = $this->builder->select()
            ->from('book')
            ->where('id', $id)
            ->where('name', '%' . $name . '%', 'LIKE')
            ->limit(1)
            ->sql();

        $result = $this->db->query($sql, $this->builder->values);

        return !empty($result) ? $this->createObject($result[0]) : null;
    }

    public function addBookToLibrary(int $id)
    {
        $sql = $this->builder->insert('client_book')
            ->values([
                'client_id' => $_SESSION['clientId'],
                'book_id'   => $id
            ])
            ->sql();

        $this->db->execute($sql, $this->builder->values);
    }

    public function addBookToReadList(int $id)
    {
        $sql = $this->builder->update('client_book')
            ->set(['read_list' => 1])
            ->where('client_id', $_SESSION['clientId'])
            ->where('book_id', $id)
            ->sql();

        $this->db->execute($sql, $this->builder->values);
    }

    public function deleteFromReadList(int $id)
    {
        $sql = $this->builder->update('client_book')
            ->set(['read_list' => 0])
            ->where('client_id', $_SESSION['clientId'])
            ->where('book_id', $id)
            ->sql();

        $this->db->execute($sql, $this->builder->values);
    }

    public function inReadList($id)
    {
        $sql = $this->builder->select('read_list')
            ->from('client_book')
            ->where('client_id', $_SESSION['clientId'])
            ->where('book_id', $id)
            ->limit(1)
            ->sql();

        $result = $this->db->query($sql, $this->builder->values);

        return !empty($result) ? $result[0]['read_list'] : false;
    }

    public function findByReadList()
    {
        $sql = $this->builder->select('book_id')
            ->from('client_book')
            ->where('read_list', 1)
            ->where('client_id', $_SESSION['clientId'])
            ->sql();

        $books = $this->db->query($sql, $this->builder->values);

        $result = [];

        foreach ($books as $book) {
            $result[] = $this->find($book['book_id']);
        }

        return $result;
    }

    public function findByCarousel($id)
    {
        $carousel = $this->carouselMapper->find($id);

        $sql = $this->builder->select()
            ->from('book')
            ->where($carousel->getParameter()->getName(), $carousel->getValue())
            ->sql();

        return $this->getCollection(
            $this->db->query($sql, $this->builder->values)
        );
    }

    protected function doDelete(int $id)
    {
        $sql = $this->builder->delete()
            ->from('book')
            ->where('id', $id)
            ->sql();

        $this->db->execute($sql, $this->builder->values);
    }

    protected function getCollection(array $row): Collection
    {
        return new BookCollection($row, $this);
    }

    protected function targetClass(): string
    {
        return Book::class;
    }
}