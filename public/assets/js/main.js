
const urlAdresa = window.location.origin+"/DigitalFloos/public";
window.onload = function(){
}

function proveraUnosaReg(){
    var regexIme = /^[A-ZĐŠĆČ][a-zšđćč]{2,14}$/;
    var regexPrezime = /^[A-ZĐŠĆČ][a-zšđćč]{3,14}$/;
    var regexPass = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{6,}$/;
    var regexEmail = /^[A-z\d.\.]{2,18}@(hotmail|gmail)\.(com|rs)$/;
    var poljeIme = $("#ime");
    var poljePrezime = $("#prezime");
    var poljePassword = $("#lozinka");
    var poljeEmail = $("#email");
    var vrednostPass = $("#plozinka");
    proveraPass(vrednostPass,poljePassword);
    proveraUnosaIPrikazGre(poljeIme,regexIme);
    proveraUnosaIPrikazGre(poljePrezime,regexPrezime);
    proveraUnosaIPrikazGre(poljePassword,regexPass);
    proveraUnosaIPrikazGre(poljeEmail,regexEmail);
    if(proveraPass(vrednostPass,poljePassword) && proveraUnosaIPrikazGre(poljeIme,regexIme) &&  proveraUnosaIPrikazGre(poljePrezime,regexPrezime) &&  proveraUnosaIPrikazGre(poljePassword,regexPass) &&  proveraUnosaIPrikazGre(poljeEmail,regexEmail)) {
        return true;
    }
    return false;
}

function proveraUnosaLog(){
    var regexPass = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{6,}$/;
    var regexEmail = /^[A-z\d.\.]{2,18}@(hotmail|gmail)\.(com|rs)$/;
    var poljeEmail = $("#email");
    var poljePassword = $("#lozinka");

    proveraUnosaIPrikazGre(poljePassword,regexPass);
    proveraUnosaIPrikazGre(poljeEmail,regexEmail);

    if( proveraUnosaIPrikazGre(poljePassword,regexPass) && proveraUnosaIPrikazGre(poljeEmail,regexEmail)){
        return true;
    }
    return false;
}


function proveraUnosaNovaObjava(){
    var regexNaslov = /^[A-zŠĐĆČđšćč]+(?: [A-zŠĐĆČđšćč]+)+$/;
    var poljeNaslov = $("#naslov");
    var poljeTextArea = $("#textArea");
    $(poljeTextArea).val().length < 15 ? $(poljeTextArea).next().removeClass("nema") : $(poljeTextArea).next().addClass("nema");
    proveraUnosaIPrikazGre(poljeNaslov,regexNaslov);
    if(proveraUnosaIPrikazGre(poljeNaslov,regexNaslov) && $(poljeTextArea).val().length >= 15 ){
        return true;
    }
    return false;
}

function proveraUnosaIPrikazGre(vrednost,regexp){
    if(!regexp.test($(vrednost).val())){
        $(vrednost).next().removeClass("nema");
        return false
    }
    else{
        $(vrednost).next().addClass("nema");
        return true;
    }
}
function proveraPass(ppass,pass){
    if($(ppass).val() == $(pass).val()){
        $(ppass).next().addClass("nema");
        return true;
    }
    $(ppass).next().removeClass("nema");
    return false;
}

function odobriObjavu(obj){
    $.ajax({
        "url": urlAdresa+"/odobriobjavu",
        "method":"get",
        "data":{
            "idObjave":$(obj).attr("dataAttr")
        },
        "dataType":"JSON",
        success:function(data){
            if(data == 1){
                alert("uspesno ste odobrili objavu")
                $(obj).remove();
            }
            else{
                alert("nesto je poslo naopako");
            }
        },
        error:function (er){
            console.log("eror")
        }
    })
}
function izbrisiObjavu(obj){
    $.ajax({
        "url": "izbrisiObjavu",
        "method":"get",
        "data":{
            "idObjave":$(obj).attr("dataAttr")
        },
        "dataType":"JSON",
        success:function(data){
            if(data == 1){
                alert("uspesno ste izbrisali objavu")
                $(obj).parent().parent().parent().remove();
            }
            else{
                alert("nesto je poslo naopako");
            }
        },
        error:function (er){
            console.log("eror")
        }
    })
}


