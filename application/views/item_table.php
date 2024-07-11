<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.min.css">
    <style>
    body {
        background-color: lightcyan;
        font-family: Arial, sans-serif;
    }

    .container {
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);

        position: relative;
    }

    .container::before {
        content: '';
        width: 100%;
        height: 5px;
        background-color: #4285F4;
        position: absolute;
        top: 0;
        left: 0;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }




    .table th,
    .table td {
        vertical-align: middle;
    }
    </style>
</head>

<body>
    <div class="container mt-4 rounded">
        <div class="row">
            <div class="col-md-6">
                <h2>Item List</h2>
            </div>
            <div class="col-md-6">
                <div class="d-flex justify-content-end align-items-center mb-4">
                    <a href="<?php echo base_url(); ?>index.php/CustomerController/index"
                        class="btn btn-success rounded mr-1">Customers</a>
                    <a href="<?php echo base_url(); ?>index.php/ItemController/createitem"
                        class="btn btn-primary rounded ml-1">Create New Item</a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>ItemCode</th>
                        <th>Item Name</th>
                        <th>Description</th>
                        <th>Rate(LKR)</th>

                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($items)) : ?>
                    <?php foreach ($items as $item) : ?>
                    <tr>
                        <td><?php echo $item->itemcode; ?></td>
                        <td><?php echo $item->itemname; ?></td>
                        <td><?php echo $item->itemdescription; ?></td>
                        <td><?php echo $item->itemrate; ?></td>

                        <td>
                            <a href="<?php echo base_url(); ?>index.php/ItemController/edit/<?php echo  $item->itemcode; ?>"
                                class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?php echo base_url(); ?>index.php/ItemController/delete/<?php echo  $item->itemcode; ?>"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this Item?');">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php else : ?>
                    <tr>
                        <td colspan="10" class="text-center">No customers found.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>

            </table>
        </div>
    </div>
    <script>
    new DataTable('#example');
    </script>


    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script defer src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script defer src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap4.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>