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
            <form class="FORM" id="bl2" action="VLogin.php" method="POST" onsubmit="return Check()">
                <h1>Sign In</h1>
                <div id="bloc">
                    <input type="text" name="m" id="m" placeholder="Email- Phone number">
                </div>
                <div id="bloc">
                    <input type="password" name="p" id="p" placeholder="Password">
                </div>
                <div id="checkB">
                    <input type="checkbox" name="c" id="c">
                    <label>Remember Me</label>
                </div>
                <div id="messErr">
                <?php
                    if(isset($_GET['err'])){
                        if($_GET["err"]=="XPM"){
                            echo "Client Non Introuvalbe, Veiller verifier votre email ou numer tel.";
                        }else if($_GET["err"]=="XPass"){
                            echo "Inccorect Password !";

                        }else if($_GET["err"]=="BANNED"){
                           
                            if(isset($_GET['reason'])){
                                $Res = $_GET["reason"];
                            echo "Votre Compte Est Bloqué !<br>Reason: $Res";}
                            else{
                                echo "Votre Compte Est Bloqué !";
                            }

                        }
                    }
                ?>
                </div>
                <input type="submit" value="Login" name="G">
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