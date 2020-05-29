<?php $header->output(); ?>

    <div class="container min-h">
        <div class="row justify-content-center h-100">
            <div class="col-10 col-sm-8 col-md-6 col-lg-4 mt-5 flex-column text-center">
                <h1 id="h1-login" class="mb-3">Log in</h1>
                <a id="login-sign-up" href="/profile/signUp">DON'T HAVE AN ACCOUNT? SIGN UP.</a>
                <form class="form-login mt-5 " action="/profile/login" method="post">
                    <input type="email" class="mb-4" name="email" id="formLoginEmail" placeholder="Email" required>
                    <input type="password" class="mb-5" name="password" id="formLoginPassword" placeholder="Password" required>
                    <button class="common-btn btn-login-sign-up" type="submit">
                        LOG IN
                    </button>
                </form>
            </div>
        </div>
    </div>

<?php $footer->output(); ?>
