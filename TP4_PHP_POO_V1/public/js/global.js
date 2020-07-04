/*
+======================={PROJECT - PRESENTATION}======================+
|                                                                     |
|Project Name    : TP DEVWEB 2 NEW SIMPLON                            |
|service         : Semi-Static  Website                               |
|FrameWorks      : NONE                                               |
|Author          : OrbitTurner                                        |
|Official Name   : Mohamed GUEYE                                      |
|Version         : v.0.Null                                           |
|Created         : 24-Jun-2020                                        |
|Last update     : 25-Jun-2020                                        |
|Partie          : MAIN JS                                            | 
|LANGAGE UTILISE : ANGLAIS - FRANCAIS                                 |
+=====================================================================+
*/
// ==================================================================================
// --- 🔆 GLOBALS 🔆 ---
// ==================================================================================
// STARTING MAIN: ACCOUNT Script Timer
var scriptStartTime = new Date();
console.log("GLOBAL Script Started at : " + scriptStartTime.getHours() + "h : "+scriptStartTime.getMinutes() + "m : " + scriptStartTime.getSeconds() + "s");
var formOk = false;




// ==================================================================================
// --- 🔆 END 🔆 ---
// ==================================================================================
// ENDING MAIN: ACCOUNT Script Timer 
var scriptEndTime = new Date();
scriptTimingMs = parseFloat(scriptEndTime.getTime() - scriptStartTime.getTime());
console.log("GLOBAL Script ENDED at : " + scriptEndTime.getHours() + "h : "+scriptEndTime.getMinutes() + "m : " + scriptEndTime.getSeconds() + "s");
console.log("Le script a mis " + scriptTimingMs/1000 + " secondes.");