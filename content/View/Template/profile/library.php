<?php $header->output(); ?>

    <div class="library-menu mt-5">
        <div class="flex-column align-items-start">
            <form action="/profile/filter/name" method="post">
                <button type="submit"><img src="/public/images/search.svg" alt="Search button"></button>
                <input type="text" name="name" placeholder="SEARCH">
            </form>
            <div class="library-menu-item mt-5">
                <a href="/profile/lastRead">LAST READ</a>
            </div>
            <div class="library-menu-item mt-5">
                <a href="/profile">MY LIBRARY</a>
            </div>
            <div class="library-menu-item mt-5">
                <a href="/profile/readList">READ LIST <i class="icon-star icons"></i></a>
            </div>
        </div>
    </div>

    <div class="container mt-5 min-h">
        <div class="row">
            <?php foreach ($books as $book): ?>
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