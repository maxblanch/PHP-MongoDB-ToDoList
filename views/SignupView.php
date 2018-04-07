<?php
    class SignupView {

        private $model;

        public function __construct($model) {
            $this->model = $model;
        }

        public function renderSignupForm($errors) { ?>
            <div class="container">
                <div class="col-md-6 mx-auto">
                    <div class="card card-body bg-light mt-5">
                        <h1 class="mx-auto text-primary">Subscribe!</h3>
                        <p class="text-secondary">Just Do It! - The legendary app for being a productive badass, created by a legendary badass.</p>
                        <form action="index.php?controller=Signup&action=processSignup" method="post">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="userLogin" class="form-control <?php echo (!empty($errors['username_err'])) ? 'is-invalid' : ''; ?>"  id="userLogin" placeholder="Username">
                            <span class="invalid-feedback"><?php echo $errors['username_err']; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="prenom">Firstname</label>
                            <input type="text" name="userPrenom" class="form-control <?php echo (!empty($errors['prenom_err'])) ? 'is-invalid' : ''; ?>" id="userPrenom" placeholder="Surname">
                            <span class="invalid-feedback "><?php echo $errors['prenom_err']; ?></span>       
                        </div>
                        <div class="form-group">
                            <label for="nom">Lastname</label>
                            <input type="text" name="userNom" class="form-control <?php echo (!empty($errors['nom_err'])) ? 'is-invalid' : ''; ?>" id="userNom" placeholder="Name">
                            <span class="invalid-feedback "><?php echo $errors['nom_err']; ?></span>       
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="userEmail" class="form-control <?php echo (!empty($errors['email_err'])) ? 'is-invalid' : ''; ?>" id="userEmail" placeholder="Email">
                            <span class="invalid-feedback "><?php echo $errors['email_err']; ?></span>       
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="userPassword" class="form-control <?php echo (!empty($errors['password_err'])) ? 'is-invalid' : ''; ?>" id="userPassword" placeholder="Password">
                            <span class="invalid-feedback "><?php echo $errors['password_err']; ?></span>       
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" name="userConfirmPassword" class="form-control <?php echo (!empty($errors['confirm_password_err'])) ? 'is-invalid' : ''; ?>" id="userConfirmPassword" placeholder="Confirm Password">
                            <span class="invalid-feedback "><?php echo $errors['confirm_password_err']; ?></span>       
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                            <button type="submit" class="btn btn-success btn-block">Submit</button>
                            </div>
                            <div class="col-lg-6">
                            <a href="index.php?controller=Signin&action=requestSignin" class="btn btn-light btn-block">Have an account? Sign In</a>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php
        }
        
        public function renderRegistered() {
            $data = $this->model->getUser();
            ?>
            <div class="container">
                <div class="col-md-6 mx-auto">
                    <div class="card card-body bg-light mt-5">
                        <h1 class="mx-auto text-primary">You are registered!</h3>
                        <p class="text-secondary">You are now ready to be a productive badass!</p>
                        <ul>
                            <li>The username you chose is: <?php echo $this->model->user->getUsername(); ?></li>
                            <li>You name is: <?php echo $this->model->user->getFirstname() . ' ' . $this->model->user->getLastname(); ?></li>
                            <li>You email is: <?php echo $this->model->user->getEmail(); ?></li>
                            <li>You encrypted password is: <?php echo md5($this->model->user->getPassword()); ?></li>
                        </ul>
                        <a href="index.php?controller=Signin&action=requestSignin" class="btn btn-success">You can now Signin</a>
                    </div>
                </div>
            </div>
        <?php
        }
    }