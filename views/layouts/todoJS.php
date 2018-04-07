<div class="container">
    <?php echo '<h1>Bienvenue ' . $_SESSION['name'] . '!</h1>'; ?>
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h1 class="mx-auto text-primary">You have to do this</h1>
            <form action="" class="todo-form">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Something you must do" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-success" type="submit">+ Add Task</button>
                </div>
                </div>
            </form>
            <ul class="list-group todo-list">
                <li class="list-group-item">
                    <input class="mr-1" type="checkbox" aria-label="Checkbox for following text input">
                    <span>Cras justo odio</span>
                    <button class="btn btn-danger btn-sm float-right">&#10006;</button>
                    <button class="btn btn-primary btn-sm float-right mr-1">&#x270E;</button>
                </li>
            </ul>
        </div>
    </div>
</div>
<script src="assets/todo.js"></script>