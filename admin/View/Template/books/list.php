<?php $header->output();  ?>

    <main>
        <div class="container">
            <div class="row">
                <div class="col page-title">
                    <h3>
                        Books
                    </h3>
                </div>
            </div>

            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Author</th>
                    <th>Price</th>
                    <th>
                        <a class="nav-link" href="/admin/books/create/">
                            <i class="icon-plus icons"></i>
                        </a>
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($books as $book): ?>
                    <tr>
                        <th scope="row"><?= $book->getId(); ?></th>
                        <td>
                            <a href="/admin/books/edit/<?= $book->getId(); ?>">
                                <?= $book->getName(); ?>
                            </a>
                        </td>
                        <td><?= $book->getAuthor()->getName(); ?></td>
                        <td><?= $book->getPrice(); ?></td>
                        <td>
                            <a class="nav-link" href="/admin/books/remove/<?= $book->getId(); ?>">
                                <i class="icon-trash icons"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>

<?php $footer->output();  ?>