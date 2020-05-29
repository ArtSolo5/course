<?php $header->output(); ?>

<main>
    <div class="container">
        <div class="row">
            <div class="col page-title">
                <h3><?= $page->getTitle(); ?></h3>
            </div>
        </div>
        <div class="row">
            <form class="col" method="post" action="/admin/pages/update/">
                <input type="hidden" name="id" id="formPageId" value="<?= $page->getId(); ?>" />
                <div class="form-group">
                    <label for="formTitle">Title</label>
                    <input type="text" name="title" class="form-control" id="formTitle" value="<?= $page->getTitle(); ?>" placeholder="Title page...">
                </div>
                <div class="form-group">
                    <label for="formContent">Content</label>
                    <textarea name="content" id="redactor" class="form-control" id="formContent">
                        <?= $page->getContent(); ?>
                    </textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</main>

<?php $footer->output(); ?>
