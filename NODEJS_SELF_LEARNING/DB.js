// =====================================================
//  ==> FIRST NODEJS WEB-APP | DB CONNECTOR
// =====================================================


// =====================================================
var mysql = require('mysql');
// =====================================================

// STARTING AN CONNECTION WITH THE DB
var con = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "@webmaster1",
    database: "node_first_db"
});

exports.db = con;