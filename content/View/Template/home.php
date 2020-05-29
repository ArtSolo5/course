<?php $header->output(); ?>

<main>
    <div class="main-carousel">
        <?php for ($i = 1; $i < 7; $i++): ?>
            <img class="main-carousel-item" src="/public/images/carousel-img<?= $i; ?>.jpg" alt="Carousel image <?= $i; ?>">
        <?php endfor; ?>
    </div>

    <div class="container">
        <div class="row">
            <div class="offset-3 col-6 text-center">
                <h2 class="preview-h2">The most convenient way to read books</h2>
                <p class="preview-p">
                    Books For Geeks is a <span>service that helps millions of readers discover books they'll love.</span>
                </p>
                <a class="common-btn catalog-btn" href="/catalog">GO TO CATALOGUE</a>
            </div>
        </div>
    </div>
</main>

<section class="slogan">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h3 class="slogan-text">We grow and fill with ideas.</h3>
            </div>
            <div class="col-4">
                <h3 class="slogan-text">Use it to get yourself out of uncertainty.</h3>
            </div>
            <div class="col-4">
                <h3 class="slogan-text">From classic literature to creative curiosities.</h3>
            </div>
        </div>
    </div>
</section>


<section class="recommendations">
    <div class="container">

        <div class="row want-to-read">
            <div class="col">
                <h3>Want to<br> read</h3>
            </div>
        </div>

        <div class="row carousel-header-1">
            <div class="offset-1 col-10">
                <h4 class="carousel-header-h4">Most popular <span>Novels</span></h4>
            </div>
        </div>

        <div class="row book-carousel">
            <div class="col-1">
                <button type="button" class="customPrevBtn">
                    <img src="/public/images/back-arrow.svg" alt="Back arrow">
                </button>
            </div>
            <div class="col-10 owl-carousel owl-theme text-center">
                <?php foreach ($novelBooks as $book): ?>
                <div class="item">
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
            <div class="col-1">
                <button type="button" class="customNextBtn">
                    <img src="/public/images/next-arrow.svg" alt="Next arrow">
                </button>
            </div>
        </div>

        <div class="row carousel-header-2">
            <div class="offset-1 col-10">
                <h4 class="carousel-header-h4">Practical use with <span>Fiction</span></h4>
            </div>
        </div>

        <div class="row book-carousel">
            <div class="col-1">
                <button type="button" class="customPrevBtn">
                    <img src="/public/images/back-arrow.svg" alt="Back arrow">
                </button>
            </div>
            <div class="col-10 owl-carousel owl-theme text-center">
                <?php foreach ($fantasyBooks as $book): ?>
                    <div class="item">
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
            <div class="col-1">
                <button type="button" class="customNextBtn">
                    <img src="/public/images/next-arrow.svg" alt="Next arrow">
                </button>
            </div>
        </div>

</section>

<section class="about-project">

    <img class="big-logo" src="/public/images/big-logo.png" alt="BFG logo">

    <div class="container">
        <div class="row about-the-project">
            <div class="col">
                <h3>About the<br>Project</h3>
            </div>
        </div>

        <div class="row about-catalog">
            <div class="offset-1 col-4">
                <p class="about-simple-text">
                    You can easily add all the books you want to your library.
                    With Books For Geeks you hold the world's wisdom in
                    the palm of your hand - the most comprehensive
                    <a href="/catalog">collection of books</a>.
                </p>
            </div>
        </div>

        <div class="row about-profile">
            <div class="offset-1 col-4">
                <h4 class="about-profile-text">
                    Keep all your books in <a href="/profile">Profile</a>
                </h4>
            </div>
        </div>

        <div class="row about-last-read">
            <div class="offset-1 col-4">
                <p class="about-last-read-text">
                    <a class="about-last-read-a" href="/profile/lastRead">Last read</a> – is a collection of your read books.
                    You will never forget what you read last.
                </p>
            </div>
            <div class="offset-1 col">
                <p class="about-last-read-text">
                    <a class="about-last-read-a" href="/profile/readList">Readlist</a> -
                    your personal collection of favourite books. Add to readlist what you want to read soon.
                </p>
            </div>
        </div>

        <div class="row auth-block">
            <div class="offset-4 col-2">
                <a class="login-a" href="/profile/login">LOG IN</a>
            </div>
            <div class="col">
                <a class="sign-up-a" href="/profile/signUp">SIGN UP</a>
            </div>
        </div>
    </div>

</section>

<?php $footer->output(); ?>