<?php include "../../head.html";?>
<body>
<?php include "../../header.php";?>

    <div id="app">
        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Client Manage</div>
                            <div class="card-body">
                            <button data-toggle="modal"  data-target="#EnbClient" type="button" class="btn btn-success">Enable Client Account</button>
                            <button data-toggle="modal"   data-target="#DisClient" type="button" class="btn btn-danger">Disable Client Account</button>
                           <br>
                           <br><?php 
                            if(isset($_GET['rep'])){
                                $rep = $_GET['rep'];
                                if($rep=="NotFound"){
                                    echo " <div class='alert alert-danger' role='alert'>
                                        Client Non Trouvé
                                    </div>";
                                }else if($rep=="GoodDis"){
                                    echo " <div class='alert alert-success' role='alert'>
                                        Client Disbled Successfully
                                    </div>";
                                }else if($rep=="DejaDis"){
                                    echo " <div class='alert alert-warning' role='alert'>
                                        Client Already Disabled
                                    </div>";
                                }else if($rep=="NotFoundEnb"){
                                    echo " <div class='alert alert-warning' role='alert'>
                                        Client Already Enabled
                                    </div>";
                                }else if($rep=="GoodEnab"){
                                    echo " <div class='alert alert-success' role='alert'>
                                        Client Enabled Successfully
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
<?php include "V@Dis.php";?>
<?php include "V@Enb.php";?>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

</html>