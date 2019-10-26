<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link  rel="stylesheet" href="/resumeapp/lib/bootstrap/css/bootstrap.min.css" />
    <title>Resume Builder | Home</title>
</head>
<body>
    <?php 
        if(isset($_COOKIE["user"]) && $_COOKIE["user"] == "token")
            echo "<h2>home</h2>";
        else {
            header("Location: /resumeapp/login");
            exit;
        }
    ?>
</body>
</html>