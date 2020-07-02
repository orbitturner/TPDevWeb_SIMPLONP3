/* === WELCOME TO THE CODE ===
 *                     
 *	  By :
 *
 *     ██████╗ ██████╗ ██████╗ ██╗████████╗    ████████╗██╗   ██╗██████╗ ███╗   ██╗███████╗██████╗ 
 *    ██╔═══██╗██╔══██╗██╔══██╗██║╚══██╔══╝    ╚══██╔══╝██║   ██║██╔══██╗████╗  ██║██╔════╝██╔══██╗
 *    ██║   ██║██████╔╝██████╔╝██║   ██║          ██║   ██║   ██║██████╔╝██╔██╗ ██║█████╗  ██████╔╝
 *    ██║   ██║██╔══██╗██╔══██╗██║   ██║          ██║   ██║   ██║██╔══██╗██║╚██╗██║██╔══╝  ██╔══██╗
 *    ╚██████╔╝██║  ██║██████╔╝██║   ██║          ██║   ╚██████╔╝██║  ██║██║ ╚████║███████╗██║  ██║
 *     ╚═════╝ ╚═╝  ╚═╝╚═════╝ ╚═╝   ╚═╝          ╚═╝    ╚═════╝ ╚═╝  ╚═╝╚═╝  ╚═══╝╚══════╝╚═╝  ╚═╝
 */ 
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
console.log("ADD ACCOUNT Form Script Started at : " + scriptStartTime.getHours() + "h : " + scriptStartTime.getMinutes() + "m : " + scriptStartTime.getSeconds() + "s");
var formOk = false;
var theAccountForm = document.getElementById("addAccountForm");
var typeAccountForm = 0;
var isClientChoosed = false;

var infoPreviousInsert = document.getElementById("breadcrumbInfo");
if(typeof infoPreviousInsert !== 'undefined') {
    setTimeout(function() {
        // $('.custom-select-sm').val(10).change();
        infoPreviousInsert.style.color = "#29c2d6";
        infoPreviousInsert.innerText = ">>> Creation Client ";
    }, 3500);
}

// STARTING : [INIT FUNCTIONS]
// ==================================================================================
// ---💠 SETUP OF THE FORM 💠 ---
// ==================================================================================
// TRIGGER THE FORM SETUP WHEN THE PAGE IS FULLY LOADED
document.addEventListener("DOMContentLoaded", function() {
    initFormAccountSetup();
});
// FIXME
// PENDING
function initFormAccountSetup() {
    // test
    // console.log("THE FORM IS LOADED SUCCESSFULLY");
    // alert("COMPTE FORM LOADED");
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
var selectOwnerAcc = document.getElementById("selectOwnerCompte");

selectAccountType.onchange = function () {
    let optionValue = this.options[this.selectedIndex];
    if (this.selectedIndex === 1 && optionValue.value == "cesp") {
        // CASE CPT EPARGNE XEEWEL SIMPLE
        hideAllAccountBlocks();
        toogleXeewelBlocks(2);
        typeAccountForm = 1;
    } else if (this.selectedIndex === 2 && optionValue.value == "cc") {
        // CASE CPT COURANT
        hideAllAccountBlocks();
        toogleCourantBlocks(2);
        typeAccountForm = 2;
    } else if (this.selectedIndex === 3 && optionValue.value == "cb") {
        // COMPTE BLOCKED
        hideAllAccountBlocks();
        toogleCptBlBlocks(2);
        typeAccountForm = 3;
    } else {
        alert("<h1>VIOLATION OF FORM - REFRESH THE PAGE</h1>");
        document.getElementById("creationClientForm").style.display = "none";
    }
}

selectOwnerAcc.onchange = function () {
    let optionValue = this.options[this.selectedIndex];
    if (optionValue.value === "0") {
        isClientChoosed = false;
    }else{
        isClientChoosed = true;
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
    document.getElementById("accountFeeAndNumbBlock").querySelector('input').disabled = true;
    document.getElementById("accountFeeAndNumbBlock").style.display = "none";
    document.getElementById("remunBlock").style.display = "none";
    document.getElementById("remunBlock").querySelector('input').disabled = true;
    document.getElementById("agiosBlock").style.display = "none";
    document.getElementById("agiosBlock").querySelector('input').disabled = true;
    document.getElementById("dateEcheanceBlock").style.display = "none";
    document.getElementById("dateEcheanceBlock").querySelector('input').disabled = true;
    document.getElementById("submitAccountForm").innerHTML = '<button class="btn btn--radius-2 btn--blue" type="submit">Register</button>';

    return true;
}

// PENDING
// Toogle Options For Compte XeeWeul 2 For Show
function toogleXeewelBlocks(option) {
    option = parseInt(option);
    let blockAccountFeeNumb = document.getElementById("accountFeeAndNumbBlock");
    let blockRemun = document.getElementById("remunBlock");
    // Toogle Options
    if (option === 1) {
        // Defining the Style
        blockAccountFeeNumb.style.display = "none";
        blockAccountFeeNumb.querySelector('input').disabled = true;
        blockRemun.style.display = "none";
        blockRemun.querySelector('input').disabled = true;

    } else if (option === 2) {
        // Show:
        blockAccountFeeNumb.style.display = "";
        blockAccountFeeNumb.querySelector('input').disabled = false;
        blockRemun.style.display = "";
        blockRemun.querySelector('input').disabled = false;
    } else {
        alert("OPTION ERROR IN THE FUNCTION ToogleWB at Line 29 !\n\n REFRESH THE PAGE OR CONTACT ADMIN !!!");
        document.getElementById("creationClientForm").style.display = "none";
    }
}

// PENDING
// Toogle Options For Compte Courant 2 For Show
function toogleCourantBlocks(option) {
    option = parseInt(option);
    let blockAgios = document.getElementById("agiosBlock");
    // Toogle Options
    if (option === 1) {
        // hide
        blockAgios.style.display = "none";
        blockAgios.querySelector('input').disabled = true;

    } else if (option === 2) {
        // Show:
        blockAgios.style.display = "";
        blockAgios.querySelector('input').disabled = false;
    } else {
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
    if (option === 1) {
        // hide
        blockAccountFeeNumb.style.display = "none";
        blockAccountFeeNumb.querySelector('input').disabled = true;
        dateEchBlock.style.display = "none";
        dateEchBlock.querySelector('input').disabled = true;

    } else if (option === 2) {
        // Show:
        blockAccountFeeNumb.style.display = "";
        blockAccountFeeNumb.querySelector('input').disabled = false;
        dateEchBlock.style.display = "";
        dateEchBlock.querySelector('input').disabled = false;
    } else {
        alert("OPTION ERROR IN THE FUNCTION ToogleWB at Line 29 !\n\n REFRESH THE PAGE OR CONTACT ADMIN !!!");
        document.getElementById("creationClientForm").style.display = "none";
    }
}

// ENDING : [MANAGING REUSABLE FUNCTIONS]

// ==================================================================================
// --- ✅ VALIDATIONS ✅ ---
// ==================================================================================
theAccountForm.addEventListener("submit", function (orbit) {
    orbit.preventDefault();

    // console.log("submitted");
    // validateForm();
    if (validateForm()) {
        let warningSubmit = confirm("ATTENTION LE FORMULAIRE VA ETRE ENVOYER!");
        // FIXME : RETURN
        (warningSubmit) ? theAccountForm.submit() : null;
        return true;
    } else {
        return false;
    }
});


// FIXME
// PENDING
function validateForm() {
    // CLE RIB & SOLDE CONTROLS
    let comptesInfos = document.getElementById("infosCompte");
    let blockInfosComptes = comptesInfos.getElementsByTagName("input");
    // Controls If Everything is OK
    var isVide = false;
    // PARCOURS
    for (let i = 0; i < blockInfosComptes.length; i++) {
        if (blockInfosComptes[i].value.length <= 0) {
            blockInfosComptes[i].style.backgroundColor = "yellow";
            blockInfosComptes[i].placeholder = "VEUILLEZ REMPLIR CORRECTEMENT CE CHAMP";
            isVide = true;
        }
        
    }
    if (isClientChoosed === true) {
        isVide = false;
    }else{
        alert("VEUILLEZ CHOISIR UN CLIENT");
        isVide = true;
    }

    // CONTROL BLOCK BY BLOCK SELON LE TYPE DE COMPTE
    if ((typeAccountForm) && typeAccountForm === 1) {
        // FOR EPARGNE XEEWEUL SIMPLE
        let blockAccountFeeNumb = document.getElementById("accountFeeAndNumbBlock");
        let blockRemun = document.getElementById("remunBlock");
        let bAFNt1_inputs = blockAccountFeeNumb.getElementsByTagName("input");
        let bREM_inputs = blockRemun.getElementsByTagName("input");

         // PARCOURS INPUT by INPUT & CONTROL
         for (let i=0, j = 0; i < bAFNt1_inputs.length, j < bREM_inputs.length; i++, j++) {
            if (bAFNt1_inputs[i].value.length == 0) {
                bAFNt1_inputs[i].style.backgroundColor = "yellow";
                bAFNt1_inputs[i].placeholder = "VEUILLEZ REMPLIR CORRECTEMENT CE CHAMP";
                
                isVide = true;
            }
            if (bREM_inputs[j].value.length == 0) {
                bREM_inputs[j].style.backgroundColor = "yellow";
                bREM_inputs[i].placeholder = "VEUILLEZ REMPLIR CORRECTEMENT CE CHAMP";
                isVide = true;
            }

        }

    } else if ((typeAccountForm) && typeAccountForm === 2) {
        // FOR COURANT
        let blockAgios = document.getElementById("agiosBlock");
        let bAGIO_inputs = blockAgios.getElementsByTagName("input");

         // PARCOURS INPUT by INPUT & CONTROL
        for (let i = 0; i < bAGIO_inputs.length; i++) {
            if (bAGIO_inputs[i].value.length <= 0) {
                bAGIO_inputs[i].style.backgroundColor = "yellow";
                bAGIO_inputs[i].placeholder = "VEUILLEZ REMPLIR CORRECTEMENT CE CHAMP";
                isVide = true;
            }
            
        }

    } else if ((typeAccountForm) && typeAccountForm === 3) {
        // FOR BLOCKED
        let blockAccountFeeNumb = document.getElementById("accountFeeAndNumbBlock");
        let dateEchBlock = document.getElementById("dateEcheanceBlock");
        let bAFN_Inputs = blockAccountFeeNumb.getElementsByTagName("input");
        let bDE_Inputs = dateEchBlock.getElementsByTagName("input");

        // PARCOURS INPUT by INPUT & CONTROL
        for (let i=0, j = 0; i < bAFN_Inputs.length, j < bDE_Inputs.length; i++, j++) {
            if (bAFN_Inputs[i].value.length == 0) {
                bAFN_Inputs[i].style.backgroundColor = "yellow";
                bAFN_Inputs[i].placeholder = "VEUILLEZ REMPLIR CORRECTEMENT CE CHAMP";
                
                isVide = true;
            }
            if (bDE_Inputs[j].value.length == 0) {
                bDE_Inputs[j].style.backgroundColor = "yellow";
                bDE_Inputs[i].placeholder = "VEUILLEZ REMPLIR CORRECTEMENT CE CHAMP";
                isVide = true;
            }

        }
    } else {
        if(typeAccountForm === 0) {
            alert("Veuillez choisir un Type de Compte !");
            return false;
        } else {
            alert("THE FORM HAS BEEN OVERRIDED");
            alert("\n REFRESH THE PAGE OR CONTACT ADMIN !!!\n\nln 200 - addaccountform");
            document.getElementById("addAccountForm").style.display = "none";
            return false;
        }
    }

    if (isVide) {
        return false;
    }else{
        return true;
    }
}

// ==================================================================================
// --- 🗑🚮 TRASH 🚮🗑 ---
// ==================================================================================
// var formInputs = theAccountForm.getElementsByTagName("input");
// PARCOURIR LES INPUTS
// for (let i = 0; i < formInputs.length; i++) {
//     if (formInputs[i].value === ""){
//         formInputs[i].style.backgroundColor = "yellow";
//         alert("it's an empty textfield");
//     }
// }


// ==================================================================================
// --- 🔆 END 🔆 ---
// ==================================================================================
    // ENDING MAIN: ACCOUNT Script Timer 
var scriptEndTime = new Date();
scriptTimingMs = parseFloat(scriptEndTime.getTime() - scriptStartTime.getTime());
console.log("ADD ACCOUNT Script ENDED at : " + scriptEndTime.getHours() + "h : " + scriptEndTime.getMinutes() + "m : " + scriptEndTime.getSeconds() + "s");
console.log("Le script a mis " + scriptTimingMs / 1000 + " secondes.");
/* TODO :
- Implement matching RegEx
- Caal the matching typeFunction
*/
