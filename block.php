
<?php
require('config.php');

if( isset($_POST["app_name"]) && isset($_POST["hash"]))
{
	
	$app_name = $_POST["app_name"];
	$hash = $_POST["hash"];
	$result = mysql_query("INSERT INTO app_hash (application, hash, timestamp)
	VALUES ('$app_name', '$hash', date('Y/m/d'))");
	
	if($result){
		    echo "Records inserted successfully.";		
	}
	exit();
}


if( isset($_POST["action"])=='delete' && isset($_POST["app_name"]))
{
	
	
	$app_name = $_POST["app_name"];
	$result = mysql_query("DELETE FROM app_hash WHERE application = '$app_name'");
	
	if($result){
	echo $app_name;	    
	}
	
	exit();
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Block</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="css/decor.css">


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
        <li><a href="record.php">Record<span class="sr-only">(current)</span></a></li>
        <li><a href="statistics.php">Statistics</a></li>
        <li><a href="pc.php">PC</a></li>
        <li><a href="alert.php">Alert</a></li>
        <li class="active"><a href="block.php">Block</a></li>
      </ul>


    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<div class="container">

    <div class="row">
       
	   <form>
        <div class="col-md-4"><input class="form-control" type="text" id="name" placeholder="Application Name"></div>
        <div class="col-md-4"><input class="form-control" type="text" id="email" placeholder="Hash Value"></div>
    	<input type="button" class="add-row btn btn-primary" value="Block">
    </form>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Select</th>
                <th>Application Name</th>
                <th>Hash</th>
            </tr>
        </thead>
        <tbody>
		<?php
				$sql = "SELECT * FROM app_hash";

			if($result = mysql_query($sql)){

			while($row = mysql_fetch_array($result)){
				echo "<tr>";
                echo "<td><input data-id='".$row['application']."' type='checkbox' name='record'></td>";
                echo "<td>".$row['application']."</td>";
                echo "<td>".$row['hash']."</td>";
				echo "</tr>";
			}
			}
		?>
            
        </tbody>
    </table>
    <button type="button" class="delete-row btn btn-danger">Unblock</button>
	
    </div>

</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/block.js"></script>
    <script>
        require('./js/renderer.js')
    </script>

  </body>
</html>
