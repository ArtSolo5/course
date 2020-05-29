<?php $header->output();  ?>

<main>
    <div class="container">
        <div class="row">
            <div class="col page-title">
                <h3>
                    Authors
                </h3>
            </div>
        </div>

        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>
                    <a class="nav-link" href="/admin/authors/create/">
                        <i class="icon-plus icons"></i>
                    </a>
                </th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($authors as $author): ?>
                <tr>
                    <th scope="row"><?= $author->getId(); ?></th>
                    <td>
                        <a href="/admin/authors/edit/<?= $author->getId(); ?>">
                            <?= $author->getName(); ?>
                        </a>
                    </td>
                    <td>
                        <a class="nav-link" href="/admin/authors/remove/<?= $author->getId(); ?>">
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
