<?php $header->output(); ?>

    <div class="library-menu mt-5">
        <div class="flex-column align-items-start">
            <form action="/catalog/filter/name" method="post">
                <button type="submit"><img src="/public/images/search.svg" alt="Search button"></button>
                <input type="text" name="name" placeholder="SEARCH">
            </form>
            <div class="library-menu-item mt-5">
                <button class="navbar-toggler  p-0" type="button" data-toggle="collapse" data-target="#navbarToggleGenreFilter" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                    <img class="arrow" src="/public/images/arrow.svg" alt="Arrow icon"> GENRES
                </button>
            </div>
            <div class="collapse" id="navbarToggleGenreFilter">
                <div class="d-flex flex-column menu-item-list">
                    <?php foreach ($genres as $genre): ?>
                        <a href="/catalog/filter/genre/<?= $genre->getId(); ?>"><?= $genre->getName(); ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="library-menu-item mt-4">
                <button class="navbar-toggler  p-0" type="button" data-toggle="collapse" data-target="#navbarToggleAuthorFilter" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                    <img class="arrow" src="/public/images/arrow.svg" alt="Arrow icon"> AUTHORS
                </button>
            </div>
            <div class="collapse" id="navbarToggleAuthorFilter">
                <div class="d-flex flex-column menu-item-list">
                    <?php foreach ($authors as $author): ?>
                        <a href="/catalog/filter/author/<?= $author->getId(); ?>"><?= $author->getName(); ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5 min-h">
        <div class="row">
            <?php foreach ($books as $book): ?>
            <?php  ?>
            <a href="/book/<?= $book->getId(); ?>">
                <div class="col-3 text-center book-card mb-5">
                    <a href="/book/<?= $book->getId(); ?>">
                        <img class="book-card-image" src="<?= $book->getImage(); ?>" alt="<?= $book->getName(); ?>">
                        <div class="book-card-author mt-3">
                            <?= $book->getAuthor()->getName(); ?>
                        </div>
                        <div class="book-card-name">
                            <?= $book->getName(); ?>
                        </div>
                        <div class="book-card-price mt-2">
                            <?= $book->getPrice(); ?>$
                        </div>
                    </a>
                </div>
                <?php endforeach; ?>
        </div>
    </div>

<?php $footer->output(); ?>
