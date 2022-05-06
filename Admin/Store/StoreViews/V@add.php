<?php include "../../head.html";?>

<body>
<?php include "../../header.php";?>
<?php include "StoreNav.php";?>
<div id="app">

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center bg-light border border-primary shadow-sm p-3 mb-5 bg-white rounded">
                    <div class="col-md-16">

                    <form class="row g-3" method="POST" action="../StoreController/C@add.php" enctype="multipart/form-data">
<h2>ADD NEW ITEM</h2>

  <?php 
    if(isset($_GET['msgErr'])){
      echo "<div class='alert alert-danger' role='alert'>";
      if($_GET['msgErr']=="F_1"){
        echo "Item Deja Ajouté";
      }else{
        echo "Check Data";
      }
      echo "</div>";
    }
    if(isset($_GET['msgSucc'])){
      echo "<div class='alert alert-success' role='alert'> Item Bien Ajouté";
      echo "</div>";
    }
  ?>

  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Ref</label>
    <input name="ref" type="text" class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Name</label>
    <input name="name" type="text" class="form-control" id="inputPassword4">
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Price</label>
    <input name="price" type="text" class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Qte</label>
    <input name="qte" type="text" class="form-control" id="inputPassword4">
  </div>
 
  <div class="col-md-4">
    <label for="inputState" class="form-label">Type</label>
    <select name="type" id="inputState" class="form-select">
      <option selected>Choose Type</option>
      <option>fruit</option>
      <option>legume</option>
      <option>other</option>
    </select>
  </div>
  <div class="col-md-2">
    <label for="inputZip" class="form-label">Unit</label>
    <input name="unit" type="text" class="form-control" id="inputZip">
  </div>
  <div class="col-md-2">
    <label for="inputZip" class="form-label">Image</label>
    <input type="file" name="choosefile" id="">
</div>
  
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Add</button>
  </div>
</form>


                    </div>
                </div>
            </div>
        </main>
</div>
