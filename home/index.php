<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link  rel="stylesheet" href="/resumeapp/lib/bootstrap/css/bootstrap.min.css" />
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <title>Resume Builder | Home</title>
</head>
<body class="bg-light" >
    <?php 
        if(!isset($_COOKIE["user"]) or $_COOKIE["user"] != "token") {
            header("Location: /resumeapp/login");
            exit;
        }
    ?>
    <nav class="navbar navbar-light bg-primary">
        <span class="navbar-brand mb-0 h1 text-white">
            Resume Builder
        </span>
    </nav>
    <div class="container" style="background-color: #efefff;padding-top: 15px;min-height: 90vh">

        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">
                    Personal info
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">
                    Education
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">
                    Projects
                </a>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    heyyyyy
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                helloooooooooooooooo
            </div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                waddadfasdf
            </div>
        </div>
    </div>


</body>
<script src="/resumeapp/lib/js/jquery-3.4.1.min.js"></script>
<script src="/resumeapp/lib/js/popper.min.js"></script>
<script src="/resumeapp/lib/bootstrap/js/bootstrap.min.js"></script>

</html>