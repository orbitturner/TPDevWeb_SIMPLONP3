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
|service       :   S  Website                               |
|FrameWorks      : NONE                                               |
|Author          : OrbitTurner                                        |
|Official Name   : Mohamed GUEYE                                      |
|Version         : v.0.Null                                           |
|Created         : 14-Jun-2020                                        |
|Last update     : 18-Jun-2020                                        |
|Partie          : ADD CLIENT JS                                      | 
|LANGAGE UTILISE : ANGLAIS - FRANCAIS                                 |
+=====================================================================+
*/
// ==================================================================================
// --- 🔆 GLOBALS 🔆 ---
// ==================================================================================
// STARTING MAIN: CLIENT Script Timer
var scriptStartTime = new Date();
console.log("ADD CLIENT Script Started at : " + scriptStartTime.getHours() + "h : "+scriptStartTime.getMinutes() + "m : " + scriptStartTime.getSeconds() + "s");
var formOk = false;
var theClientForm = document.getElementById("addClientForm");
var typeClientForm = 0;


// STARTING : [INIT FUNCTIONS]
// ==================================================================================
// ---💠 SETUP OF THE FORM 💠 ---
// ==================================================================================
// TRIGGER THE FORM SETUP WHEN THE PAGE IS FULLY LOADED
document.addEventListener("DOMContentLoaded", function() {
    initFormClientSetup();
    var infoPreviousInsert = document.getElementById("breadcrumbInfo");
    if (typeof infoPreviousInsert !== 'undefined') {
    setTimeout(function () {
        // $('.custom-select-sm').val(10).change();
        infoPreviousInsert.style.color = "#29c2d6";
        infoPreviousInsert.innerText = ">>> Creation Client ";
    }, 3500);
}
});
// FIXME
// PENDING
function initFormClientSetup() {
    // test
    // console.log("THE FORM IS LOADED SUCCESSFULLY");
    // Hiding Blocks
    toogleWorkBlocks(1);
    toogleAddEmpBlocks(2);
    formOk = true; 
}
// ENDING : INIT FUNCTIONS


// STARTING [GESTION DES DIFFERENT BOUTON DU FORMULAIRE]
// ==================================================================================
// --- ⏺ ADD EMPLOYEUR BTN ⏺ ---
// ==================================================================================
// PENDING
var addNewEmpBtn = document.getElementById("addEmpBtn");
addNewEmpBtn.onclick = function () {
    // Test
        // alert("Hello Foreigner!!!");
        // alert(this.classList);
    toogleAddEmpBlocks(1, this);
}
// STARTING [GESTION DES TYPES DE COMPTES]
// ==================================================================================
// --- 🔽 SELECT OPTIONS 🔽 ---
// ==================================================================================



// ==================================================================================
// --- 🔘 RADIO BUTTONS 🔘 ---
// ==================================================================================
// DONE 
// FIXME
// STATUT PRO CHOOSER
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
        toogleAddEmpBlocks(2);
        console.log("changed");

    });
}

// FORM CHOOSER
var formChooserRadios = document.getElementsByName("formChooser");
var oldVal = null;
for (var i = 0; i < formChooserRadios.length; i++) {
    formChooserRadios[i].addEventListener('change', function() {
        // Refresh If It was Moral
        (oldVal) && oldVal.value == "moral" ? reloadFormChooser() : null;
        // BUG IN EVENTS NOT COMMING
        // this.value === "physique" ? loadClientPhysiqueForm() : loadClientMoralForm();
        this.value === "physique" ? reloadFormChooser() : loadClientMoralForm();
    });
}
// ENDING : [BUTTON FUNCTIONS MANAGING]


// STARTING : [MANAGING REUSABLE FUNCTIONS]
// ==================================================================================
// --- 🧱 BRIQUE-FUNCS 🧱 ---
// ==================================================================================
function reloadFormChooser() {
    location.reload(false);
    // window.location.href = window.location.href;
}
// DONE
// SHOWS OR HIDE WORK BLOCKS
function toogleWorkBlocks(option) {
    option = parseInt(option);
    let blockInfosPro = document.getElementById("infoPro");
    let blockInfosEmp = document.getElementById("infoEmployeur");
    // Toogle Options
    if(option === 1) {
        // var statutPro = document.getElementById("statutPro");
    
        // Defining the Style
        blockInfosPro.style.display = "none";
        blockInfosEmp.style.display = "none";
    
    }else if (option === 2) {
        // Show:
        blockInfosEmp.style.display = "";
        blockInfosPro.style.display = "";
    }else{
        alert("OPTION ERROR IN THE FUNCTION ToogleWB at Line 29 !\n\n REFRESH THE PAGE OR CONTACT ADMIN !!!");
        document.getElementById("creationClientForm").style.display = "none";
    }
}

// SHOWS OR HIDES CREATE EMPLOYEUR BLOCK
function toogleAddEmpBlocks(option, objet=null) {
    // Recuperation
    option = parseInt(option);
    let blockCreerEmp = document.getElementById("creerEmployeur"); 

    // Toogle Switcher
     if(option === 1) {
            if (blockCreerEmp.style.display != "none") {
                blockCreerEmp.style.display = "none";
                if (objet) {
                    objet.classList.remove("optionIcon-onUse");
                    objet.classList.remove("fa-times");
                    objet.classList.add("fa-plus-circle");
                }
            }else{
                blockCreerEmp.style.display = "";
                if (objet) {
                    objet.classList.remove("fa-plus-circle");
                    objet.classList.add("fa-times");
                    objet.classList.add("optionIcon-onUse");
                }
            }
     } else {
        blockCreerEmp.style.display = "none";
     }
}


// LOAD CLIENT PHYSIQUE FORM
// FIXME : obj.innerHTML does not includes event listeners
/*function loadClientPhysiqueForm() {
    //Recuperation
    var formPlace = document.getElementById("clientForm");

    // GET THE CLIENT FORM
    var xhr = new XMLHttpRequest();

    xhr.onload = function () {
        formPlace.innerHTML = this.response;
    };

    xhr.open('GET', './src/view/client/addPhysique.html', true);
    xhr.send();
}*/

function loadClientMoralForm() {
    //Recuperation
    var formPlace = document.getElementById("clientForm");

    // GET THE CLIENT FORM
    var xhr = new XMLHttpRequest();

    xhr.onload = function () {
        formPlace.innerHTML = this.response;
    };

    xhr.open('GET', './src/view/client/addMoral.html', true);
    xhr.send();
}

// STARTING : [FORM VALIDATION]
// ==================================================================================
// --- ✅ VALIDATIONS ✅ ---
// ==================================================================================
// ON SUBMIT OFF THE FORM
theClientForm.addEventListener("submit", function(orbit) {
    orbit.preventDefault();

    if (validateForm()) {
        alert("YOUPIIIII");
        theClientForm.submit();
        return true;
    } else {
        return false;
    }
    
});

function validateForm() {
    // let formInputs = theClientForm.getElementsByTagName("input");
    // formInputs.forEach(element => {
    //     console.log(element);
    // });
    return true;
}
// ENDING : [MANAGING REUSABLE FUNCTIONS]
// ==================================================================================
// --- 🔆 END 🔆 ---
// ==================================================================================
// ENDING MAIN: ACCOUNT_CLIENT Script Timer 
var scriptEndTime = new Date();
scriptTimingMs = parseFloat(scriptEndTime.getTime() - scriptStartTime.getTime());
console.log("ADD CLIENT Script ENDED at : " + scriptEndTime.getHours() + "h : "+scriptEndTime.getMinutes() + "m : " + scriptEndTime.getSeconds() + "s");
console.log("Le script a mis " + scriptTimingMs/1000 + " secondes.");
