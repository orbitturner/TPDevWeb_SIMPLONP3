/*
+======================={PROJECT - PRESENTATION}======================+
|                                                                     |
|Project Name    : TD DEVWEB 2 SIMPLON                                |
|service       :   S  Website                                         |
|FrameWorks      : NONE                                               |
|Author          : OrbitTurner                                        |
|Official Name   : Mohamed GUEYE                                      |
|Version         : v.0.Null                                           |
|Created         : 14-Jun-2020                                        |
|Last update     : 18-Jun-2020                                        |
|Partie          : ADD ACCOUNT JS                                     | 
|LANGAGE UTILISE : ANGLAIS - FRANCAIS                                 |
+=====================================================================+
*/
// ==================================================================================
// --- 🔆 GLOBALS 🔆 ---
// ==================================================================================
// STARTING MAIN: ACCOUNT Script Timer
var scriptStartTime = new Date();
console.log("ADD ACCOUNT Form Script Started at : " + scriptStartTime.getHours() + "h : "+scriptStartTime.getMinutes() + "m : " + scriptStartTime.getSeconds() + "s");
var formOk = false;

// STARTING : [INIT FUNCTIONS]
// ==================================================================================
// ---💠 SETUP OF THE FORM 💠 ---
// ==================================================================================
// FIXME
// PENDING
function initFormSet() {
    // test
    // console.log("THE FORM IS LOADED SUCCESSFULLY");
    // Hiding Blocks
    hideAllAccountBlocks();

    formOk = true; 
}
// ENDING : INIT FUNCTIONS


// STARTING [GESTION DES DIFFERENT BOUTON DU FORMULAIRE]
// ==================================================================================
// --- ⏺ ADD EMPLOYEUR BTN ⏺ ---
// ==================================================================================



// STARTING [GESTION DES TYPES DE COMPTES]
// ==================================================================================
// --- 🔽 SELECT OPTIONS 🔽 ---
// ==================================================================================
var selectAccountType = document.getElementById("selectTypeCompte");
selectAccountType.onchange = function() {
    let optionValue =  this.options[this.selectedIndex];
    if (this.selectedIndex === 1 && optionValue.value == "cesp") {
        // CASE CPT EPARGNE XEEWEL SIMPLE
        hideAllAccountBlocks();
        toogleXeewelBlocks(2);
    }else if (this.selectedIndex === 2 && optionValue.value == "cc") {
        // CASE CPT COURANT
        hideAllAccountBlocks();
        toogleCourantBlocks(2);
    }else if (this.selectedIndex === 3 && optionValue.value == "cb") {
        // COMPTE BLOCKED
        hideAllAccountBlocks();
        toogleCptBlBlocks(2);
    }else {
        alert("<h1>VIOLATION OF FORM - REFRESH THE PAGE</h1>");
        document.getElementById("creationClientForm").style.display = "none";
    }
}

// ==================================================================================
// --- 🔘 RADIO BUTTONS 🔘 ---
// ==================================================================================


// ENDING : [BUTTON FUNCTIONS MANAGING]


// STARTING : [MANAGING REUSABLE FUNCTIONS]
// ==================================================================================
// --- 🧱 BRIQUE-FUNCS 🧱 ---
// ==================================================================================
// HIDE ALL ACCOUNT INFOS
function hideAllAccountBlocks() {
    document.getElementById("accountFeeAndNumbBlock").style.display = "none";
    document.getElementById("remunBlock").style.display = "none";
    document.getElementById("agiosBlock").style.display = "none";
    document.getElementById("dateEcheanceBlock").style.display = "none";
    document.getElementById("submitCreateClient").innerHTML = '<button class="btn btn--radius-2 btn--blue" type="submit">Register</button>';

    return true;
}

// PENDING
// Toogle Options For Compte XeeWeul 2 For Show
function toogleXeewelBlocks(option){
    option = parseInt(option);
    let blockAccountFeeNumb = document.getElementById("accountFeeAndNumbBlock");
    let blockRemun = document.getElementById("remunBlock");
    // Toogle Options
    if(option === 1) {
        // Defining the Style
        blockAccountFeeNumb.style.display = "none";
        blockRemun.style.display = "none";
    
    }else if (option === 2) {
        // Show:
        blockAccountFeeNumb.style.display = "";
        blockRemun.style.display = "";
    }else{
        alert("OPTION ERROR IN THE FUNCTION ToogleWB at Line 29 !\n\n REFRESH THE PAGE OR CONTACT ADMIN !!!");
        document.getElementById("creationClientForm").style.display = "none";
    }
}

// PENDING
// Toogle Options For Compte Courant 2 For Show
function toogleCourantBlocks(option){
    option = parseInt(option);
    let blockAgios = document.getElementById("agiosBlock");
    // Toogle Options
    if(option === 1) {
        // hide
        blockAgios.style.display = "none";
    
    }else if (option === 2) {
        // Show:
        blockAgios.style.display = "";
    }else{
        alert("OPTION ERROR IN THE FUNCTION ToogleWB at Line 29 !\n\n REFRESH THE PAGE OR CONTACT ADMIN !!!");
        document.getElementById("creationClientForm").style.display = "none";
    }
}

// PENDING
// Toogle Options For Compte Courant 2 For Show
function toogleCptBlBlocks(option) {
    option = parseInt(option);
    let blockAccountFeeNumb = document.getElementById("accountFeeAndNumbBlock");
    let dateEchBlock = document.getElementById("dateEcheanceBlock");
    // Toogle Options
    if(option === 1) {
        // hide
        blockAccountFeeNumb.style.display = "none";
        dateEchBlock.style.display = "none";
    
    }else if (option === 2) {
        // Show:
        blockAccountFeeNumb.style.display = "";
        dateEchBlock.style.display = "";
    }else{
        alert("OPTION ERROR IN THE FUNCTION ToogleWB at Line 29 !\n\n REFRESH THE PAGE OR CONTACT ADMIN !!!");
        document.getElementById("creationClientForm").style.display = "none";
    }
}

// ENDING : [MANAGING REUSABLE FUNCTIONS]
// ==================================================================================
// --- 🔆 END 🔆 ---
// ==================================================================================
// ENDING MAIN: ACCOUNT Script Timer 
var scriptEndTime = new Date();
scriptTimingMs = parseFloat(scriptEndTime.getTime() - scriptStartTime.getTime());
console.log("ADD ACCOUNT Script ENDED at : " + scriptEndTime.getHours() + "h : "+scriptEndTime.getMinutes() + "m : " + scriptEndTime.getSeconds() + "s");
console.log("Le script a mis " + scriptTimingMs/1000 + " secondes.");
