<?php include "../../head.html";?>
<body>
<?php include "../../header.php";?>



<div id="app">
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                            <div class="card-header">Livreur Manage</div>
                            <div class="card-body">
                            <a href="?showAll=true" type="button" class="btn btn-secondary">Show All Livreur </a>
                            <button type="button" class="btn btn-success" data-toggle="modal"   data-target="#AddModal">Add New Livreur</button>
                            <button type="button" class="btn btn-warning" data-toggle="modal"   data-target="#SendNoteModal">Send Note To Livreur</button>
                            <button type="button" class="btn btn-danger" data-toggle="modal"   data-target="#RemvModal">Remove Livreur</button>
                            <br>
                            <br>
                            <?php 
                                if(isset($_GET['rep'])){
                                    $rep = $_GET['rep'];
                                    if($rep=="AjoutLivOK"){
                                        echo " <div class='alert alert-success' role='alert'>
                                        New Livreur Added Successfully
                                        </div>";
                                    }else if($rep=="AjoutLivBAD"){
                                       echo " <div class='alert alert-danger' role='alert'>
                                        Faild To Add New Livreur
                                        </div>";
                                    }else if($rep=="FindOK"){
                                        echo " <div class='alert alert-danger' role='alert'>
                                         Livreur Deja Ajouté, Faild To Add New Livreur! 
                                         </div>";
                                     }else if($rep=="NotFound_Rmv"){
                                        echo " <div class='alert alert-danger' role='alert'>
                                         Livreur Non Trouvé, Faild To Remove Livreur! 
                                         </div>";
                                     }else if($rep=="Good_Rmv"){
                                        echo " <div class='alert alert-success' role='alert'>
                                         Livreur Removed Successfully
                                         </div>";
                                     }else if($rep=="ErrSq_Rmv"){
                                        echo " <div class='alert alert-danger' role='alert'>
                                        Faild To Remove Livreur! 
                                         </div>";
                                     }else if($rep=="Good_Note"){
                                        echo " <div class='alert alert-success' role='alert'>
                                        Note Send Succefully
                                         </div>";
                                     }else if($rep=="NoLiv_Note"){
                                        echo " <div class='alert alert-danger' role='alert'>
                                        Id Livreur Non Trouver ,Faild To Send Note! 
                                         </div>";
                                     }else if($rep=="ErrSq_Note"){
                                        echo " <div class='alert alert-danger' role='alert'>
                                        Faild To Send Note! 
                                         </div>";
                                     }
                                }


                            ?>
                            
                        </div>
                    </div>
                </div>
                    
            </div>
                
        </div>
    </main>
</div>
<script>

function ShowPassword(id){
    if(document.getElementById(id).type=="text"){
        document.getElementById(id).type = "password";
        document.getElementById('BTN'+id).innerHTML = "Show Password";

    }else{
        document.getElementById(id).type = "text";
        document.getElementById('BTN'+id).innerHTML = "Hide Password";
    }

}
</script>


<?php include "V@AddLiv.php" ?>
<?php include "V@RemvLiv.php" ?>
<?php include "V@SendNoteLiv.php" ?>
<?php if(isset($_GET['showAll'])){
    if($_GET['showAll']==true){
        $conn = new mysqli('127.0.0.1', 'root', '', 'db-sou9');
        $req = "select * from user where role='Livreur';";
        $res = $conn->query($req);
        if($res->num_rows==0){
            echo "Acune Livreur";
        }else{
            ?>
<div id="app">
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                            <div class="card-header">All Livreur</div>
                            <div class="card-body">
            <?php
            while($l=$res->fetch_array()){
                $sreq = "select grade from grades where IdLivreur='$l[0]'";
                $grade=$conn->query($sreq)->fetch_array()[0];
                $sreq= "select count(*) from commands  where LivrasionDate is null and LivreurID='$l[0]' group by LivreurID;";
                $CommandeNotFin=$conn->query($sreq)->fetch_array()[0];
                $sreq= "select count(*) from commands  where LivrasionDate is not null and LivreurID='$l[0]' group by LivreurID;";
                $CommandeFin=$conn->query($sreq)->fetch_array()[0];
                if($CommandeNotFin==null){
                    $CommandeNotFin=0;
                }
                if($CommandeFin==null){
                    $CommandeFin=0;
                }
                $para = 'pass'.$l[0];

                echo "
                <div class='card' style='margin-top:5%;'>
                <div class='card-body' >
                    <h5 class='card-title'>$l[2] $l[3] </h5>
                    <h6 class='card-subtitle mb-2 text-muted'>ID: $l[0] - Grade: $grade</h6>
                    <p class='card-text' >email: $l[1] - Phone Number $l[5] <br> Commande Terminé: $CommandeFin -  commande en attend: $CommandeNotFin </p>
                    
                    <div class='row'>
                                    
                                <div class='col-sm'>
                                        <div class='card'>
                                        <input id='pass".$l[0]."' class='form-control' type='password' value='$l[4]' readonly>                                        </div>
                                    </div>
                                    <div class='col-sm'>
                                        <div class='card'>
                                        <button type='button' id='BTNpass".$l[0]."'  onclick=\"ShowPassword('$para')\" class='btn btn-primary'>Show Password</button>
                                        </div>
                                    </div>
                                </div>
                    </div>
                    <div class='row'>
                                    <div class='col-sm'>
                                        <div class='card'>
                                        <a href='V@LivreurDetails.php?idliv=$l[0]' id='BTNpass".$l[0]."'  onclick=\"ShowPassword('$para')\" class='btn btn-info'>Plus Detail</a>
                                        </div>
                                    </div>
                                

                    </div>
                </div>
                ";
            }
            ?>
                        </div>
                    </div>
                </div>
                    
            </div>
                
        </div>
    </main>
</div>
<?php
        }
    }
}

?>




</body>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</html>