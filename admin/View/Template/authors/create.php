<?php $header->output(); ?>

    <main>
        <div class="container">
            <div class="row">
                <div class="col page-title">
                    <h3>Create author</h3>
                </div>
            </div>
            <div class="row">
                <form class="col" method="post" action="/admin/authors/add/">
                    <div class="form-group">
                        <label for="formName">Name</label>
                        <input type="text" name="name" class="form-control" id="formName">
                    </div>
                    <div class="form-group">
                        <label for="formCountry">Country</label>
                        <input type="text" name="country" class="form-control" id="formCountry">
                    </div>
                    <button class="btn btn-primary" type="submit">Create</button>
                </form>
            </div>
        </div>
    </main>

<?php $footer->output(); ?>