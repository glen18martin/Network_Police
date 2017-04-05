<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Network Police</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>

<body>
    <h1>Hello World!</h1>
    <!-- All of the Node.js APIs are available in this renderer process. -->
    <div class="login">
        <form id="login" action="http://localhost:81/Network_Police/login.php" method="post">
            <input type="text" name="u" placeholder="Username" required="required" />
            <input type="password" name="p" placeholder="Password" required="required" />
            <button type="submit" class="btn btn-primary btn-block btn-large">Let me in.</button>
        </form>
    </div>

    <a id="close" href="javascript:window.close()">Close this Window</a>

</body>

<script>
    // You can also require other files to run in this process
    require('./js/renderer.js')
</script>

</html>