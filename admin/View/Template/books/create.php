<?php $header->output(); ?>

    <main>
        <div class="container">
            <div class="row">
                <div class="col page-title">
                    <h3>Create book</h3>
                </div>
            </div>
            <div class="row">
                <form class="col-12 col-md-6 col-lg-4" method="post" action="/admin/books/add/">
                    <div class="form-group">
                        <label for="formName">Name</label>
                        <input type="text" name="name" id="formName" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="formGenre">Genre</label>
                        <select name="genre" class="form-control" id="formGenre" required>
                            <?php foreach ($genres as $genre): ?>
                                <option value="<?= $genre->getId(); ?>"><?= $genre->getName(); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="formAuthor">Author</label>
                        <select name="author" class="form-control" id="formAuthor" required>
                            <?php foreach ($authors as $author): ?>
                                <option value="<?= $author->getId(); ?>"><?= $author->getName(); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="formPublisher">Publisher</label>
                        <select name="publisher" class="form-control" id="formPublisher" required>
                            <?php foreach ($publishers as $publisher): ?>
                                <option value="<?= $publisher->getId(); ?>"><?= $publisher->getName(); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="formPrice">Price</label>
                        <input type="text" name="price" id="formPrice" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="formPages">Pages</label>
                        <input type="text" name="pages" id="formPages" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="formPages">Cover</label>
                        <input type="text" name="image" id="formPages" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="formDescription">Description</label>
                        <textarea name="description" id="formDescription" class="form-control" required></textarea>
                    </div>
                    <button class="btn btn-primary mb-3" type="submit">Create</button>
                </form>
            </div>
        </div>
    </main>

<?php $footer->output(); ?>