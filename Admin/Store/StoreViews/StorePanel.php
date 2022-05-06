<?php include "../../head.html";?>






<script>
    
    function changeSL(){
        sl =document.getElementById('sl').value;
        Categorie = ""
        if(sl==1){
            Categorie="fruit"
        }else if(sl==2){
            Categorie="legume"
        }else if(sl==3){
            Categorie="other"
        }else{
            Categorie="unset"
        }
        window.open("StorePanel.php?type="+Categorie, target="_self")
    }
</script>
<body>
<?php include "../../header.php";?>
<?php include "StoreNav.php";?>
<div id="app">

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center bg-light border border-primary shadow-sm p-3 mb-5 bg-white rounded">
                    <div class="col-md-16">
<div class="card-header">Filtre Manage </div>
                    <div class="card-body">
                        <h6>Par Categorie:?*</h6>
                    <select onchange="changeSL()" id="sl" class="form-select" aria-label="Default select example">
                        <?php 
                            if(isset($_GET['type'])){
                                echo "<option value='-1'>Select Categorie</option>";
                            }else{
                                echo "<option selected value='-1'>Select Categorie</option>";
                            }
                            if(isset($_GET['type'])){
                                if($_GET['type']=="fruit"){
                                    echo "<option selected value='1'>Fruit</option>";
                                }else{
                                    echo "<option  value='1'>Fruit</option>";
                                }
                                if($_GET['type']=="legume"){
                                    echo "<option selected value='2'>legume</option>";
                                }else{
                                    echo "<option  value='2'>legume</option>";
                                }
                                if($_GET['type']=="other"){
                                    echo "<option selected value='3'>other</option>";
                                }else{
                                    echo "<option  value='3'>other</option>";
                                }
                                
                            }else{
                                echo "<option  value='1'>Fruit</option>";
                                echo "<option  value='2'>legume</option>";
                                echo "<option  value='3'>other</option>";

                            }
                        ?>
                        
                        
                        </select>
                        
                    </div>
                </div>
                </div>
                <?php 
                $conn = new mysqli('127.0.0.1', 'root', '', 'db-sou9');
                $categorie = "unset";
                if(isset($_GET['type'])){
                    if($_GET['type']!="unset"){
                        $categorie =  $_GET['type'];
                    }
                }
                if($categorie=="unset"){
                    $req = "select * from items";
                }else{
                    $req = "select * from items where type='$categorie'";

                }
                echo "
                <div class='container  bg-light border border-success shadow-sm p-3 mb-5 bg-red rounded'>
                <div class='row row-cols-3'>
                ";
                $res = $conn->query($req);
                if($res->num_rows==0){
                    echo "NO DATA";
                }else{
                    while ($l=$res->fetch_array()){
                        $ref = $l['ref'];
                        $n = $l['name'];
                        $price = $l['price'] + "/" ;
                        $unit = $l['unit'];
                        $qte_stock = $l['qte_stock'];
                        $pic_path = $l['pic_path'];
                        echo "<div class='col' style='margin-top:4%;'>
                        <div class='card' style='width: 18rem;'>
                    <img src='../../../src/storepics/$pic_path' class='card-img-top' alt='...'>
                    <div class='card-body'>
                        <h5 class='card-title'>Ref: $ref</h5>
                        <h6 class='card-title'>Name: $n</h6>
                        <h6 class='card-title'>Price: $price TND/$unit </h6>
                        <h6 class='card-title'>Qte: $qte_stock </h6>
                    <a href='V@modify.php?idItem=$ref' type='button' class='btn btn-warning'>Modify Item</a>
                    <a href='../StoreController/C@delete.php?ref=$ref' type='button' class='btn btn-danger'>Delete Item</a>
                    </div>
                </div></div>
                        ";
                    }
                }
                echo "
                </div>
                </div>
                "
                ?>
                
            
            
                    </div>

                    </div>
                </div>
            </div>
        </main>
</div>
