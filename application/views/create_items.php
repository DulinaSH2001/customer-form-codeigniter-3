<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Customer</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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

    .tab-content {
        border: 1px solid #ced4da;
        padding: 20px;
        border-radius: 5px;
        background-color: #f8f9fa;
    }

    .form-control {
        border-radius: 4px;
    }

    label {
        font-weight: bold;
    }
    </style>
</head>

<body>
    <div class="container mt-3 rounded">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Create Item</h2>
            <div>
                <button type="submit" name="submit" class="btn btn-success rounded" form="itemForm">Save &
                    New</button>
                <a href="<?php echo base_url(); ?>index.php/ItemController/index" class="btn btn-primary rounded">Back
                    to
                    list</a>
                <button type="reset" class="btn btn-warning rounded" form="itemForm">Reset</button>
            </div>
        </div>
        <div class="form-container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="address-info-tab" data-toggle="tab" href="#address-info" role="tab"
                        aria-controls="address-info" aria-selected="true">Item Info</a>
                </li>

            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="address-info" role="tabpanel"
                    aria-labelledby="address-info-tab">
                    <form id="itemForm" class="mt-4" action="<?php echo base_url(); ?>index.php/ItemController/saveitem"
                        method="post">

                        <div id="contactFields">

                            <div class="form-row contact-row">
                                <div class="form-group col-md-6">
                                    <label for="code">Item Code</label>
                                    <input type="text" class="form-control" value="<?php echo $itemcode?>" disabled>
                                    <input type="hidden" name="itemCode" value="<?php echo $itemcode?>">
                                </div>
                                <div class="form-group col-md-6">

                                    <label for="contact">Description </label>
                                    <textarea class="form-control" name="description" placeholder="description"
                                        rows="3"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="Itemname">Item Name</label>
                                <input type="text" class="form-control" name="itemName" placeholder="Item name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mainEmail">Price Rate(LKR)</label>
                                <input type="number" class="form-control" name="itemPrice" placeholder="Item price">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="Itemname">Item Category</label>
                                <select class="form-control" name="itemCategory">
                                    <option value="Bakery">Bakery</option>
                                    <option value="Beverages">Beverages</option>
                                    <option value="Fruits">Fruits</option>
                                </select>
                            </div>

                        </div>


                    </form>
                </div>
                <div class="tab-pane fade" id="additional-info" role="tabpanel" aria-labelledby="additional-info-tab">
                </div>
                <div class="tab-pane fade" id="documents-upload" role="tabpanel" aria-labelledby="documents-upload-tab">
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>