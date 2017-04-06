
$(document).ready(function() {
    
    $(".killer").on("click", function() { 
        
        var pid2kill = $(this).attr('data-pid');
        alert("Killing Process " + pid2kill + " on " + pcname);
        var socket = io("http://localhost:1337");
        socket.emit('kill_process', {id: pcid, pid: pid2kill, pcusername: pcname});
        //socket.disconnect();

    });

    $("#spawner").on("keydown", function(event) { 
        
        if(event.which == 13) {
            var process = $(this).val();
            $(this).val("");
            var socket = io("http://localhost:1337");
            socket.emit('spawn_process', {id: pcid, pid: process, pcusername: pcname});
        }
        

    });
  
    $("#messagesender").on("keydown", function(event) { 
        
        if(event.which == 13) {
            var msg = $(this).val();
            $(this).val("");
            var socket = io("http://localhost:1337");
            socket.emit('show_alert_to_user', {id: pcid, message: msg, pcusername: pcname});
        }
        

    });
  
    
 });