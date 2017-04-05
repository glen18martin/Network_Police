var io = require('socket.io')(1337);


var fs = require('fs');


var clientList = {}
//I'm using incremental id's on the js side for socket counting, seding that same value to kill processes here... a problemo!
//Change some value to null in the clientList array, dont remove any clients in the middle when clients disconnect


io.on('connection', function(socket) {


    //For the Panel

    socket.on('get_client_data', function(data) {
        socket.emit(clientList);
    });

    socket.on('kill_process', function(data) {
        console.log("killing process " + data);

        var i = 0;
        for (var client in clientList) {
            if(i++ == data.id) {
                theSocketWeNeed = clientList[client].s.emit("client_kill_process", data.pid);
            }
        }


        //clientList[data].
        socket.disconnect();
    });




    //Clients
    setInterval(function() {
        socket.emit('get_disk_usage');
        socket.emit('get_memory_usage');
        
        socket.emit('get_network_usage');
        socket.emit('get_cpu_usage');
        //console.log(JSON.stringify(clientList));

        fs.writeFile("client.dump", JSON.stringify(clientList), function(err) {
            console.log("writing to file...");
            if(err) {
                return console.log(err);
            }
            
        }); 

    },2000);

    setInterval(function() { 
        socket.emit('get_memory_proc');
    }, 30000);
    
    
    
    socket.on('ident', function(data) {
        console.log("Online " + data);
        clientList[socket] = { id: data, du: 0, mu: 0, nu: 0, cu:0, pr:0, s: socket};
    });


    socket.on('disk_usage_response', function(data) {
        clientList[socket].du = data;
    });
    socket.on('memory_usage_response', function(data) {
        clientList[socket].mu = data;
    });
    socket.on('network_usage_response', function(data) {
        clientList[socket].nu = data;
        
    });
    socket.on('cpu_usage_response', function(data) {
        clientList[socket].cu = data;
    });

    socket.on('memory_proc_response', function(data) {
        clientList[socket].pr = data;
    });


});
