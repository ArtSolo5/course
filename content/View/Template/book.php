<?php $header->output(); ?>

<div class="container">

    <div class="row book-bl-1 mt-3">

        <div class="col-1 mt-4">
            <a href="javascript:history.go(-1)">
                <img src="/public/images/back-arrow.svg" alt="Back arrow icon">
            </a>
        </div>

        <div class="col-12 col-md-5">
            <img class="book-img" src="<?= $book->getImage(); ?>" alt="<?= $book->getName(); ?>">
        </div>

        <div class="col-12 col-md-5 offset-1">
            <h1 class="book-name"><?= $book->getName(); ?></h1>
            <h2 class="author-name mt-5"><?= $book->getAuthor()->getName(); ?></h2>
            <div class="book-options mt-5 d-flex justify-content-between">
                <p class="option-name">Genre:</p>
                <p class="option-value"><?= $book->getGenre()->getName(); ?></p>
            </div>
            <div class="book-options mt-2 d-flex justify-content-between">
                <p class="option-name">Pages:</p>
                <p class="option-value"><?= $book->getPages(); ?></p>
            </div>
            <div class="book-options mt-2 d-flex justify-content-between">
                <p class="option-name">Publisher:</p>
                <p class="option-value"><?= $book->getPublisher()->getName(); ?></p>
            </div>
            <div class="book-options mt-5 d-flex justify-content-between">
                <p class="option-name-price">Price:</p>
                <p class="option-value-price"><?= $book->getPrice(); ?>$</p>
            </div>
            <div class="read-button">
                <p>*You have to be registered to read this book</p>
                <?php if ($auth && $hasBook): ?>
                <a class="common-btn" href="#">READ</a>
                <?php else: ?>
                <a class="common-btn btn-add" href="/profile/addToLibrary/<?= $book->getId(); ?>">ADD TO LIBRARY</a>
                <?php endif; ?>
            </div>
            <div class="book-control mt-5">
                <?php if ($inReadList): ?>
                <a href="/profile/removeFromReadList/<?= $book->getId(); ?>">REMOVE FROM READLIST <i class="icon-ban icons"></i></a>
                <?php else: ?>
                <a href="/profile/addToReadList/<?= $book->getId(); ?>">ADD TO READLIST <i class="icon-star icons"></i></a>
                <?php endif; ?>
                <a href="/profile/shareTheBook">SHARE THE BOOK <i class="icon-share icons"></i></a>
            </div>
        </div>
    </div>

    <div class="row desc-row mb-5">
        <div class="col-12 col-md-3">
            <p class="option-name">Description:</p>
        </div>
        <div class="col-12 col-md-7">
            <div class="desc-block">
                <p class="option-value"><?= $book->getDescription(); ?></p>
            </div>
        </div>
    </div>
</div>

<?php $footer->output(); ?>
