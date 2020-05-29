<?php


namespace Engine\Core\Model;


use Admin\Model\Carousel\CarouselMapper;
use Admin\Model\CarouselParameter\CarouselParameterMapper;
use Admin\Model\Page\PageMapper;
use Admin\Model\Setting\SettingMapper;
use Admin\Model\User\UserMapper;
use Content\Model\Author\AuthorMapper;
use Content\Model\Book\BookMapper;
use Content\Model\Client\ClientMapper;
use Content\Model\Genre\GenreMapper;
use Content\Model\Publisher\PublisherMapper;

class ModelContainer
{
    private $models = [];

    public function __construct(
        BookMapper $bookMapper,
        GenreMapper $genreMapper,
        AuthorMapper $authorMapper,
        PublisherMapper $publisherMapper,
        UserMapper $userMapper,
        PageMapper $pageMapper,
        SettingMapper $settingMapper,
        ClientMapper $clientMapper,
        CarouselMapper $carouselMapper,
        CarouselParameterMapper $carouselParameterMapper
    ) {
        try{
            $this->add('book', $bookMapper);
            $this->add('genre', $genreMapper);
            $this->add('author', $authorMapper);
            $this->add('publisher', $publisherMapper);
            $this->add('user', $userMapper);
            $this->add('page', $pageMapper);
            $this->add('setting', $settingMapper);
            $this->add('client', $clientMapper);
            $this->add('carousel', $carouselMapper);
            $this->add('carouselParameter', $carouselParameterMapper);
        } catch (\Exception $e) {
            $e->getMessage();
        }
    }

    /**
     * @param string $key
     * @param Mapper $mapper
     * @throws \Exception
     */
    private function add(string $key, Mapper $mapper)
    {
        if (!isset($this->models[$key])) {
            $this->models[$key] = $mapper;
        } else {
            throw new \Exception(
                sprintf("'%s' model already exist in models list", $key)
            );
        }
    }

    /**
     * @param string $key
     * @return Mapper
     * @throws \Exception
     */
    public function load(string $key): Mapper
    {
        if (isset($this->models[$key])) {
            return $this->models[$key];
        } else {
            throw new \Exception(
                sprintf("'%s' model not found", $key)
            );
        }
    }
}