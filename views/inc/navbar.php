<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
  <div class="container">
  <a class="navbar-brand" href="index.php?controller=Home&action=home">Just Do It!</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php?controller=Home&action=home">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="modal" href="#" data-target="#exampleModalCenter">About</a>
      </li>
    </ul>

    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php?controller=Signin&action=processSignout">Logout</a>
      </li>
    </ul>
  </div>
  </div>
</nav>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">About this project</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        This project was a creation by a badass coder, for a fun and badass Web Development course for learning PHP, and MongoDB. <br><br>
        Peace.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>