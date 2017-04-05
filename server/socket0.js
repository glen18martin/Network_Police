var io = require('socket.io')(1337);

var clientList = []

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
        //console.log(clientList[socket]);
    }, 10000);
    
    
    
    socket.on('ident', function(data) {
        console.log("Online " + data);
        clientList[socket] = { id: data, du: 0, mu: 0, nu: 0 };
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


});
