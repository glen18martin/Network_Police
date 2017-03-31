 var socket = io('http://localhost:3000/base');



 socket.on('connect', function(data) {
     console.log('Server connected');
  });

  socket.emit('get:systemstatus');

  socket.on('on:systemstatus',function(data){
    console.log(data);

  });
