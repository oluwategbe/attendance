 <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="index.php">Lighthouse App</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">

        <span class="navbar-toggler-icon"></span>
      </button>
      

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="attendance.php">Add attendance</a>
          </li>
        
        </ul>
        <div class="form-inline my-2 my-lg-0">
          <h3 style="color: #FFFFFF"><?php echo $_SESSION['attendance']['username']; ?></h3>
          <a class="btn btn-outline-info my-2 my-sm-0" href="logout.php" onclick="return confirm('Are you sure you want to logout?')">Logout</a>
        </div>
      </div>
    </nav>