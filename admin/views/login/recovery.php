<style>
    .divider:after,
    .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
    }
</style>

<section class="vh-100">
    <div class="container py-5 h-100">
        <div class="row d-flex align-items-center justify-content-center h-100">
            <div class="col-md-8 col-lg-7 col-xl-6">
                <img src="../images/draw2.svg" class="img-fluid" alt="Phone image">
            </div>
            <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                <form method="POST" action="login.php?action=reset">
                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input name="contrasena" type="password" id="form1Example23"
                            class="form-control form-control-lg" />
                        <label class="form-label" for="form1Example23">New Password</label>
                    </div>

                    <div class="d-flex justify-content-around align-items-center mb-4">
                        <!-- Checkbox -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                            <label class="form-check-label" for="form1Example3"> Remember me </label>
                        </div>
                        <a href="login.php?action=forgot">Forgot password?</a>
                    </div>
                    <input type="hidden" name="correo" value="<?php echo $data['correo']?>"/>
                    <input type="hidden" name="token" value="<?php echo $data['token']?>"/>

                    <!-- Submit button -->
                    <input name="enviar" value="Reestablecer" type="submit"
                        class="btn btn-primary btn-lg btn-block"></button>

                    <div class="divider d-flex align-items-center my-4">
                        <p class="text-center fw-bold mx-3 mb-0 text-muted">OR</p>
                    </div>

                    <a class="btn btn-primary btn-lg btn-block" style="background-color: #3b5998" href="#!"
                        role="button">
                        <i class="fab fa-facebook-f me-2"></i>Continue with Facebook
                    </a>
                    <a class="btn btn-primary btn-lg btn-block" style="background-color: #55acee" href="#!"
                        role="button">
                        <i class="fab fa-twitter me-2"></i>Continue with Twitter</a>

                </form>
            </div>
        </div>
    </div>
</section>