/*
+======================={PROJECT - PRESENTATION}======================+
|                                                                     |
|Project Name    : TD DEVWEB 2 SIMPLON                                |
|service       :   Semi-Static  Website                               |
|FrameWorks      : NONE                                               |
|Author          : OrbitTurner                                        |
|Official Name   : Mohamed GUEYE                                      |
|Version         : v.0.Null                                           |
|Created         : 14-Jun-2020                                        |
|Last update     : 18-Jun-2020                                        |
|Partie          : MAIN JS                                            | 
|LANGAGE UTILISE : ANGLAIS - FRANCAIS                                 |
+=====================================================================+
*/
// --- 🔆 GLOBALS 🔆 ---
var formOk = false;

// ==================================================================================
// ---💠 SETUP OF THE FORM 💠 ---
// ==================================================================================
// FIXME
// PENDING
function initFormSet() {
    // test
    console.log("THE FORM IS LOADED SUCCESSFULLY");
    // Hiding Blocks
    toogleWorkBlocks(1);
    formOk = true;
}


// ==================================================================================
// --- 🔘 RADIO BUTTONS 🔘 ---
// ==================================================================================
// DONE 
// FIXME
var statutProRadios = document.getElementsByName("statutPro");
var oldVal = null;
for (var i = 0; i < statutProRadios.length; i++) {
    statutProRadios[i].addEventListener('change', function() {
        // TESTING VALUES
            // SI OldVal exist
            /*(oldVal) ? console.log("oldV "+oldVal.value): null;
            if (this !== oldVal) {
                oldVal = this;
            }
            console.log("New "+this.value);*/
        // FUNCTION STEPS
        this.value === "isWorking" ? toogleWorkBlocks(2) : toogleWorkBlocks(1);
    });
}

// ==================================================================================
// --- 🧱 BRIQUE-FUNCS 🧱 ---
// ==================================================================================
// DONE
function toogleWorkBlocks(option) {
    option = parseInt(option);
    let blockInfosPro = document.getElementById("infoPro");
    let blockInfosEmp = document.getElementById("infoEmployeur");
    if(option === 1) {
        // var statutPro = document.getElementById("statutPro");
    
        // Defining the Style
        blockInfosPro.style.display = "none";
        blockInfosEmp.style.display = "none";
    }else if (option === 2) {
        blockInfosPro.style.display = "";
        blockInfosEmp.style.display = "";
    }else{
        alert("OPTION ERROR IN THE FUNCTION ToogleWB at Line 29 !\n\n REFRESH THE PAGE OR CONTACT ADMIN !!!");
        document.getElementById("creationClientForm").style.display = "none";
    }
}