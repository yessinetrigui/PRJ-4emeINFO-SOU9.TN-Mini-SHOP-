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

<?php 

if(isset($_GET['idliv'])){
     include "../../head.html";
        echo "<body>";
        include "../../header.php";
    ?>

    <main class="py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <?php
     
    $idLiv =$_GET['idliv']; 
    $conn = new mysqli('127.0.0.1', 'root', '', 'db-sou9');
    $req = "select * from user where IdUser='$idLiv';";
    $res = $conn->query($req);
    $l = $res->fetch_array();
    $sreq = "select grade from grades where IdLivreur='$idLiv'";
    $grade=$conn->query($sreq)->fetch_array()[0];
    $sreq= "select count(*) from commands  where LivrasionDate is null and LivreurID='$idLiv' group by LivreurID;";
    $CommandeNotFin=$conn->query($sreq)->fetch_array()[0];
    $sreq= "select count(*) from commands  where LivrasionDate is not null and LivreurID='$idLiv' group by LivreurID;";
    $CommandeFin=$conn->query($sreq)->fetch_array()[0];
    if($CommandeNotFin==null){
        $CommandeNotFin=0;
    }
    if($CommandeFin==null){
        $CommandeFin=0;
    }
    $para = 'pass'.$l[0];

    echo "
    <div class='card' >
    <div class='card-body'>
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
    </div>
    ";


}else{
    echo 'error';
}
?>
            <div class="card" style='margin-top:5%;'> 
            <div class="card-header"><h6> Pending Commands!</h6></div>

            <div class="card-body">
                    <?php 
                        $conn = new mysqli('127.0.0.1', 'root', '', 'db-sou9');
                        $req = "select * from commands where LivreurID='$idLiv' and LivrasionDate is null;";
                        $res = $conn->query($req);
                        if($res->num_rows==0){
                            echo '<div class="alert alert-info" role="alert">
                            No Pending Commands</div>';
                        }else{
                            while ($l=$res->fetch_array()){
                                $T = time();
                                $TC = strtotime($l[5]);
                                $Formul =(int) (($T-$TC)/86400);
                                
                                if($Formul<=1){
                                    $color = "green";
                                }else if($Formul<=3){
                                    $color = "orange";
                                }else{
                                    $color = "red";
                                }
                                echo"
                                <div class='card text-center' style='margin-top:2%;'>
                                    <div style='color:$color;font-weight:bolder;' class='card-header'>
                                        Command Requested $Formul Days Ago   - <span style='color:orange'>Pending</span>
                                    </div>
                                    <div class='card-body'>
                                        <h5 class='card-title'>Client ID: $l[1], Command ID:  $l[0]</h5>
                                    </div>
                                    <div class='card-footer text-muted'>
                                    Request Date: $l[5] | Accept Command Date: $l[7] 
                                    </div>
                                </div>
                                ";
                            }
                        }
                    ?>


                    
                </div>
                
            </div>
            <div class="card" style='margin-top:5%;'> 
                <div class="card-header"><h6> Done Commands!</h6></div>
                    <div class="card-body">
                    
                    <?php 
                        $conn = new mysqli('127.0.0.1', 'root', '', 'db-sou9');
                        $req = "select * from commands where LivreurID='$idLiv' and LivrasionDate is not null;";
                        $res = $conn->query($req);
                        if($res->num_rows==0){
                            echo '<div class="alert alert-info" role="alert">
                            No Terminated Commands</div>';
                        }else{
                            while ($l=$res->fetch_array()){
                                $T = time();
                                $TC = strtotime($l[5]);
                                $Formul =(int) (($T-$TC)/86400);
                                
                                if($l[6]=='super'){
                                    $color = "lime";
                                }else if($l[6]=='bon'){
                                    $color = "orange";
                                }else{
                                    $color = "red";
                                }
                                echo"
                                
                                <div class='card text-center' style='margin-top:2%;'>
                                    <div  class='card-header'>
                                       State <span style='color:$color;font-weight:bolder;' > $l[6] </span>
                                    </div>
                                    <div class='card-body'>
                                        <h5 class='card-title'>Client ID: $l[1], Command ID:  $l[0]</h5>
                                    </div>
                                    <div class='card-footer text-muted'>
                                    Request Date: $l[5] | Accept Command Date: $l[7] | Livred Date: $l[4] 
                                    </div>
                                </div>
                                
                                ";
                            }
                        }
                    ?>


                    
            </div>
            </div>
            </div>
        </div>
    </div>
</main>