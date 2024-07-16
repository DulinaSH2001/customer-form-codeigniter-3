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
    </style>
</head>

<body>
    <div class="container mt-3 rounded">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Create Customer</h2>
            <div>
                <button type="submit" name="submit" class="btn btn-success rounded" form="customerForm">Save &
                    New</button>
                <a href="<?php echo base_url(); ?>index.php/CustomerController/index"
                    class="btn btn-primary rounded">Back to list</a>
                <button type="reset" class="btn btn-warning rounded" form="customerForm">Reset</button>
                <a href="<?php echo base_url(); ?>index.php/CustomerController/excelupload"
                    class="btn btn-primary rounded">Back to list</a>
            </div>
        </div>
        <div class="form-container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="address-info-tab" data-toggle="tab" href="#address-info" role="tab"
                        aria-controls="address-info" aria-selected="true">Address Info</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="additional-info-tab" data-toggle="tab" href="#additional-info" role="tab"
                        aria-controls="additional-info" aria-selected="false">Additional Info</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="documents-upload-tab" data-toggle="tab" href="#documents-upload" role="tab"
                        aria-controls="documents-upload" aria-selected="false">Documents Upload</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="address-info" role="tabpanel"
                    aria-labelledby="address-info-tab">
                    <form id="customerForm" class="mt-4"
                        action="<?php echo base_url(); ?>index.php/CustomerController/save" method="post">

                        <div id="contactFields">
                            <!-- Initial contact fields -->
                            <div class="form-row contact-row">
                                <div class="form-group col-md-6">
                                    <label for="code">Code</label>
                                    <input type="text" class="form-control" value="<?php echo $cus_code; ?>" disabled>
                                    <input type="hidden" name="cusCode" value="<?php echo $cus_code; ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="contact">Contact 1</label>
                                    <div class="input-group">
                                        <select class="form-control col-md-3 ml-2" name="contact-title[]">
                                            <option selected>Mr</option>
                                            <option value="Mrs">Mrs</option>
                                            <option value="Miss">Miss</option>
                                            <option value="Dr">Dr</option>
                                        </select>
                                        <input type="text" class="form-control col-md-8 ml-2" name="contact-name[]"
                                            placeholder="Fullname" />
                                        <button class="btn btn-success add-contact" type="button">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="customer">Customer</label><span class="text-danger">*</span>
                                <input type="text" class="form-control" name="cusName" placeholder="name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mainEmail">Main Email</label>
                                <input type="email" class="form-control" name="mainEmail" placeholder="email">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="companyName">Company Name</label>
                                <input type="text" class="form-control" name="companyName" placeholder="company name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="ccEmail">CC Email</label>
                                <input type="email" class="form-control" name="ccEmail" placeholder="cc email">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="mainPhone">Main Phone</label>
                                <input type="text" class="form-control" name="mainPhone" placeholder="main phone">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="website">Website</label>
                                <input type="text" class="form-control" name="website" placeholder="http://www.">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="workPhone">Work Phone</label>
                                <input type="text" class="form-control" name="workPhone" placeholder="work phone">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="printName">Print Name On Cheque</label>
                                <input type="text" class="form-control" name="printName" placeholder="Print Name">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="mobile">Mobile</label>
                                <input type="text" class="form-control" name="mobile" placeholder="mobile">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="currency">Currency</label><span class="text-danger ml-1">*</span>
                                <select name="currency" class="form-control">
                                    <option value="LKR" selected>LKR</option>
                                    <option value="USD">USD</option>
                                    <option value="EUR">EUR</option>
                                    <option value="GBP">GBP</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="fax">Fax</label>
                                <input type="text" class="form-control" name="fax" placeholder="fax">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="account">Account</label><span class="text-danger ml-1">*</span>
                                <select name="account" class="form-control" required>
                                    <option value="Account Receivable" selected>Account Receivable</option>
                                    <option value="Account Payable">Account Payable</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 offset-md-6">
                                <label for="dateOfJoined">Date of Joined</label>
                                <input type="date" class="form-control" name="dateOfJoined">
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
    <script>
    $(document).ready(function() {

        var contactCount = 1;

        function addContactField() {
            if (contactCount < 5) {
                const newContactForm = `
                <div class="form-row contact-row">
                    <div class="form-group col-md-6">
                        <label for="contact">Contact ${contactCount+1}</label>
                        <div class="input-group">
                            <select class="form-control col-md-3 ml-2" name="contact-title[]">
                                <option selected>Mr</option>
                                <option value="Mrs">Mrs</option>
                                <option value="Miss">Miss</option>
                                <option value="Dr">Dr</option>
                            </select>
                            <input type="text" class="form-control col-md-8 ml-2" name="contact-name[]" placeholder="Fullname" />
                            <button class="btn btn-danger remove-contact" type="button">-</button>
                        </div>
                    </div>
                </div>`;
                $('#contactFields').append(newContactForm);
                contactCount++;
            } else {
                alert('Maximum 5 contacts allowed.');
            }
        }


        $('.add-contact').click(addContactField);


        $(document).on('click', '.remove-contact', function() {
            $(this).closest('.contact-row').remove();
            contactCount--;
        });
    });
    </script>
</body>

</html>