<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <style>
    body {
        background-color: #ffffff;
        color: #0a0a0a;
    }

    .card {
        background-color: #ffffff;
        color: #0a0a0a;
    }
    </style>
</head>

<body>
    <div class="container d-flex align-items-center justify-content-center">
        <div class="card p-4  w-500">
            <div class="text-center mb-4">
                <img src="https://upload.wikimedia.org/wikipedia/commons/3/34/Microsoft_Office_Excel_%282019%E2%80%93present%29.svg"
                    alt="Excel logo" class="rounded-circle border border-dark" style="height: 100px; width: 100px" />
            </div>
            <h2 class="text-center mb-4">Upload Excel File</h2>
            <p class="text-muted mb-4 text-center">
                An import file can be any data file that you create and then save in
                Microsoft Excel (.xls or .xlsx) format. For each list that can be
                imported, there are requirements for which fields are allowed and
                which fields are required. The contents of each file is a table where
                each row is a different record and each column is a different field.
            </p>
            <ul class="list-unstyled text-muted mb-4">
                <li class="mb-2">
                    <i class="fas fa-check"></i> Create one file for each type of data
                    you want to import. For example, don't mix customers and vendors in
                    the same file.
                </li>
                <li>
                    <i class="fas fa-check"></i> Include all required fields and make
                    sure that the data you enter in each field is valid for that type of
                    field.
                </li>
            </ul>
            <form action="<?php echo base_url();?>index.php/CustomerController/import_excel"
                enctype="multipart/form-data" method="post" style="display: inline;" id="excel_upload">
                <div class="mb-4">
                    <label class="font-weight-bold">Choose file to upload</label>
                    <input type="file" name="upload_excel" class="form-control-file" />
                    <small class="form-text text-muted">No file selected.</small>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary" id="excel_upload">Insert Excel</button>
                    <button class="btn btn-secondary">Download Template</button>
                </div>
            </form>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</html>