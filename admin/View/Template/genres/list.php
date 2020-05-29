<?php $header->output();  ?>

    <main>
        <div class="container">
            <div class="row">
                <div class="col page-title">
                    <h3>
                        Genres
                    </h3>
                </div>
            </div>

            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>
                        <a class="nav-link" href="/admin/genres/create/">
                            <i class="icon-plus icons"></i>
                        </a>
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($genres as $genre): ?>
                    <tr>
                        <th scope="row"><?= $genre->getId(); ?></th>
                        <td>
                            <a href="/admin/genres/edit/<?= $genre->getId(); ?>">
                                <?= $genre->getName(); ?>
                            </a>
                        </td>
                        <td>
                            <a class="nav-link" href="/admin/genres/remove/<?= $genre->getId(); ?>">
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