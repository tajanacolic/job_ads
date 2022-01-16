<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@200;300;400;500;700&display=swap" rel="stylesheet">

    <link href="/app.css" rel="stylesheet"/>

    <title>Job Ads</title>
</head>
<body>

    <div class="header">
    </div>

    <div id="col-1">

        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="menu" href="/jobs/create">Create new job ad</a>
            </li>
            <li class="nav-item">
                <a class="menu" href="/jobs">Job ads</a>
            </li>
            <li class="nav-item">
                <a class="menu" href="/jobs/applications">Job applications</a>
            </li>
            <li class="nav-item">
                <a class="menu" href="/jobs/signin">Sign out</a>
            </li>
        </ul>

    </div>

    <div class="body" id="col-2">

        <?php echo $content ?>

    </div>

</body>
</html>
