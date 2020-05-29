<?php $header->output(); ?>

<main>
    <div class="container">
        <div class="row">
            <div class="col page-title">
                <h3>Create page</h3>
            </div>
        </div>
        <div class="row">
            <form class="col" method="post" action="/admin/pages/add/">
                <div class="form-group">
                    <label for="formTitle">Title</label>
                    <input type="text" name="title" class="form-control" id="formTitle" placeholder="Title page...">
                </div>
                <div class="form-group">
                    <label for="formContent">Content</label>
                    <textarea name="content" id="redactor" class="form-control" id="formContent"></textarea>
                </div>
                <button class="btn btn-primary" type="submit">Publish</button>
            </form>
        </div>
    </div>
</main>

<?php $footer->output(); ?>