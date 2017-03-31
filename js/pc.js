 var socket = io('http://localhost:3000/base');

 

 socket.on('connect', function(data) {
     console.log('Hello');
  });
