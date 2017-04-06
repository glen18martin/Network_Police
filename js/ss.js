
$(document).ready(function() {
    
    $(".screenshot").on("click", function() { 
        
        var pid = $(this).attr('data-pcid');
        alert("Capturing Screenshot " + pcid);
        var socket = io("http://localhost:1337");
        socket.emit('capture_screenshot', {id: pcid});
        //socket.disconnect();

    });
  
    
 });