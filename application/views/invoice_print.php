<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Return</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    @page {
        margin-left: 0px;
        margin-right: 0px;
        margin-top: 0px;
        margin-bottom: 0px;
    }

    body {
        font-size: 14px;
    }

    .divider {
        border-bottom: 1px solid #dee2e6;
        margin-bottom: 1rem;
    }

    .table-bordered td,
    .table-bordered th {
        border: 1px solid #dee2e6;
    }

    .table-bordered th {
        background-color: #dcdddf;
    }

    @media print {
        body {
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }

        .container {
            width: auto;
            margin: 0 auto;
            padding: 0;
        }

        .btn {
            display: none;
        }

        .table-bordered th {
            background-color: #dcdddf !important;
        }

        .divider {
            border-bottom: 1px solid #dee2e6 !important;
            margin-bottom: 1rem !important;
        }

        .text-center p,
        .text-end p,
        .text-center h1,
        .text-center h2 {
            margin: 0;
        }

        .row {
            margin-left: 0;
            margin-right: 0;
        }

        .col-md-6,
        .col-md-5,
        .col-md-2 {
            padding: 0;
        }

        p {
            margin: 0;
        }
    }
    </style>
</head>

<body>
    <div class="container bg-white text-dark">
        <button class="btn btn-secondary mb-4" onclick="window.print()">Print</button>
        <div class="text-center mb-4">
            <h1 class="h3 text-center fw-bold">Contrade (Pvt) Ltd</h1>
            <h2 class="h5">SALES RETURN</h2>
            <p>Rathkarawwa, Maspotha, Kurunegala Tel- +94 37 2265 322 Email- info@contradelk.com</p>
            <hr>
        </div>
        <?php 
                                $customerName = "";
                                foreach ($customers as $customer) {
                                    if ($customer->cus_code == $joborder->cus_code) {
                                         $customerName = $customer->customer;
                                         break;
                                        }
                                }
                            ?>
        <div class="mb-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-5">
                            <strong>Customer Name</strong>
                        </div>
                        <div class="col-md-2">
                            <strong>:</strong>
                        </div>
                        <div class="col-md-5">
                            <p><?php echo $customerName; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <strong>Customer Address :</strong>
                        </div>
                        <div class="col-md-2">
                            <strong>:</strong>
                        </div>
                        <div class="col-md-5">
                            <p><?php echo $joborder->address; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <strong>Reference No</strong>
                        </div>
                        <div class="col-md-2">
                            <strong>:</strong>
                        </div>
                        <div class="col-md-5">
                            <p><?php echo $joborder->reference_no; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <strong>Customer VAT No </strong>
                        </div>
                        <div class="col-md-2">
                            <strong>:</strong>
                        </div>
                        <div class="col-md-5">
                            <p>0000</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <strong>Customer SVAT No </strong>
                        </div>
                        <div class="col-md-2">
                            <strong>:</strong>
                        </div>
                        <div class="col-md-5">
                            <p>0000</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-5">
                            <strong>SVRT No :</strong>
                        </div>
                        <div class="col-md-2">
                            <strong>:</strong>
                        </div>
                        <div class="col-md-5">
                            <p>0000</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <strong>SVRT Date :</strong>
                        </div>
                        <div class="col-md-2">
                            <strong>:</strong>
                        </div>
                        <div class="col-md-5">
                            <p><?php echo $joborder->date; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <strong>Expected Date :</strong>
                        </div>
                        <div class="col-md-2">
                            <strong>:</strong>
                        </div>
                        <div class="col-md-5">
                            <p><?php echo $joborder->expected_date; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <strong>Invoice No :</strong>
                        </div>
                        <div class="col-md-2">
                            <strong>:</strong>
                        </div>
                        <div class="col-md-5">
                            <p><?php echo $incoice_code;?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <strong>Attent :</strong>
                        </div>
                        <div class="col-md-2">
                            <strong>:</strong>
                        </div>
                        <div class="col-md-5">
                            <p><?php echo $joborder->attent; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <strong>Our VAT No :</strong>
                        </div>
                        <div class="col-md-2">
                            <strong>:</strong>
                        </div>
                        <div class="col-md-5">
                            <p>VAT/123</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <strong>Our SVAT No :</strong>
                        </div>
                        <div class="col-md-2">
                            <strong>:</strong>
                        </div>
                        <div class="col-md-5">
                            <p>SVAT001</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="divider"></div>
        <table class="table table-bordered mb-4">
            <thead>
                <tr>
                    <th scope="col">Sr. No</th>
                    <th scope="col">Description</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Unit Price</th>
                    <th scope="col">Discount</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                 $i = 1;
                foreach ($jobitems as $jobitem) : ?>
                <?php if ($jobitem->jo_no == $joborder->jo_no) : ?>
                <tr>
                    <td class="text-center"><?php echo $i; ?></td>
                    <td><?php  echo $jobitem->description; ?></td>
                    <td class="text-center"><?php  echo $jobitem->qty; ?></td>
                    <td class="text-end"><?php  echo $jobitem->rate; ?></td>
                    <td class="text-end"><?php  echo $jobitem->discount; ?></td>
                    <td class="text-end"><?php  echo $jobitem->total; ?></td>
                </tr>
                <?php endif;
                 $i++; ?>

                <?php endforeach; ?>
                <tr>
                    <td class="text-end" colspan="5"><strong>Total</strong></td>
                    <td class="text-end"><strong><?php  echo $joborder->final_total; ?></strong></td>
                </tr>
            </tbody>
        </table>
        <div class="mb-4">
            <p class="mb-4"><strong>Memo</strong></p>
        </div>
        <div class="d-flex justify-content-between mb-4">
            <div class="text-center">
                <p>........................................</p>
                <p>Prepared By</p>
            </div>
            <div class="text-center">
                <p>........................................</p>
                <p>Checked By</p>
            </div>
            <div class="text-center">
                <p>........................................</p>
                <p>Authorized By</p>
            </div>
        </div>
        <div class="text-muted small">
            <p>Printed By : admin</p>
            <p>Printed At : <?php echo date('Y-m-d'); ?></p>
            <p class="text-end">Powered By ERP Lanka</p>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>