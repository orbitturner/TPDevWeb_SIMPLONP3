// =====================================================
//  ==> FIRST NODEJS WEB-APP
// =====================================================


// =====================================================
// A Variable for getting HTTP PROTOCOL REQUESTS
var http = require('http');
//File Reader Object
var fs = require('fs');
// URL QUERY GETTER
var queryString = require('querystring');
var url = require('url');
// DATABASE CONNECTION
var dbConnect = require('./DB');
// =====================================================


//Configuring a Server 
http.createServer(function (req, resp) {
    if (req.url == '/add') {
        resp.writeHead(200, { 'Content-Type': 'text/html' });
        resp.write("ADDING THINGS");
        resp.end();
    } else if (req.url == '/list') {
        resp.writeHead(200, { 'Content-Type': 'text/html' });
        resp.write("LIST OF THINGS");
        resp.end();
    }else if (req.url.startsWith('/login')) {
        query = url.parse(req.url).query;
        params = queryString.parse(query);

        resp.writeHead(200, {'Content-Type':'text/html'});
        // resp.write("YOUR EMAIL WAS:"+ ' ' + params["email"]);
        
        if (dbConnect.db.connect(function (err) {
            if (err) throw err;
            resp.write("WE ARE CONNECTED TO DB VIA MYSQL");
            resp.end();
        }));
        // console.log(params["id"]);
    } else {
        fs.readFile('./login.html', function(err,data){
            if(err) throw err;
                resp.writeHead(200, {'Content-Type':'text/html'});
                resp.write(data);
                resp.end();
            
        });
    } 
    
}).listen(8081);
