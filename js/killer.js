
$(document).ready(function() {
    
    $(".killer").on("click", function() { 
        
        var pid2kill = $(this).attr('data-pid');
        alert("Killing Process " + pid2kill);
        var socket = io("http://localhost:1337");
        socket.emit('kill_process', {id: pcid, pid: pid2kill});
        //socket.disconnect();

    });
  
    
 });