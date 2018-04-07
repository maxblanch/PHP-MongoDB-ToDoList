<?php
    class SigninView {

        public function __construct() {

        }

        public function renderSigninForm($data) { ?>
        <div class="container">
            <div class="col-md-6 mx-auto">
                <div class="card card-body bg-light mt-5">
                    <h1 class="mx-auto text-primary">Just Do It!</h3>
                    <p class="text-secondary">The legendary app for being a productive badass, created by a legendary badass.</p>
                    <form action="index.php?controller=Signin&action=processSignin" method="post">
                    <div class="form-group">
                        <label for="userLogin">Username</label>
                        <input type="text" class="form-control <?php echo (!empty($data['username_err'])) ? 'is-invalid' : ''; ?>" name="userLogin" id="userLogin" placeholder="Username">
                        <span class="invalid-feedback"><?php echo $data['username_err']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="userPassword">Password</label>
                        <input type="password" name="userPassword" class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" id="userPassword" placeholder="Password">
                        <span class="invalid-feedback "><?php echo $data['password_err']; ?></span>       
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                        <button type="submit" class="btn btn-success btn-block">Submit</button>
                        </div>
                        <div class="col-lg-6">
                        <a href="index.php?controller=Signup&action=requestSignup" class="btn btn-light btn-block">No Account? Register</a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
      <?php      
        }
    }
?>