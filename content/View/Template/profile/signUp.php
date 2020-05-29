<?php $header->output(); ?>

    <div class="container min-h">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-8 col-md-6 col-lg-4 mt-5 flex-column text-center">
                <h1 id="h1-login" class="mb-3">Sign Up</h1>
                <a id="login-sign-up" href="/profile/login">ALREADY HAVE AN ACCOUNT?</a>
                <form class="form-login mt-4" action="/profile/signUp" method="post">
                    <input type="text" class="mb-4" name="name" id="formSignUpName" placeholder="Name" required>
                    <input type="text" class="mb-4" name="surname" id="formSignUpSurname" placeholder="Surname" required>
                    <input type="email" class="mb-4" name="email" id="formSignUpEmail" placeholder="Email" required>
                    <input type="password" class="mb-5" name="password" id="formSignUpPassword" placeholder="Password" required>
                    <button class="common-btn btn-login-sign-up" type="submit">
                        SIGN UP
                    </button>
                </form>
            </div>
        </div>
    </div>

<?php $footer->output(); ?>