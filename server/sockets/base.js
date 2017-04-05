module.exports = function (io) {

  var base = io.of('/base');


  base.on('connection', function (socket) {

    console.log("socket.io client connected");
    setTimeout(function() { socket.emit('get_system_status', 0); }, 2000);

/*
    var cookie_string = socket.request.headers.cookie;
    var req = { headers : {cookie : cookie_string} };
    session({ cookieName:'sess',
    secret: '134klh389dbcbsldvn1mcbj',
    duration: 30 * 60 * 1000,
    activeDuration: 5 * 60 * 1000,
    httpOnly: true,
//secure: true,
*/

  /*
  socket.on('get:systemstatus',function(){
    console.log("asdasd");
    socket.emit('on:systemstatus',{id:[1,2,3,4]});
  });
  */

  socket.on('system_status_response',function(data){
    console.log(data);
  });

  socket.on('hello',function(data){
    console.log("hello: " + data);
  });

      socket.on('disconnect', function(){
      console.log("client disconnected");
});

});

};
