<?php $header->output(); ?>

    <main>
        <div class="container">
            <div class="row">
                <div class="col page-title">
                    <h3>Edit book</h3>
                </div>
            </div>
            <div class="row">
                <form class="col-12 col-md-6 col-lg-4" method="post" action="/admin/books/update/<?= $book->getId(); ?>">
                    <input type="hidden" name="id" id="formBookId" value="<?= $book->getId(); ?>" />
                    <div class="form-group">
                        <label for="formName">Name</label>
                        <input type="text" name="name" id="formName" class="form-control" value="<?= $book->getName(); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="formGenre">Genre</label>
                        <select name="genre" class="form-control" id="formGenre" required>
                            <?php foreach ($genres as $genre): ?>
                                <option value="<?= $genre->getId(); ?>" <?php if ($book->getGenre()->getId() == $genre->getId()) echo 'selected' ?>><?= $genre->getName(); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="formAuthor">Author</label>
                        <select name="author" class="form-control" id="formAuthor" required>
                            <?php foreach ($authors as $author): ?>
                                <option value="<?= $author->getId(); ?>" <?php if ($book->getAuthor()->getId() == $author->getId()) echo 'selected' ?>><?= $author->getName(); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="formPublisher">Publisher</label>
                        <select name="publisher" class="form-control" id="formPublisher" required>
                            <?php foreach ($publishers as $publisher): ?>
                                <option value="<?= $publisher->getId(); ?>" <?php if ($book->getPublisher()->getId() == $publisher->getId()) echo 'selected' ?>><?= $publisher->getName(); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="formPrice">Price</label>
                        <input type="text" name="price" id="formPrice" class="form-control" required value="<?= $book->getPrice(); ?>">
                    </div>
                    <div class="form-group">
                        <label for="formPages">Pages</label>
                        <input type="text" name="pages" id="formPages" class="form-control" required value="<?= $book->getPages(); ?>">
                    </div>
                    <div class="form-group">
                        <label for="formPages">Cover</label>
                        <input type="text" name="image" id="formPages" class="form-control" required value="<?= $book->getImage(); ?>">
                    </div>
                    <div class="form-group">
                        <label for="formDescription">Description</label>
                        <textarea name="description" id="formDescription" class="form-control" required><?= $book->getDescription(); ?></textarea>
                    </div>
                    <button class="btn btn-primary mb-3" type="submit">Apply</button>
                </form>
            </div>
        </div>
    </main>

<?php $footer->output(); ?>