<!DOCTYPE html>
<html dir="ltr" lang="ru">
<head>
    <meta charset="utf-8">
    <title>Book shop</title>
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/public/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/public/css/stylesheet.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
</head>

<body>
<header>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-4 col-md-6 col-lg-7">
                <a href="/">
                    <img src="/public/images/logo.svg" alt="BooksForGeeks Logo">
                </a>
            </div>
            <div class="col main-menu">
                <a href="/catalog">CATALOGUE</a>
                <?php if ($auth): ?>
                    <a href="/profile">PROFILE</a>
                    <a class="common-btn" href="/profile/logout">
                        <span>LOG OUT</span>
                    </a>
                <?php else: ?>
                    <a href="/profile/login">LOG IN</a>
                    <a class="common-btn" href="/profile/signUp">
                        <span>SIGN UP</span>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>