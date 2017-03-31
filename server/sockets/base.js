module.exports = function (io) {

  var base = io.of('/base');


  base.on('connection', function (socket) {

    console.log("client connected");
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

  socket.on(get:systemstatus,function(){
    socket.emit('on:sytemstatus',{id:{1,2,3,4}});
  });


      socket.on('disconnect', function(){
      console.log("client disconnected");
});

});

};
