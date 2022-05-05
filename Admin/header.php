<?php    $EXT = basename($_SERVER['PHP_SELF'], '.php');
 ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Admin Control Panel</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link <?php if($EXT=="MainPanel"){echo "active";}  ?>"    aria-current="page" href="/edsa-STI/Projects/Remaster%20SOU9.TN/Admin/MainPanel.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link  <?php if($EXT=="StorePanel"){echo "active";}  ?>" href="/edsa-STI/Projects/Remaster%20SOU9.TN/Admin/Store/StoreViews/StorePanel.php">Store Manager</a>
          </li>
          <li class="nav-item">
            <a class="nav-link  <?php if($EXT=="LivreurPanel"){echo "active";}  ?>" href="/edsa-STI/Projects/Remaster%20SOU9.TN/Admin/Livreur/LivreurViews/LivreurPanel.php">Livreur Manager</a>
          </li>
          <li class="nav-item">
            <a class="nav-link  <?php if($EXT=="ClientPanel"){echo "active";}  ?>" href="/edsa-STI/Projects/Remaster%20SOU9.TN/Admin/Client/ClientViews/ClientPanel.php">Client Manager</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="/edsa-STI/Projects/Remaster%20SOU9.TN/logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>