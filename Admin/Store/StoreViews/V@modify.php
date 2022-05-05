<?php 

  if(isset($_POST['idItem'])|| isset($_GET['idItem'])){
    $conn = new mysqli('127.0.0.1', 'root', '', 'db-sou9');
    if(isset($_POST['idItem'])){
      $ref = $_POST['idItem'];
  }
  if(isset($_GET['idItem'])){
      $ref = $_GET['idItem'];
  }
    $req = "select * from items where ref='$ref';";
    $res = $conn->query($req);
    $l = $res->fetch_array();
  }
?>
<?php include "../../head.html";?>

<body>
<?php include "../../header.php";?>
<?php include "StoreNav.php";?>
<div id="app">

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center bg-light border border-primary shadow-sm p-3 mb-5 bg-white rounded">
                    <div class="col-md-16">
<form class="row g-3" action='../StoreController/C@modify.php' method="POST">
<h2>Modify ITEM</h2>
<?php 
  $NotFound = false;
  if(isset($_POST['idItem'])){
    if($res->num_rows==0){
      echo "<div class='alert alert-danger' role='alert'>";
        echo "Ref: $ref Not Found !";
      echo "</div>";
      $NotFound = true;
    }
  }
  
    if(isset($_GET['msgSucss'])){
      echo "<div class='alert alert-success' role='alert'> Mise A jour Bien";
      echo "</div>";
    }
  ?>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Ref</label>
    <input name="ref" type="text" class="form-control" id="inputEmail4" value="<?php if(isset($_POST['idItem'])||isset($_GET['idItem'])){echo $l[0];} ?> " readonly>
  </div>

  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Name</label>
    <input name="name" type="text" class="form-control" id="inputPassword4" value="<?php if(isset($_POST['idItem'])||isset($_GET['idItem'])){echo $l[1];} ?>" <?php if($NotFound){echo "readonly";}?>>
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Price</label>
    <input name="price" type="text" class="form-control" id="inputEmail4" value="<?php if(isset($_POST['idItem'])||isset($_GET['idItem'])){echo $l[2];} ?>"<?php if($NotFound){echo "readonly";}?>>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Qte</label>
    <input name="qte" type="text" class="form-control" id="inputPassword4" value="<?php if(isset($_POST['idItem'])||isset($_GET['idItem'])){echo $l[3];} ?>"<?php if($NotFound){echo "readonly";}?>>
  </div>
 
  <div class="col-md-4">
    <label for="inputState" class="form-label">Type</label>
    <select name="type"   id="inputState" class="form-select" <?php if($NotFound){echo "disabled";}?>>
    <?php 
    
  
      if($l[5]=="fruit"){
          echo "<option selected >fruit</option>";
      }else{
          echo "<option >fruit</option>";
      }
      if($l[5]=="legume"){
          echo "<option selected >legume</option>";
      }else{
          echo "<option  >legume</option>";
      }
      if($l[5]=="other"){
          echo "<option selected>other</option>";
      }else{
          echo "<option >other</option>";
      }
      
    ?>
    
      
    </select>
  </div>
  <div class="col-md-2">
    <label for="inputZip" class="form-label">Unit</label>
    <input name="unit" type="text" class="form-control" id="inputZip" value="<?php if(isset($_POST['idItem'])||isset($_GET['idItem'])){echo $l[6];} ?>" <?php if($NotFound){echo "readonly";}?>>
  </div>
  <div class="col-md-2">
    <label for="inputZip" class="form-label">Image</label>
    <input name="pic_path" type="file" name="file" id="" value="default.png" <?php if($NotFound){echo "disabled";}?>>
</div>
  
  <div class="col-12">
    <button type="submit" class="btn btn-primary" <?php if($NotFound){echo "disabled";}?>>Modify</button>
  </div>
</form>
</div>
                </div>
            </div>
        </main>
</div>
