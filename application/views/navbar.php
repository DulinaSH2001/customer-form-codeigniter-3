<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Side Navigation Bar</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
    .sidebar {
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        padding-top: 20px;
    }

    .nav-link {
        color: #333;
    }

    .nav-link:hover {
        color: #007bff;
    }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#home">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#submenu1" role="button"
                                aria-expanded="false" aria-controls="submenu1">
                                Menu 1
                            </a>
                            <div class="collapse" id="submenu1">
                                <ul class="nav flex-column ml-3">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#subitem1">Sub Item 1</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#subitem2">Sub Item 2</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#submenu2" role="button"
                                aria-expanded="false" aria-controls="submenu2">
                                Menu 2
                            </a>
                            <div class="collapse" id="submenu2">
                                <ul class="nav flex-column ml-3">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#subitem3">Sub Item 3</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#subitem4">Sub Item 4</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">
                                About
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                </div>
                <div id="content">
                    <!-- Content goes here -->
                </div>
            </main>
        </div>
    </div>
</body>

</html>