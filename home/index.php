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
                <a 
                id="pill-personal"
                class="nav-link active" data-toggle="tab" href="#tab-personal">
                    Personal info
                </a>
            </li>
            <li class="nav-item">
                <a 
                id="pill-education"
                class="nav-link" data-toggle="tab" href="#tab-education">
                    Education
                </a>
            </li>
            <li class="nav-item" >
                <a 
                id="pill-projects"
                class="nav-link" data-toggle="tab" href="#tab-projects">
                    Projects
                </a>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active row" id="tab-personal" >
                <?php include("./peronalinfo.html"); ?>
            </div>
            <div class="tab-pane fade" id="tab-education">
                <div class="row">
                    <div class="col-sm-12">
                        <button class="btn btn-primary" id="add-new-education">Add new</button>
                    </div>
                </div>
                <br />
                <form id="form-education" class="row container">
                </form>
                <br />
                <button id="education-next" class="btn btn-primary">Next</button>
            </div>
            <div class="tab-pane fade" id="tab-projects">
                waddadfasdf
            </div>
        </div>
    </div>


</body>
<script src="/resumeapp/lib/js/jquery-3.4.1.min.js"></script>
<script src="/resumeapp/lib/js/popper.min.js"></script>
<script src="/resumeapp/lib/bootstrap/js/bootstrap.min.js"></script>
<script src="./index.js"></script>

</html>