<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <title>Customer Center</title>
    <style>
    thead {
        background-color: #1a91c4;
        color: white;
    }

    .card {
        border: 1px solid #e0e0e0;
        background-color: whitesmoke;
    }

    .h-100vh {
        height: 100vh;
    }

    .nav-link {
        width: 100%;
        text-decoration: none;
        color: black;
    }

    .nav-link:hover {
        color: black;
        background-color: #aeaeae;
    }

    .custom-nav {
        width: 250px;
    }

    .active {
        background-color: #1a91c4;
        color: white !important;
    }

    .active:hover {
        background-color: #1a91c4;
        color: white !important;
    }
    </style>
</head>

<body class="bg-light">

    <div class="container-fluid h-100vh d-flex flex-column">
        <div class="card p-2 mb-2">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="h3 ml-2">Customer Center</h1>
                </div>
                <div>
                    <button class="btn btn-success mr-1">New Customer</button>
                    <button class="btn btn-success mr-1">New Transaction</button>
                    <button class="btn btn-success">Customer Reports</button>
                </div>
            </div>
        </div>

        <div class="row flex-grow-1">
            <!-- Second Card: Sidebar -->
            <div class="col-md-4 col-lg-2 custom-nav">
                <div class="card h-100">
                    <nav>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link py-2 px-4 text-black active">Job Order</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link py-2 px-4 text-black">Estimate</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link py-2 px-4 text-black">Proforma Invoice</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link py-2 px-4 text-black">Invoice</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link py-2 px-4 text-black">Cash Invoice</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link py-2 px-4 text-black">SVAT Invoice</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link py-2 px-4 text-black">Sales Return</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link py-2 px-4 text-black">SVAT Return</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link py-2 px-4 text-black">Dispatch Note</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link py-2 px-4 text-black">Customer Pay</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>

            <!-- Third Card: Main Content -->
            <div class="col-md-8 col-lg-10 d-flex flex-column">
                <div class="card p-4 flex-grow-1">
                    <div id="main-content">
                        <table id="data-table" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Column 1</th>
                                    <th>Column 2</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Row 1 Data 1</td>
                                    <td>Row 1 Data 2</td>
                                </tr>
                                <tr>
                                    <td>Row 2 Data 1</td>
                                    <td>Row 2 Data 2</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
    $(document).ready(function() {

        $('.nav-link').on('click', function() {
            $('.nav-link').removeClass('active');
            $(this).addClass('active');
        });


        $('#data-table').DataTable({
            "responsive": true,
            "autoWidth": false
        });
    });
    </script>

</body>

</html>