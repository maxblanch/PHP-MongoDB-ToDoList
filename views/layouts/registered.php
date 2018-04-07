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