<?php
session_start();
if(!empty($_SESSION['mail'])){
    header('location: dashboard.php');
}else{
    ?>
<!DOCTYPE html>
<html lang="en">
<?php include "commun/head.html" ?>

<body>
    <script>
        function checkPass(p){
            if(p.length<8){
                return false
            }
            return true
        }
        function checkMail(m){
            if((m.indexOf("@")==-1) || (m.indexOf("@")!=m.lastIndexOf("@"))){
                return false
            }
            if(m.lastIndexOf("@")<m.length-1){
                if(!((m[m.indexOf("@")+1].toUpperCase()>="A")&&(m[m.indexOf("@")+1].toUpperCase()<="Z"))){
                return false
            }
            }
            
            if((m.indexOf(".")==-1)){
                return false
            }
            Val = true
            i=-1
            while ((i<m.length-1) && Val){
                i+=1
                if(!((m.charAt(i).toUpperCase()>="A")&&(m.charAt(i).toUpperCase()<="Z"))){
                    if(!((m.charAt(i)!="@")||(m.charAt(i)!=".")||(m.charAt(i)!="_"))){
                        if(!((m.charAt(i).toUpperCase()>="0")&&(m.charAt(i).toUpperCase()<="9"))){
                            Val = false
                        }
                    }
                }
            }
            return Val
        }
        function Check(){
            m = document.getElementById("m").value;
            p = document.getElementById("p").value;
            msErr=""
            pass = true
            if(!(checkMail(m))){
                msErr += "E-Mail Invalid. "
                pass = false
            }
            if(!(checkPass(p))){
                msErr += " Password Invalid. "
                pass = false
            }

            document.getElementById("messErr").innerHTML= msErr;
            return pass
        }
        </script>
    <?php include "commun/header.php" ?>
    
    <main id="LOGIN">
        <div class="box">
        <div id="bl1" class="PIC">
                <img src="src/logo-m.svg" alt="">
            </div>
            <form class="FORM" id="bl2" action="VInsc.php" method="POST" onsubmit="return Check()" style="height:fit-content;">
                <h1>Create New Account</h1>
                <div id="bloc">
                    <input type="text" name="mail" id="m" placeholder="Email">
                </div>
                <div id="bloc">
                    <input type="text" name="nom" id="m" placeholder="nom">
                </div>
                <div id="bloc">
                    <input type="text" name="prenom" id="m" placeholder="prenom">
                </div>
                <div id="bloc">
                    <input type="password" name="password" id="p" placeholder="Password">
                </div>
                <div id="messErr">
                <?php
                    if(isset($_GET['err'])){
                        if($_GET["err"]=="EXT"){
                            echo "Client deja Exist";
                        }
                    }
                ?>
                </div>
                <input type="submit" value="Register" name="G">
                <a id="bt" href='insc.php'>Don’t Have Account ? <span id="UnderLine">Register Now</span></a>
                <a href="#"><span id="UnderLine">Forget Password?</span>
                </a>
            </form>
        </div>
    </main>



    
</body>
</html>
<?php 


}