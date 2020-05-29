<?php $header->output(); ?>

<main>
    <div class="container">
        <div class="row">
            <div class="col page-title">
                <h3><?= $publisher->getName(); ?></h3>
            </div>
        </div>
        <div class="row">
            <form class="col" method="post" action="/admin/publishers/update/">
                <input type="hidden" name="id" id="formPublisherId" value="<?= $publisher->getId(); ?>" />
                <div class="form-group">
                    <label for="formName">Name</label>
                    <input type="text" name="name" class="form-control" id="formName" value="<?= $publisher->getName(); ?>">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</main>

<?php $footer->output(); ?>
