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
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
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

    <div class="container p-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h4 font-weight-semibold">Invoice Details</h1>
            <div class="form-group">
                <button class="btn btn-outline-primary">View Report</button>
                <button class="btn btn-secondary" onclick="generatePDF()">Create PDF 1</button>
                <button class="btn btn-outline-success" onclick="window.print()">Print </button>
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
                    <input type="date" id="from" value="1990-10-20" class="form-control" />
                </div>
                <div class="form-group col-sm-1">
                    <label for="to">To</label>
                    <input type="date" id="to" value="2024-10-20" class="form-control" />
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
                            data-class="<?php echo $joborder->class; ?>" data-site="<?php echo $joborder->site; ?>"
                            data-final="<?php echo $joborder->final_total?>">
                            <td colspan="12">_</td>
                        </tr>
                        <?php foreach ($jobitems as $jobitem) : ?>
                        <?php if ($jobitem->jo_no == $joborder->jo_no) : ?>
                        <tr data-jo-no="<?php echo $joborder->jo_no; ?>" data-customer="<?php echo $customerName; ?>"
                            data-date="<?php echo $joborder->date; ?>" data-class="<?php echo $joborder->class; ?>"
                            data-site="<?php echo $joborder->site; ?>" data-final="<?php echo $joborder->final_total?>">
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
                            data-site="<?php echo $joborder->site; ?>" data-final="<?php echo $joborder->final_total?>">
                            <td colspan="5" class="text-left text-align-center font-weight-bold"></td>
                            <td colspan="5" class="text-left text-align-center font-weight-bold">NBT: </td>
                            <td class="font-weight-bold"> <?php echo  number_format($joborder->nbt,2); ?></td>
                            <td></td>
                        </tr>
                        <tr data-jo-no="<?php echo $joborder->jo_no; ?>" data-customer="<?php echo $customerName; ?>"
                            data-date="<?php echo $joborder->date; ?>" data-class="<?php echo $joborder->class; ?>"
                            data-site="<?php echo $joborder->site; ?>" data-final="<?php echo $joborder->final_total?>">
                            <td colspan="5" class="text-left text-align-center font-weight-bold"></td>
                            <td colspan="5" class="text-left text-align-center font-weight-bold">VAT: </td>
                            <td class="font-weight-bold"> <?php echo  number_format($joborder->vat,2) ?></td>
                            <td></td>
                        </tr>
                        <tr data-jo-no="<?php echo $joborder->jo_no; ?>" data-customer="<?php echo $customerName; ?>"
                            data-date="<?php echo $joborder->date; ?>" data-class="<?php echo $joborder->class; ?>"
                            data-site="<?php echo $joborder->site; ?>" data-final="<?php echo $joborder->final_total?>">
                            <td colspan="5" class="text-left text-align-center font-weight-bold"></td>
                            <td colspan="5" class="text-left text-align-center font-weight-bold">Total: </td>
                            <td class="font-weight-bold"> <?php echo  number_format($joborder->final_total,2) ?></td>
                            <td>
                                <a
                                    href="<?php echo base_url() ?>index.php/InvoiceController/store_invoice/<?php echo $joborder->jo_no; ?>/<?php echo $customerName; ?>/<?php echo $joborder->final_total?>"><button
                                        type="button" class="btn btn-secondary" onclick="generateReport(this)"><i
                                            class="mr-1 fa fa-file-pdf-o  text-primary-m1 text-120 w-2">
                                        </i></button></a>

                            </td>
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



    function generatePDF() {
        const {
            jsPDF
        } = window.jspdf;
        const doc = new jsPDF();

        doc.setFontSize(14);
        doc.text("QB Lanka (Pvt) Ltd ", doc.internal.pageSize.getWidth() / 2, 16, {
            align: "center"
        });

        doc.setFontSize(12);
        doc.text("Address:Main Street, Battaramulla,Kotte-Bope Rode,Sri jayawardhenepura Kotte", doc.internal.pageSize
            .getWidth() / 2, 30, {
                align: "center"
            });
        doc.setFontSize(10);
        doc.text("Mobile:0710890067 | Emial: accounting@gmail.com", doc.internal.pageSize.getWidth() / 2, 35, {
            align: "center"
        });

        doc.text("Fax", doc.internal.pageSize.getWidth() / 2, 40, {
            align: "center"
        });
        doc.setFontSize(10);
        doc.text("Filter: ", 20, 60);
        doc.text("Class: " + $('#class').val(), 50, 60);
        doc.text("Date: " + $('#from').val() + " - " + $('#to').val(), 80, 60);
        doc.text("Customer: " + $('#customer').val(), 150, 60);

        doc.setFontSize(12);
        doc.text("Invoice Details", doc.internal.pageSize.getWidth() / 2, 75, {
            align: "center"
        });


        const visibleRows = [];
        $('#invoiceTable tbody tr').each(function() {
            if ($(this).is(":visible")) {
                const rowData = [];
                $(this).find('td').each(function() {
                    rowData.push($(this).text());
                });
                visibleRows.push(rowData);
            }
        });


        doc.autoTable({
            head: [$('#invoiceTable thead tr').find('th').map(function() {
                return $(this).text();
            }).get().slice(0, -1)],
            body: visibleRows,
            startY: 80,
            theme: 'striped',
            headStyles: {
                fillColor: [26, 145, 196],
                fontSize: 8
            },
            styles: {
                cellPadding: 1,
                fontSize: 8
            }
        });

        doc.save("ERP_Invoice_Report.pdf");
    }





    function generateReport(button) {
        const row = button.closest('tr');
        const joNo = row.dataset.joNo;
        const cus_name = row.dataset.customer;


        const Data = {
            customerName: row.dataset.customer,
            joNo: row.dataset.joNo,
            date: row.dataset.date,
            class: row.dataset.class,
            site: row.dataset.site,
            total: row.dataset.final
        };


        const {
            jsPDF
        } = window.jspdf;
        const doc = new jsPDF();
        doc.setFontSize(14);
        doc.text("QB Lanka (Pvt) Ltd ", doc.internal.pageSize.getWidth() / 2, 16, {
            align: "center"
        });

        doc.setFontSize(12);
        doc.text("Address:Main Street, Battaramulla,Kotte-Bope Rode,Sri jayawardhenepura Kotte", doc.internal
            .pageSize.getWidth() / 2, 30, {
                align: "center"
            });
        doc.setFontSize(10);
        doc.text("Mobile:0710890067 | Emial: accounting@gmail.com", doc.internal.pageSize.getWidth() / 2, 35, {
            align: "center"
        });

        doc.text("Fax", doc.internal.pageSize.getWidth() / 2, 40, {
            align: "center"
        });
        doc.text("Sales by Customer Summary", doc.internal.pageSize.getWidth() / 2, 45, {
            align: "center"
        });


        doc.setFontSize(12);
        doc.text(`${cus_name} Details`, doc.internal.pageSize.getWidth() / 2, 60, {
            align: "center"
        });



        doc.autoTable({
            head: [
                ['Customer', 'Date', 'Class', 'Site', 'final total',
                    'Currency'
                ]
            ],
            body: [
                [Data.customerName, Data.date, Data.class,
                    Data.site, Data.total, 'LKR'
                ]
            ],
            startY: 70,
            theme: 'grid',
            headStyles: {
                fillColor: [26, 145, 196],
                fontSize: 8
            },
            styles: {
                cellPadding: 1,
                fontSize: 8
            }
        });

        doc.save(`JO_Report_${joNo}.pdf`);
    }
    </script>
</body>

</html>