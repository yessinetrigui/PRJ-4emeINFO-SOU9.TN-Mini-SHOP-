// list of objects of items added to the CART
CART_Items = {
    'fruit':[],
    'legume':[],
    'other':[]
}
/*
CART_Items = {
    'fruit':[[Map(4), Map(4)]],
    'legume':[Map(4) {'REF' => 'FF', 'name' => 'banane', 'qte' => '+15', 'price' => '7.100'}],
    'other':[]
}


*/
//this func is to check if the user has already a qte


class CART_C{
    getKg(Categorie, x){
        this.kg = ""
        this.pas = 1
        for (let i=0; i<15; i+=this.pas){
            if (i+1 == Number(CART_Items[Categorie][x].get("qte"))){
                this.kg+= '<option value="'+(i+1)+'" selected>'+(i+1)+'x Kg</option>';
            }else{
                this.kg+= '<option value="'+(i+1)+'">'+(i+1)+'x Kg</option>';
            }
            if (i==6){
                this.pas=2
            }
        }
        return this.kg
    }
    ShowCartPerCat(Categorie){
        this.count = CART_Items[Categorie].length;
        for (let i=0; i<this.count; i++){
            this.y = '"' +  Categorie + '"'
            this.code+="<div class='item-b'>"+
            "<div class='name-barcode'>"+
            "<h1>"+CART_Items[Categorie][i].get("name")+"</h1>"+
            "<h2>"+CART_Items[Categorie][i].get("ref")+"</h2>"+
            "</div>"+
            `<select id='`+Categorie+`sl_`+i+`' onchange='ObjCart.onChooseQTE(`+this.y+","+i+`)' class='qte'>`+
            ""+ObjCart.getKg(Categorie, i)+""+
            "</select>"+
            "</div>"
        }
        
    }
    SHOW_Cart(){
        // get list of categories 
        this.cat = Object.keys(CART_Items);
        this.code =""
        for (let i=0; i<this.cat.length; i++){
            ObjCart.ShowCartPerCat(this.cat[i])
        }
       
        
        document.getElementById("cartU").innerHTML=this.code;
        ObjCart.calcPrice()
    }
    onChooseQTE(categorie, i){
        i= Number(i)
        CART_Items[categorie][i].set("qte", document.getElementById(categorie+"sl_"+i).value);
       ObjCart.calcPrice()
    }
    calcPrice(){
        var Price = 0 
        // get list of categories 
        this.cat = Object.keys(CART_Items);
        for (let j =0; j<this.cat.length; j++){
            for(let i=0; i<CART_Items[this.cat[j]].length; i++){
                Price+=Number(CART_Items[this.cat[j]][i].get("price"))*Number(CART_Items[this.cat[j]][i].get("qte"))
            }
        }
        
        Price = Price+""
        if (Price.indexOf('.')!=-1){
            Price = Price.substring(0, Price.indexOf('.')+4)
        }
        document.getElementById("PAY").innerHTML = (Price)+" TND"
    }
}

ObjCart = new CART_C();

class Categorie{
    constructor(type, NumberItems, Pas){
        this.type = type;
        this.Slide_Start=0
        this.Slide_Length=NumberItems
        this.Slide_Pas=Pas
        this.CN = Number(this.Slide_Length/this.Slide_Pas)
        this.Actv_Cir = type+"_cir_"+this.Slide_Start
        
    }
    // update circels of list items
    updateCicrl(Mode){
        document.getElementById(this.Actv_Cir).style.backgroundColor="#A6A7AB";
        if(Mode=="Next"){
            this.N = Number(this.Actv_Cir.substring(this.Actv_Cir.lastIndexOf("_")+1, this.Actv_Cir.length))+1
        }else{
            this.N = Number(this.Actv_Cir.substring(this.Actv_Cir.lastIndexOf("_")+1, this.Actv_Cir.length))-1
        }
        if(this.N>=this.CN){
            this.N = 0
        }
        if(this.N<0){
            this.N = 0
        }
        this.Actv_Cir = this.type+"_cir_"+this.N
        document.getElementById(this.Actv_Cir).style.backgroundColor="#000";
    }
    SHOW_Menu(D){
        this.Keys = Object.keys(OBJ[this.type])
        this.F = D + this.Slide_Pas;
        if(this.F>this.Slide_Length){
            this.F=this.Slide_Length
        }
        document.getElementById(this.type).innerHTML = ""
        this.Menu_code=""
        // getting te keys of OBJ['fruit'] exp;
        for (let i=D; i<this.F; i++){
            if(this.type=="fruit"){
                this.ext = "FRT"
            }else if(this.type=="legume"){
                this.ext="LEG"
            }else if(this.type=="other"){
                this.ext="OTH"
            }
            this.Menu_code += "<div class='item'>"+
                "<div class='pic'>"+
                "<img style='width: 100%;height: 100%;' src='src/storepics/"+OBJ[this.type][this.Keys[i]].get("pic_path")+"' alt=''>"+
                "</div>"+
                "<div class='details'>"+
                "<div class='price'><span id='price'>"+OBJ[this.type][this.Keys[i]].get("price")+" TND</span>/<span id='unit'>"+OBJ[this.type][this.Keys[i]].get("unit")+"</span></div>"+
                "<div class='name'>"+OBJ[this.type][this.Keys[i]].get("name")+"</div>"+
                "</div>"+
                "<button class='add-to-cart' onclick="+this.ext+".Addtocart('"+OBJ[this.type][this.Keys[i]].get("ref")+"')>Add to cart</button>"+
                "</div>"
        }
        document.getElementById(this.type).innerHTML = this.Menu_code;
    }
    
    //check if the name on list or not
    search(ref, categorie){
        for(let i=0; i<CART_Items[categorie].length; i++){
            if(CART_Items[categorie][i].get('ref')==ref){
                return i
            }
        }
        return -1
    }
    Addtocart(ref){
        this.Keys = Object.keys(OBJ[this.type])
        if(this.search(OBJ[this.type][ref].get("ref"),this.type)!=-1){
            alert(OBJ[this.type][ref].get("name")+" deja ajouter")
        }else{
            CART_Items[this.type].push(new Map().set("ref",OBJ[this.type][ref].get("ref")).set("name",OBJ[this.type][ref].get("name")).set("qte", "1").set("price",OBJ[this.type][ref].get("price")))
            ObjCart.calcPrice()
            ObjCart.SHOW_Cart()
        }
    }
    Next(){        
        this.updateCicrl("Next")
        this.Slide_Start+=this.Slide_Pas
        if(this.Slide_Start>=this.Slide_Length){
            this.Slide_Start=0
        }
        this.SHOW_Menu(this.Slide_Start)
    }
    Prev(){        
        this.updateCicrl("Prev")
        this.Slide_Start-=this.Slide_Pas
        if(this.Slide_Start<0 ){
            this.Slide_Start=0
        }
        this.SHOW_Menu(this.Slide_Start)
    }

}