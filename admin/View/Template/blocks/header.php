<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Админ-панель</title>

    <!-- Bootstrap core CSS -->
    <link href="/public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/public/css/dashboard.css" rel="stylesheet">

    <!-- simplelineicons for this template -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">

    <!-- Redactor CSS -->
    <link rel="stylesheet" href="/public/js/plugins/redactor/redactor.css">
</head>

<body>
<header>
    <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
        <div class="container">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="/admin/">Admin panel</a>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-folder-alt icons"></i>
                            Catalog
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/admin/books">Books</a>
                            <a class="dropdown-item" href="/admin/genres">Genres</a>
                            <a class="dropdown-item" href="/admin/authors">Authors</a>
                            <a class="dropdown-item" href="/admin/publishers">Publishers</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/carousel">
                            <i class="icon-film icons"></i>
                            Carousel
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/pages">
                            <i class="icon-doc icons"></i>
                            Pages
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/posts">
                            <i class="icon-pencil icons"></i>
                            Posts
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="/admin/settings/general">
                            <i class="icon-equalizer icons"></i>
                            Settings
                        </a>
                    </li>
                </ul>
            </div>

            <div class="right-toolbar">
                <a href="/admin/auth/logout">
                    <i class="icon-logout icons"></i> Logout
                </a>
            </div>
        </div>
    </nav>
</header>