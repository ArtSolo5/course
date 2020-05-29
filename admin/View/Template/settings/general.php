<?php $header->output(); ?>

<main>
    <div class="container">
        <div class="row">
            <div class="col page-title">
                <h3>Settings</h3>
            </div>
        </div>
        <form method="post" action="/admin/settings/update/">
            <?php foreach ($settings as $setting): ?>
                <?php if ($setting->getKeyField() == 'language'): ?>
                    <div class="form-group row">
                        <label for="formLangSite" class="col-2 col-form-label">
                            <?= $setting->getName(); ?>
                        </label>
                        <div class="col-10">
                            <select class="form-control" name="<?= $setting->getKeyField(); ?>" id="formLangSite">
                                <?php foreach($languages as $language): ?>
                                    <option value="<?= $language->info->key ?>">
                                        <?= $language->info->title ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="form-group row">
                        <label for="" class="col-2">
                            <?= $setting->getName(); ?>
                        </label>
                        <div class="col-10">
                            <input type="text" class="form-control" name="<?= $setting->getKeyField(); ?>" value="<?= $setting->getValue(); ?>">
                        </div>
                    </div>
                <?php endif;  ?>
            <?php endforeach; ?>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
    </div>
</main>

<?php $footer->output(); ?>
