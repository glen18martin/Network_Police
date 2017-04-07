<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>PC</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/decor.css">

    <style>
#alerter {
    display: none;
    position:fixed;
    bottom: 0;
    width: 100%;
    z-index: 100;
    height: 50px;
    padding: 5px;
    font-weight: bold;
    background: black;
    left:0;
    color:red;

}
#alerter img {
          max-width: 32px;
        }
        </style>

</head>

<body>
<audio src="img/err.mp3" id="aud"></audio>
    <nav class="navbar navbar-inverse">
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
                    <li><a href="record.php">Record<span class="sr-only">(current)</span></a></li>
                    <li><a href="statistics.php">Statistics</a></li>
                    <li class="active"><a href="pc.php">PC</a></li>
                    <li><a href="alert.php">Alert</a></li>
                    <li><a href="block.php">Block</a></li>
                </ul>


            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>


    <div>

        
                <div class="container">
                    <div class="row">
                        <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h1 class="gallery-title">System Status</h1>
                        </div>

                        <div align="center">
                            <button class="btn btn-default filter-button active" data-filter="all">All</button>
                            <button class="btn btn-default filter-button" data-filter="ON">ON systems</button>
                            <button class="btn btn-default filter-button" data-filter="OFF">OFF systems</button>
                            <button class="btn btn-default filter-button" data-filter="spray">OoS</button>
                        </div>
                        <br/>

                        <div id="alerter">
                        ALERT!!!
                        </div>

                        <?php
						
						

                        $dump = file_get_contents("server/client.dump");
                        $obj = json_decode($dump, true);
                        //var_dump($obj);

                        for($i = 0; $i < count($obj); $i++) {
                            echo '<div class="gallery_product col-lg-2 col-md-2 col-sm-2 col-xs-4 filter ON">';
                            echo '<img src="img/on.png" class="img-responsive"><a style="color:white;font-weight:bold" href="record.php?id=' .$i. '">'. array_values($obj)[$i]["id"] . '</a>';
                            echo '</div>';
                        }
                        require 'config.php';
						
						$result = mysql_query("SELECT * FROM pc_usage where status = 1");
						
						       while($row = mysql_fetch_array($result)){
								   echo 
								   
								   "<div id=".$row['pc_id']." class='gallery_product col-lg-2 col-md-2 col-sm-2 col-xs-4 filter ON'>
									<img src='img/on.png' class='img-responsive'><a style='color:white;font-weight:bold' href='record.php?id='".$row['pc_id']."'>".$row['pc_id']."</a>
								</div>";
							   }
							   
							   
							   
						$result2 = mysql_query("SELECT * FROM pc_usage where status = 0");
						
						       while($row = mysql_fetch_array($result2)){
								   echo 
								   
								   "<div id=".$row['pc_id']." class='gallery_product col-lg-2 col-md-2 col-sm-2 col-xs-4 filter OFF'>
									<img src='img/off.png' class='img-responsive'><a style='color:white;font-weight:bold' href='record.php?id='".$row['pc_id']."'>".$row['pc_id']."</a>
								</div>";
							   }
							   
							   $result3 = mysql_query("SELECT * FROM pc_usage where status = -1");
						
						       while($row = mysql_fetch_array($result3)){
								   echo 
								   
								   "<div id=".$row['pc_id']." class='gallery_product col-lg-2 col-md-2 col-sm-2 col-xs-4 filter spray'>
									<img src='img/er.png' class='img-responsive'><a style='color:white;font-weight:bold' href='record.php?id='".$row['pc_id']."'>".$row['pc_id']."</a>
								</div>";
							   }
							   
							   
                        ?>

                        <!-- 
                        <div class="gallery_product col-lg-2 col-md-2 col-sm-2 col-xs-4 filter OFF">
                            <img src="img/off.png" class="img-responsive">
                        </div>

                        <div class="gallery_product col-lg-2 col-md-2 col-sm-2 col-xs-4 filter ON">
                            <img src="img/on.png" class="img-responsive">
                        </div>

                        <div class="gallery_product col-lg-2 col-md-2 col-sm-2 col-xs-4 filter irrigation">
                            <img src="img/on.png" class="img-responsive">
                        </div>

                        <div class="gallery_product col-lg-2 col-md-2 col-sm-2 col-xs-4 filter spray">
                            <img src="img/er.png" class="img-responsive">
                        </div>

                        <div class="gallery_product col-lg-2 col-md-2 col-sm-2 col-xs-4 filter irrigation">
                            <img src="img/on.png" class="img-responsive">
                        </div>

                        <div class="gallery_product col-lg-2 col-md-2 col-sm-2 col-xs-4 filter spray">
                            <img src="img/er.png" class="img-responsive">
                        </div>

                        <div class="gallery_product col-lg-2 col-md-2 col-sm-2 col-xs-4 filter irrigation">
                            <img src="img/on.png" class="img-responsive">
                        </div>

                        <div class="gallery_product col-lg-2 col-md-2 col-sm-2 col-xs-4 filter irrigation">
                            <img src="img/on.png" class="img-responsive">
                        </div>

                        <div class="gallery_product col-lg-2 col-md-2 col-sm-2 col-xs-4 filter ON">
                            <img src="img/on.png" class="img-responsive">
                        </div>

                        <div class="gallery_product col-lg-2 col-md-2 col-sm-2 col-xs-4 filter spray">
                            <img src="img/er.png" class="img-responsive">
                        </div>

                        <div class="gallery_product col-lg-2 col-md-2 col-sm-2 col-xs-4 filter OFF">
                            <img src="img/off.png" class="img-responsive">
                        </div>
                        -->
                    </div>
                </div>

           
            </section>

        

    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://localhost:3000/socket.io/socket.io.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
	<script src="js/pc.js"></script>
    
    <script src="js/monitor.js"></script>
    <script>
        require('./js/renderer.js')
    </script>

</body>

</html>
