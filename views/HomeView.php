<?php
    class HomeView {

        private $model;

        public function __construct($model) {
            $this->model = $model;
        }

        public function render($errors = null, $tasks = null) {
            require_once('views/inc/navbar.php');
            ?>
            <div class="container">
                <?php echo '<h1>Bienvenue ' . $_SESSION['username'] . '!</h1>'; ?>
                <div class="col-md-6 mx-auto">
                    <div class="card card-body bg-light mt-5">
                        <h1 class="mx-auto text-primary">You have to do this</h1>
                        <?php
                            if($_SESSION['status'] === "The task was successfully added") { ?>
                                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                <?php print $_SESSION['status']; ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                            <?php $_SESSION['status'] = ""; } ?>
                            <?php
                            if($_SESSION['status'] === "The task was successfully deleted") { ?>
                                <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                <?php print $_SESSION['status']; ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                            <?php $_SESSION['status'] = ""; } ?>
                            <?php
                            if($_SESSION['status'] === "The task was successfully updated") { ?>
                                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                <?php print $_SESSION['status']; ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                            <?php $_SESSION['status'] = ""; } ?>
                        <form action="index.php?controller=Home&action=create" method="post" class="mb-4">
                        <div class="form-group mb-1">
                            <input type="text" name="taskName" class="form-control <?php echo (!empty($errors['taskName_err'])) ? 'is-invalid' : ''; ?>"  id="taskName" placeholder="Task Name">
                            <span class="invalid-feedback"><?php echo $errors['taskName_err']; ?></span>
                        </div>
                        <div class="form-group">
                            <input type="text" name="taskDescription" class="form-control <?php echo (!empty($errors['taskDescription_err'])) ? 'is-invalid' : ''; ?>"  id="taskDescription" placeholder="Task Description">
                            <span class="invalid-feedback"><?php echo $errors['taskDescription_err']; ?></span>
                        </div>
                            <button class="btn btn-success float-right" type="submit">+ Add Task</button>
                        </form>
                        <ul class="list-group todo-list">
                        <?php
                            function cmp($a, $b) {
                                return strcmp($a->getDate(), $b->getDate());
                            }
                            usort($tasks, "cmp");
                            foreach($tasks as $task) {
                                if ($_GET['action'] === "edit" && $task->getId() === $_GET['id']) {
                                    print "<div class='card mb-1 border border-primary'>";
                                } elseif ($task->getCompleted()) {
                                    print "<div class='card mb-1 border border-success'>";
                                } else {
                                    print "<div class='card mb-1'>";
                                }
                                    print "<div class='card-body'>";
                                        if($_GET['action'] !== "edit" || $_GET['id'] !== $task->getId()) {
                                            print "<p>" . "<strong>Nom</strong> : " . $task->getNom() . "</p>";
                                            print "<p>" . "<strong>Description</strong> : " . $task->getDescription() . "</p>";
                                            print "<p>" . "<strong>Date</strong> : " . $task->getDate() . "</p>";
                                            print "<span>" . "<strong>Complété</strong> : ";
                                            print ($task->getCompleted() == false) ? "Non" : "Oui" . "</span>";
                                            print "<a href='index.php?controller=Home&action=delete&id=" . $task->getId() . "' class='btn btn-danger float-right'>Delete</a>";
                                            print "<a href='index.php?controller=Home&action=edit&id=" . $task->getId() . "' class='btn btn-primary mr-1 float-right'>Edit</a>";
                                            if ($task->getCompleted() === false) {
                                                print "<a href='index.php?controller=Home&action=markDone&id=" . $task->getId() . "' class='btn btn-success mr-1 float-right'>Done</a>";
                                            } else {
                                                print "<a href='index.php?controller=Home&action=markUndone&id=" . $task->getId() . "' class='btn btn-outline-success mr-1 float-right'>Undone</a>";
                                            }
                                        } else {
                                            print "<form action='index.php?controller=Home&action=save' method='post' class='mb-4'>";
                                            print "<div class='form-group mb-1'>"; ?>
                                                <input type="text" name="taskName" class="form-control"  id="taskName" value="<?php print $task->getNom(); ?>">
                                                <?php
                                                print "<span class='invalid-feedback'>" . $errors['taskName_err'] . "</span>";
                                            print "</div>";
                                            print "<div class='form-group'>"; ?>
                                                <input type="text" name="taskDescription" class="form-control"  id="taskDescription" value="<?php print $task->getDescription(); ?>">
                                                <?php
                                                print "<span class='invalid-feedback'>" . $errors['taskDescription_err'] . "</span>";
                                            print "</div>";
                                                print "<button class='btn btn-success float-right' type='submit'>Save</button>";
                                                ?>
                                                <input type="hidden" name="taskId" value="<?php print $task->getId(); ?>">
                                                <input type="hidden" name="taskUser" value="<?php print $task->getUser(); ?>">
                                                <input type="hidden" name="taskCompleted" value="<?php print $task->getCompleted(); ?>">
                                                <input type="hidden" name="taskDate" value="<?php print $task->getDate(); ?>">
                                                <?php
                                            print "</form>";
                                        }
                                    print "</div>";
                                print "</div>";
                            }
                        ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php 
        }
    }