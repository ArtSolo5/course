<?php $header->output(); ?>

<main>
    <div class="container">
        <div class="row">
            <div class="col page-title">
                <h3><?= $author->getName(); ?></h3>
            </div>
        </div>
        <div class="row">
            <form class="col" method="post" action="/admin/authors/update/">
                <input type="hidden" name="id" id="formAuthorId" value="<?= $author->getId(); ?>" />
                <div class="form-group">
                    <label for="formName">Name</label>
                    <input type="text" name="name" class="form-control" id="formName" value="<?= $author->getName(); ?>">
                </div>
                <div class="form-group">
                    <label for="formCountry">Country</label>
                    <input type="text" name="country" class="form-control" id="formCountry" value="<?= $author->getCountry(); ?>">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</main>

<?php $footer->output(); ?>
