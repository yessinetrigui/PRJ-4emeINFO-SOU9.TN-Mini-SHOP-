<?php include "../../head.html";?>

<body>
<?php include "../../header.php";?>
<?php include "StoreNav.php";?>
<div id="app">

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center bg-light border border-primary shadow-sm p-3 mb-5 bg-white rounded">
                    <div class="col-md-16">
<form class="row g-3" method="get" action="../StoreController/C@delete.php">
<h2>Delete ITEM</h2>
<?php 
    if(isset($_GET['msgErr'])){
      echo "<div class='alert alert-danger' role='alert'>";
      if($_GET['msgErr']=="ErrSq"){
        echo "Check Data";
      }else if($_GET['msgErr']=="NotFound"){
        echo "Aucune Item Supprimé, Verifier le Ref";
      }
      echo "</div>";
    }
    if(isset($_GET['msgSucss'])){
      echo "<div class='alert alert-success' role='alert'> Item Bien Supprimé";
      echo "</div>";
    }
  ?>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Ref</label>
    <input name="ref" type="text" class="form-control" id="inputEmail4">
  </div>
  
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Delete</button>
  </div>
</form>

</div>
                </div>
            </div>
        </main>
</div>
