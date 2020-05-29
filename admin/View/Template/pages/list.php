<?php $header->output();  ?>

<main>
    <div class="container">
        <div class="row">
            <div class="col page-title">
                <h3>
                    Pages
                </h3>
            </div>
        </div>

        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Date</th>
                <th>
                    <a class="nav-link" href="/admin/pages/create/">
                        <i class="icon-plus icons"></i>
                    </a>
                </th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($pages as $page): ?>
                <tr>
                    <th scope="row"><?= $page->getId(); ?></th>
                    <td>
                        <a href="/admin/pages/edit/<?= $page->getId(); ?>">
                            <?= $page->getTitle(); ?>
                        </a>
                    </td>
                    <td><?= $page->getDate(); ?></td>
                    <td>
                        <a class="nav-link" href="/admin/pages/remove/<?= $page->getId(); ?>">
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