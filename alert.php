<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Alert</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="css/decor.css">
	 <link rel="stylesheet" type="text/css" href="css/alert.css">


  </head>
  <body>

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
        <li><a href="statistics.php">Statistics</a></li>
        <li><a href="pc.php">PC</a></li>
        <li class="active"><a href="alert.php">Alert</a></li>
        <li><a href="block.php">Block</a></li>
      </ul>


    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container">
    <div class="row">
        <h2>
            Alerts</h2>
        <div class="col-md-12">
		<?php 
		
		require('config.php');
			
			

			$sql = "SELECT * FROM alerts";

			if($result = mysql_query($sql)){

			while($row = mysql_fetch_array($result)){
				$a_class = "alert ".$row['a_color']." alert-dismissable";
				echo "<div class='".$a_class."'><span class='glyphicon glyphicon-signal'></span>";
                echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
                    ×</button><strong>".$row['a_type']."</strong> <a href='http://www.jquery2dotnet.com'
                        target='_blank'></a>".$row['a_message']."</div>";
			}
			}
		
		?>
		
		<!--
            <div class="alert alert-purple alert-dismissable">
                <span class="glyphicon glyphicon-signal"></span>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    ×</button><strong>Warning!</strong> <a href="http://www.jquery2dotnet.com"
                        target="_blank">PC 10-10 </a>has 90% CPU Usage</div>
            <div class="alert alert-info-alt alert-dismissable">
                <span class="glyphicon glyphicon-certificate"></span>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    ×</button><strong>Warning!</strong>  <a href="http://www.jquery2dotnet.com"
                        target="_blank">PC 10-60 </a> is using a blocked application - VLC Media Player</div>
            <div class="alert alert-danger-alt alert-dismissable">
                <span class="glyphicon glyphicon-certificate"></span>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    ×</button><strong>Alert!</strong><a href="http://www.jquery2dotnet.com"
                        target="_blank"> 2 systems </a> are currently in upstate</div>
            <div class="alert alert-warning-alt alert-dismissable">
                <span class="glyphicon glyphicon-certificate"></span>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    ×</button><strong>Alert!</strong> <a href="http://www.jquery2dotnet.com"
                        target="_blank"> 2 systems</a> are out of service</div>
            <div class="alert alert-success-alt alert-dismissable">
                <span class="glyphicon glyphicon-certificate"></span>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    ×</button><strong>Alert!</strong><a href="http://www.jquery2dotnet.com"
                        target="_blank"> 2 systems</a> are in downstate</div>
        -->
		</div>
    </div>
</div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        require('./js/renderer.js')
    </script>

  </body>
</html>
