<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Customer Center</title>
    <style>
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

    .nav-link {
        width: 100%;
        text-decoration: none;
        color: black;
    }

    .custom-nav {
        width: 250px;
    }

    .active {
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
                                <a href="#" class="nav-link py-2 px-4  text-black"
                                    onclick="loadContent('job-order', this)">Job Order</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link py-2 px-4  text-black"
                                    onclick="loadContent('estimate', this)">Estimate</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link py-2 px-4  text-black"
                                    onclick="loadContent('proforma-invoice', this)">Proforma Invoice</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link py-2 px-4  text-black"
                                    onclick="loadContent('invoice', this)">Invoice</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link py-2 px-4  text-black"
                                    onclick="loadContent('cash-invoice', this)">Cash Invoice</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link py-2 px-4  text-black"
                                    onclick="loadContent('svat-invoice', this)">SVAT Invoice</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link py-2 px-4  text-black"
                                    onclick="loadContent('sales-return', this)">Sales Return</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link py-2 px-4  text-black"
                                    onclick="loadContent('svat-return', this)">SVAT Return</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link py-2 px-4  text-black"
                                    onclick="loadContent('dispatch-note', this)">Dispatch Note</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link py-2 px-4  text-black"
                                    onclick="loadContent('customer-pay', this)">Customer Pay</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>

            <!-- Third Card: Main Content -->
            <div class="col-md-8 col-lg-10 d-flex flex-column">
                <div class="card p-4 flex-grow-1">
                    <div id="main-content">
                        <div class="input-group text-right" style="max-width: 300px;">
                            <input type="text" class="form-control" placeholder="Search" aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button">Search</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
    function loadContent(section, element) {
        const content = {
            'job-order': '<h2>Job Order</h2><p>This is the Job Order section.</p>',
            'estimate': '<h2>Estimate</h2><p>This is the Estimate section.</p>',
            'proforma-invoice': '<h2>Proforma Invoice</h2><p>This is the Proforma Invoice section.</p>',
            'invoice': '<h2>Invoice</h2><p>This is the Invoice section.</p>',
            'cash-invoice': '<h2>Cash Invoice</h2><p>This is the Cash Invoice section.</p>',
            'svat-invoice': '<h2>SVAT Invoice</h2><p>This is the SVAT Invoice section.</p>',
            'sales-return': '<h2>Sales Return</h2><p>This is the Sales Return section.</p>',
            'svat-return': '<h2>SVAT Return</h2><p>This is the SVAT Return section.</p>',
            'dispatch-note': '<h2>Dispatch Note</h2><p>This is the Dispatch Note section.</p>',
            'customer-pay': '<h2>Customer Pay</h2><p>This is the Customer Pay section.</p>'
        };

        // Update main content
        document.getElementById('main-content').innerHTML = content[section] || '<p>Section not found.</p>';

        // Remove active class from all nav links
        const links = document.querySelectorAll('.nav-link');
        links.forEach(link => link.classList.remove('active'));

        // Add active class to the clicked nav link
        element.classList.add('active');
    }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>