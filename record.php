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
          background: grey;
          padding: 5px;
          width: 100%;
          display: block;
          color: black;
          
          margin-bottom: 10px;
          
        }
        .blockhead img {
          max-width: 32px;
        }
        .blockbody {
         color: white;
        }

      </style>
      <script> setTimeout(function() { window.location.reload(true); }, 5000); </script>
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
        <li class="active"><a href="record.php">Record<span class="sr-only">(current)</span></a></li>
        <li><a href="statistics.php">Statistics</a></li>
        <li><a href="pc.php">PC</a></li>
        <li><a href="alert.php">Alert</a></li>
        <li><a href="block.php">Block</a></li>
      </ul>


    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<div>

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
                          <span class="blockhead"><img src="img/cpu.png"/>CPU Usage</span>
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
                          <span class="blockhead"><img src="img/hdd.png"/>Disk Usage</span>
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
                          <span class="blockhead"><img src="img/ram.png"/>Memory Usage</span>
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
                          <span class="blockhead"><img src="img/net.png"/>Network Usage</span>
                          <span class="blockbody">
                          <?php 
                          echo "Bytes Sent: " . array_values($obj)[$id]["nu"]["sent"] . " Bytes";
                          echo "<br/>";
                          echo "Bytes received: " . array_values($obj)[$id]["nu"]["received"] . " Bytes";
                          
                          $per0 = array_values($obj)[$id]["nu"]["sent"] / 10000000000; 
                          $per1 = array_values($obj)[$id]["nu"]["received"] / 10000000000; 
                          ?>
                          </span>

                          <div class="progress">
                            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo array_values($obj)[$id]["nu"]["sent"] ?>"
                            aria-valuemin="0" aria-valuemax="10000000000" style="width:<?php echo $per0; ?>%">
                            </div>
                          </div>
                          <div class="progress">
                            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo array_values($obj)[$id]["nu"]["received"] ?>"
                            aria-valuemin="0" aria-valuemax="10000000000" style="width:<?php echo $per1; ?>%">
                            </div>
                          </div>
                        </div>


                        <br/><br/><br/>
                        <div class="block">
                          <span class="blockhead"><img src="img/ram.png"/>Running Processes</span>
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
    <script>var pcid = <?php echo $_GET['id']; ?>;</script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.7.3/socket.io.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/killer.js"></script>
    <script>
        require('./js/renderer.js')
    </script>

  </body>
</html>
