<?php $header->output(); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <ul class="nav nav-pills mb-3 mt-4" id="pills-tab" role="tablist">
                <?php foreach ($carousels as $carousel): ?>
                    <li class="nav-item mr-3" role="presentation">
                        <a class="nav-link <?= $carousel->getId() == 1 ? 'active' : '' ?> p-2 pl-4 pr-4" id="pills-<?= $carousel->getId(); ?>-tab" data-toggle="pill" href="#pills-<?= $carousel->getId(); ?>" role="tab" aria-controls="pills-<?= $carousel->getId(); ?>" aria-selected="true">
                            <?= $carousel->getId(); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div class="tab-content" id="pills-tabContent">
    <?php foreach ($carousels as $carousel): ?>
        <div class="tab-pane fade <?= $carousel->getId() == 1 ? 'show active' : '' ?>" id="pills-<?= $carousel->getId(); ?>" role="tabpanel" aria-labelledby="pills-<?= $carousel->getId(); ?>-tab">
            <form action="/admin/carousel/update" method="post">
                <input type="hidden" name="id" value="<?= $carousel->getId(); ?>">
                <div class="row mt-3">
                    <label class="col-2 col-form-label" for="carouselTitle">Title</label>
                    <input class="col-10 form-control" id="carouselTitle" type="text" name="title" value="<?= $carousel->getTitle(); ?>">
                </div>
                <div class="row mt-3">
                    <label for="carouselParameter" class="col-2 col-form-label">
                        Parameter
                    </label>
                    <select class=" col-10 form-control" name="parameter" id="carouselParameter">
                        <?php foreach($parameters as $parameter): ?>
                            <option <?= $parameter->getId() == $carousel->getParameter()->getId() ? 'selected' : '' ?> value="<?= $parameter->getId(); ?>">
                                <?= $parameter->getName(); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="row mt-3">
                    <label class="col-2 col-form-label" for="carouselValue">Value</label>
                    <input class="col-10 form-control" id="carouselValue" type="text" name="value" value="<?= $carousel->getValue(); ?>">
                </div>
                <button class="btn btn-primary mt-3" type="submit">
                    Update
                </button>
            </form>
        </div>
    <?php endforeach; ?>
    </div>
</div>

<?php $footer->output(); ?>
