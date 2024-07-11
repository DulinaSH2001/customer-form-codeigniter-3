<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jspdf@latest/dist/jspdf.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jspdf-autotable@latest/dist/jspdf.plugin.autotable.min.js"></script>
    <style>
    .container {
        max-width: 1400px;
    }

    select.form-control:not([size]):not([multiple]) {
        height: calc(2.0rem + 2px);
    }

    .form-control {
        border: 1px solid #ced4da;
        padding: 0.35rem 0.45rem;
        font-size: 0.875rem;
    }

    .form-control select {
        height: calc(2.0rem + 1px);
        padding-top: 0.25rem;
        padding-bottom: 0.25rem;
    }

    label {
        font-weight: bold;
    }

    thead {
        background-color: #1a91c4;
        color: white;
    }

    th {
        border: 2px solid #ced4da;
        text-align: center;
        vertical-align: middle;
    }

    td {
        text-align: center;
        vertical-align: middle;
    }

    tr {
        height: 45px;
    }

    .sm-col {
        width: 4%;
    }

    .smd-col {
        width: 9%;
    }

    .md-col {
        width: 11%;
    }

    .lg-col {
        width: 16%;
    }

    .table td {
        padding: 0.05rem;
    }

    .table {
        width: auto;
    }

    .max-width {
        max-width: 100px;
    }

    input[type="date"]::-webkit-calendar-picker-indicator {
        opacity: 0;
    }

    .scrollable-table {
        overflow-x: auto;
    }

    .scrollable-table table {
        width: 100%;
    }
    </style>
</head>

<body>

    <div class="container py-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h4 font-weight-semibold">Invoice Details</h1>
            <div class="form-group">
                <button class="btn btn-outline-primary">View Report</button>
                <button class="btn btn-secondary" onclick="generatePDF()">Create PDF 1</button>
                <button class="btn btn-outline-success" onclick="genPDF()">Create PDF 2 </button>
                <button class="btn btn-outline-warning">Reset</button>
            </div>
        </div>
        <div class="card p-2 rounded-lg shadow-lg">
            <div class="form-row px-1 mb-4">
                <div class="form-group col-md">
                    <label for="dates">Dates</label>
                    <select id="dates" class="form-control">
                        <option value="last-month">Last Month</option>
                    </select>
                </div>
                <div class="form-group col-sm-1">
                    <label for="from">From</label>
                    <input type="date" id="from" class="form-control" />
                </div>
                <div class="form-group col-sm-1">
                    <label for="to">To</label>
                    <input type="date" id="to" class="form-control" />
                </div>
                <div class="form-group col-md">
                    <label for="customer">Customer</label>
                    <select id="customer" class="form-control">
                        <option value="all">All</option>
                        <?php foreach ($customers as $customer): ?>
                        <option value="<?php echo $customer->customer; ?>"><?php echo $customer->customer?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-md">
                    <label for="class">Class</label>
                    <select id="class" class="form-control">
                        <option>All</option>
                        <option>Class 1</option>
                        <option>Class 2</option>
                        <option>Class 3</option>
                        <option>Class 4</option>
                    </select>
                </div>
                <div class="form-group col-md">
                    <label for="site">Site</label>
                    <select id="site" class="form-control">
                        <option>All</option>
                        <option>Site 1</option>
                        <option>Site 2</option>
                        <option>Site 3</option>
                        <option>Site 4</option>
                    </select>
                </div>
                <div class="form-group col-lg">
                    <label for="search">Search</label>
                    <input type="text" id="search" class="form-control" />
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="invoiceTable">
                    <thead>
                        <tr>
                            <th class="smd-col">Number</th>
                            <th class="smd-col">Date</th>
                            <th class="smd-col">Name</th>
                            <th class="smd-col">Site</th>
                            <th class="md-col">Class</th>
                            <th class="md-col">Item code</th>
                            <th class="md-col">Item Description</th>
                            <th class="sm-col">Qty</th>
                            <th class="smd-col">Unit Price</th>
                            <th class="smd-col">Discount</th>
                            <th class="md-col">Amount</th>
                            <th class="sm-col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($joborders)) : ?>
                        <?php foreach ($joborders as $joborder) : ?>
                        <?php 
                                $customerName = "";
                                foreach ($customers as $customer) {
                                    if ($customer->cus_code == $joborder->cus_code) {
                                         $customerName = $customer->customer;
                                         break;
                                        }
                                }
                            ?>
                        <tr style="height:25px ;" data-jo-no="<?php echo $joborder->jo_no; ?>"
                            data-customer="<?php echo $customerName; ?>" data-date="<?php echo $joborder->date; ?>"
                            data-class="<?php echo $joborder->class; ?>" data-site="<?php echo $joborder->site; ?>">
                            <td colspan="12">_</td>
                        </tr>
                        <?php foreach ($jobitems as $jobitem) : ?>
                        <?php if ($jobitem->jo_no == $joborder->jo_no) : ?>
                        <tr data-jo-no="<?php echo $joborder->jo_no; ?>" data-customer="<?php echo $customerName; ?>"
                            data-date="<?php echo $joborder->date; ?>" data-class="<?php echo $joborder->class; ?>"
                            data-site="<?php echo $joborder->site; ?>">
                            <td><?php echo $joborder->jo_no; ?></td>
                            <td><?php echo $joborder->date; ?></td>
                            <td><?=$customerName;?></td>
                            <td><?php echo $joborder->site; ?></td>
                            <td><?php echo $joborder->class; ?></td>
                            <td><?php echo $jobitem->item_code; ?></td>
                            <td><?php echo $jobitem->description; ?></td>
                            <td><?php echo number_format($jobitem->qty); ?></td>
                            <td><?php echo number_format($jobitem->rate,2); ?></td>
                            <td><?php echo  number_format($joborder->tdiscount,2); ?></td>
                            <td><?php echo  number_format($joborder->total,2) ?></td>
                            <td></td>
                        </tr>
                        <?php endif; ?>
                        <?php endforeach; ?>
                        <tr data-jo-no="<?php echo $joborder->jo_no; ?>" data-customer="<?php echo $customerName; ?>"
                            data-date="<?php echo $joborder->date; ?>" data-class="<?php echo $joborder->class; ?>"
                            data-site="<?php echo $joborder->site; ?>">
                            <td colspan="5" class="text-left text-align-center font-weight-bold"></td>
                            <td colspan="5" class="text-left text-align-center font-weight-bold">NBT: </td>
                            <td class="font-weight-bold"> <?php echo  number_format($joborder->nbt,2); ?></td>
                            <td></td>
                        </tr>
                        <tr data-jo-no="<?php echo $joborder->jo_no; ?>" data-customer="<?php echo $customerName; ?>"
                            data-date="<?php echo $joborder->date; ?>" data-class="<?php echo $joborder->class; ?>"
                            data-site="<?php echo $joborder->site; ?>">
                            <td colspan="5" class="text-left text-align-center font-weight-bold"></td>
                            <td colspan="5" class="text-left text-align-center font-weight-bold">VAT: </td>
                            <td class="font-weight-bold"> <?php echo  number_format($joborder->vat,2) ?></td>
                            <td></td>
                        </tr>
                        <tr data-jo-no="<?php echo $joborder->jo_no; ?>" data-customer="<?php echo $customerName; ?>"
                            data-date="<?php echo $joborder->date; ?>" data-class="<?php echo $joborder->class; ?>"
                            data-site="<?php echo $joborder->site; ?>">
                            <td colspan="5" class="text-left text-align-center font-weight-bold"></td>
                            <td colspan="5" class="text-left text-align-center font-weight-bold">Total: </td>
                            <td class="font-weight-bold"> <?php echo  number_format($joborder->final_total,2) ?></td>
                            <td></td>
                        </tr>
                        <?php endforeach; ?>
                        <?php else : ?>
                        <tr>
                            <td colspan="12" class="text-center">No job orders found.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jspdf@latest/dist/jspdf.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jspdf-autotable@latest/dist/jspdf.plugin.autotable.min.js"></script>

    <script>
    function filterTable() {
        const selectedCustomer = $('#customer').val();
        const fromDate = new Date($('#from').val());
        const toDate = new Date($('#to').val());
        const dateFilter = $('#dates').val();
        const selectedClass = $('#class').val();
        const selectedSite = $('#site').val();
        const searchQuery = $('#search').val().toLowerCase();

        const now = new Date();
        const lastMonth = new Date(now.setMonth(now.getMonth() - 1));

        $('tr[data-jo-no]').each(function() {
            const customerName = $(this).data('customer');
            const date = new Date($(this).data('date'));
            const className = $(this).data('class');
            const siteName = $(this).data('site');
            const rowText = $(this).text().toLowerCase();

            let showRow = true;

            if (selectedCustomer !== 'all' && customerName !== selectedCustomer) {
                showRow = false;
            }

            if (!isNaN(fromDate.getTime()) && date < fromDate) {
                showRow = false;
            }

            if (!isNaN(toDate.getTime()) && date > toDate) {
                showRow = false;
            }

            if (dateFilter === 'last-month' && date < lastMonth) {
                showRow = false;
            }

            if (selectedClass !== 'All' && className !== selectedClass) {
                showRow = false;
            }

            if (selectedSite !== 'All' && siteName !== selectedSite) {
                showRow = false;
            }

            if (searchQuery && !rowText.includes(searchQuery)) {
                showRow = false;
            }

            if (showRow) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }


    $('#dates, #from, #to, #customer, #class, #site, #search').change(filterTable);

    async function generatePDF() {

        const coloumns = ['Name', 'Date', 'Site', 'Class', 'Amount'];
        const data = [];
        <?php foreach ($joborders as $joborder) : ?>
        <?php 
            $customerName = "";
            foreach ($customers as $customer) {
                if ($customer->cus_code == $joborder->cus_code) {
                    $customerName = $customer->customer;
                    break;
                }
            }
        ?>

        const row = [
            "<?php echo $customerName; ?>",
            "<?php echo $joborder->date; ?>",
            "<?php echo number_format($joborder->final_total, 2); ?>",
            "LKR",
            "<?php echo number_format($joborder->final_total, 2); ?>"
        ];
        data.push(row);
        <?php endforeach; ?>
        console.log('working 1');


        const {
            jsPDF
        } = window.jspdf;
        const doc = new jsPDF();
        doc.setFontSize(14);

        doc.text('ERP LANKA Sales', 10, 20);

        doc.autoTable({
            head: [columns],
            body: data,
            startY: 30,
            headStyles: {
                fillColor: [26, 145, 196]
            }
        });

        doc.save('invoice.pdf');
    }

    async function genPDF() {
        const columns = ['Customer Name', 'Date', 'Final Total Amount', 'Currency', 'Total'];
        const data = [];

        $('tr[data-jo-no]:visible').each(function() {
            const customerName = $(this).data('customer');
            const date = $(this).data('date');
            const finalTotal = $(this).find('td:nth-child(11)').text();
            const currency = 'LKR';
            const total = finalTotal;

            const row = [
                customerName,
                date,
                finalTotal,
                currency,
                total
            ];
            data.push(row);
        });
        console.log('working 2');

        const {
            jsPDF
        } = window.jspdf;
        const doc = new jsPDF();
        doc.setFontSize(14);

        doc.text('ERP LANKA Sales', 10, 20);

        doc.autoTable({
            head: [columns],
            body: data,
            startY: 30,
            headStyles: {
                fillColor: [26, 145, 196]
            }
        });

        doc.save('invoice.pdf');
    }
    </script>
</body>

</html>