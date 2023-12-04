<nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h4">
        CRUD-PHP-OOP
    </span>
    <div class="navbar-collapse justify-content-end">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= base_url('index.php') ?>">Home</a>
        </li>

        <?php if(isset($_SESSION['authenticated'])) : ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?= $_SESSION['auth_user']['user_fname']." ".$_SESSION['auth_user']['user_lname']; ?>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="my-profile.php">My Profile</a></li>
            <li>
              <form action="" method="POST">
                <button type="submit" name="logout_btn"  class="dropdown-item">Logout</button>
              </form>
            </li>
          </ul>
        </li>

        <?php else :  ?>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('login.php') ?>">Login</a>
        </li>  
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('register.php') ?>">Register</a>
        </li>

        <?php endif; ?>

      </ul>
    </div>
  </div>

</nav>



