var io = require('socket.io')(1337);


var fs = require('fs');


var clientList = {}

io.on('connection', function(socket) {


    //For the Panel

    socket.on('get_client_data', function(data) {
        socket.emit(clientList);
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
    }, 60000);
    
    
    
    socket.on('ident', function(data) {
        console.log("Online " + data);
        clientList[socket] = { id: data, du: 0, mu: 0, nu: 0, cu:0, pr:0 };
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
