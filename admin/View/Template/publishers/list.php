<?php $header->output();  ?>

    <main>
        <div class="container">
            <div class="row">
                <div class="col page-title">
                    <h3>
                        Publishers
                    </h3>
                </div>
            </div>

            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>
                        <a class="nav-link" href="/admin/publishers/create/">
                            <i class="icon-plus icons"></i>
                        </a>
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($publishers as $publisher): ?>
                    <tr>
                        <th scope="row"><?= $publisher->getId(); ?></th>
                        <td>
                            <a href="/admin/publishers/edit/<?= $publisher->getId(); ?>">
                                <?= $publisher->getName(); ?>
                            </a>
                        </td>
                        <td>
                            <a class="nav-link" href="/admin/publishers/remove/<?= $publisher->getId(); ?>">
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