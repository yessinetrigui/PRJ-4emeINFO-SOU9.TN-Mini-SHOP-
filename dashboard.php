<?php
session_start();
if(empty($_SESSION['mail'])){
    header('location: login.php');
}else{
    //echo "Bonjour ".  $_SESSION['mail'];
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <?php include "commun/head.html" ?>
    <?php include "commun/header.php" ?>
    <script src="script/dashboard.js"></script>
    <script>
        
    </script>
    <script>
        
        // Activ Circle
        
        <?php 
        $conn = new mysqli('127.0.0.1', 'root', '', 'db-sou9');
        $req1 = "select * from items where type='fruit'";
        $req2 = "select * from items where type='legume'";
        $req3 = "select * from items where type='other'";
        $res1 = $conn->query($req1);
        $res2 = $conn->query($req2);
        $res3 = $conn->query($req3);

        ?>
        Max_Items = 4
        if(window.screen.width<1600){
            Max_Items = 3
        }
        FRT = new Categorie('fruit', <?php echo $res1->num_rows?>, Max_Items)
        LEG = new Categorie('legume', <?php echo $res2->num_rows?>, Max_Items)
        OTH = new Categorie('other', <?php echo $res3->num_rows?>, Max_Items)
        OBJ = {
            "fruit":{<?php
            if($res1->num_rows!=0){
                while ($l = $res1->fetch_array()){
                    echo "'$l[0]':new Map().set('ref','$l[0]').set('name','$l[1]').set('price','$l[2]').set('qte', '$l[3]').set('pic_path', '$l[4]').set('unit', '$l[6]').set('pic_path', '$l[4]'),";
                }
            }
            ?>},
            "legume":{<?php
            if($res2->num_rows!=0){
                while ($l = $res2->fetch_array()){
                    echo "'$l[0]':new Map().set('ref','$l[0]').set('name','$l[1]').set('price','$l[2]').set('qte', '$l[3]').set('pic_path', '$l[4]').set('unit', '$l[6]').set('pic_path', '$l[4]'),";
                }
            }
            ?>},
            "other":{<?php
            if($res3->num_rows!=0){
                while ($l = $res3->fetch_array()){
                    echo "'$l[0]':new Map().set('ref','$l[0]').set('name','$l[1]').set('price','$l[2]').set('qte', '$l[3]').set('pic_path', '$l[4]').set('unit', '$l[6]').set('pic_path', '$l[4]'),";
                }
            }
             ?>},
        }
        
        /*OBJ = [<php/* 
        
            
            $res = $conn->query($req);
            while ($l = $res->fetch_array()){
                echo "new Map().set('ref','$l[0]').set('name','$l[1]').set('price','$l[2]').set('qte', '$l[3]').set('pic_path', '$l[4]').set('unit', '$l[6]'),";
            } 
            $l =  array("1.png", "1415.png", "1E.png","banane", "kiwi", "orange","banane", "kiwi", "lonely", "lonely", "lonely");
            $l2 =  array("banane", "kiwi", "orange","banane", "kiwi", "orange","banane", "kiwi", "lonely", "lonely", "lonely");
            $l3 =  array("2.500 TND", "7.100 TND", "4.510 TND","banane", "kiwi", "orange","banane", "kiwi", "orange", "lonely");
            for ($i=0; $i<10; $i++){
                echo "new Map().set('pic','$l[$i]').set('name','$l2[$i]').set('price','$l3[$i]').set('unit', 'kg'),";
            }
        ]*/
        /*OBJ = [
            new Map().set("pic","1.png").set("name","banane"),
            new Map().set("pic","1415.png").set("name","kiwi"),
            new Map().set("pic","1E.png").set("name","orange")
        ];
        for (i=0 ; i<3; i++){
            alert(OBJ[i].get("pic")+" :> "+OBJ[i].get("name"))
        }*/
    </script>
    <script>
        
        
    </script>
    <main id="D">
        <div class="M">
            <div class="Cadre" id="CM">
                <div class="title">
                    <h1>FRUITS</h1>
                </div>
                <div class="list-scroll">
                    <div  class="GO-L">
                        <img onclick="FRT.Prev()" src="src/dashboard/left.svg" alt="">
                    </div>
                    <div class="list">
                        <div class="list-items" id="fruit">
                            <script>
                                FRT.SHOW_Menu(0)
                            </script>
                            
                        </div>
                        <div class="bar">
                            <script>
                                for(let i=0; i<FRT.CN; i++){
                                    document.write("<div class='circ' id='fruit_cir_"+i+"'></div>")
                                }            
                            </script>
                            
                        </div>
                    </div>
                    <div  class="GO-R">
                        <img onclick="FRT.Next()" src="src/dashboard/right.svg" alt="">
                    </div>
                </div>
            </div>
            
            <div class="Cadre" id="CM">
                <div class="title">
                    <h1>Legume</h1>
                </div>
                <div class="list-scroll">
                    <div  class="GO-L">
                        <img onclick="LEG.Prev()" src="src/dashboard/left.svg" alt="">
                    </div>
                    <div class="list">
                        <div class="list-items" id="legume">
                            <script>
                                LEG.SHOW_Menu(0)
                                
                            </script>
                            
                        </div>
                        <div class="bar">
                            <script>
                                for(let i=0; i<LEG.CN; i++){
                                    document.write("<div class='circ' id='legume_cir_"+i+"'></div>")
                                }            
                            </script>
                            
                        </div>
                    </div>
                    <div class="GO-R">
                        <img onclick="LEG.Next()" src="src/dashboard/right.svg" alt="">
                    </div>
                </div>
            </div>

            <div class="Cadre" id="CM">
                <div class="title">
                    <h1>Seeds - flour - rices</h1>
                </div>
                <div class="list-scroll">
                    <div  class="GO-L">
                        <img onclick="OTH.Prev()" src="src/dashboard/left.svg" alt="">
                    </div>
                    <div class="list">
                        <div class="list-items" id="other">
                            <script>
                                OTH.SHOW_Menu(0)
                            </script>
                            
                        </div>
                        <div class="bar">
                            <script>
                                for(let i=0; i<OTH.CN; i++){
                                    document.write("<div class='circ' id='other_cir_"+i+"'></div>")
                                }            
                            </script>
                            
                        </div>
                    </div>
                    <div  class="GO-R">
                        <img onclick="OTH.Next()" src="src/dashboard/right.svg" alt="">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="C">
        
            <div class="title">
                <h1>Cart</h1>
                <img src="src/dashboard/Line.svg" alt="">
            </div>
            <div class="cart" id="cartU">
                <script>
                    if(CART_Items['fruit'].length==0&&CART_Items['legume'].length==0&&CART_Items['other'].length==0){
                        document.write("<div class='empty'><img src='src/dashboard/empty-cart.svg'><h1>Your cart is currently empty."+
                        "</h1></div>")
                    }else{
                       // Cart.SHOW()
                    }
                </script>
                <!--
                <div class="item-b">
                    <div class="name-barcode">
                        <h1>[NAME]</h1>
                        <h2><{Bar_Code}</h2>
                    </div>
                    <select class="qte">
                        <option value="1">1x Kg</option>
                        <option value="2">2x Kg</option>
                        <option value="3">3x Kg</option>
                        <option value="4">4x Kg</option>
                        <option value="5">5x Kg</option>
                    </select>
                </div>-->
                
                
            </div>
            <div class="rest">
                <div class="line">
                <img src="src/dashboard/Line.svg" alt="">
                </div>
                <div class="total">
                    <h1>
                        <span>Total</span>
                        <span id="PAY">0.000 TND</span>
                    </h1>
                </div>
<script>
    function CALC(L){
        Command=""
        for(i=0; i<L.length; i++){
            Command += L[i].get('ref') + " : " + L[i].get('qte') + " // "
        }
        return Command
    }
    function check(){
        var pay = document.getElementById("PAY").innerHTML;
        Command=""
        Command+=CALC(CART_Items['fruit'])
        Command+=CALC(CART_Items['legume'])
        Command+=CALC(CART_Items['other'])
        document.getElementById("dd").value=Command;
        pay = pay.substring(0, pay.indexOf(' '));
        //return false;
        
        return Number(pay) > 15;
    }
</script>

                <div class="checkout">
                    <form action="AddCommand.php" method="post" onsubmit="return check()">
                        <input style="display:none" type="text" name="DATA" value="" id="dd">
                    <input type="submit" value="Checkout (min 15TND)">
                    </form>
                </div>
            </div>

        </div>
        

    </main>
   

    <script>
        document.getElementById("fruit_cir_0").style.backgroundColor="#000";
       document.getElementById("legume_cir_0").style.backgroundColor="#000";
       document.getElementById("other_cir_0").style.backgroundColor="#000";
    </script>
    </body>
    </html>
<?php 
}
?>