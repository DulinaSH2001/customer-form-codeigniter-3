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
        height: 30px;
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
                <a href="<?php echo base_url() ?>index.php/InvoiceController/monthly_sale"
                    class="btn btn-outline-warning">Get Monthly Sales</a>
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
                            <th class="md-col">Item category</th>
                            <th class="md-col">Item name</th>
                            <th class="sm-col">Qty</th>
                            <th class="smd-col">Amount</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        <!-- Rows will be inserted here by JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
    const orderItems = <?php echo json_encode($order_items); ?>;
    console.log("orderItems:", orderItems);

    function combineItems(items) {
        if (!Array.isArray(items)) {
            console.error("Expected an array but got:", items);
            return {};
        }
        const combinedItems = {};
        items.forEach(item => {
            if (!combinedItems[item.category]) {
                combinedItems[item.category] = {};
            }
            if (!combinedItems[item.category][item.item_code]) {
                combinedItems[item.category][item.item_code] = {
                    ...item,
                    qty: 0,
                    total: 0
                };
            }
            combinedItems[item.category][item.item_code].qty += parseFloat(item.qty);
            combinedItems[item.category][item.item_code].total += parseFloat(item.total);
        });
        return combinedItems;
    }

    function displayTable(combinedItems) {
        const tableBody = document.querySelector('#invoiceTable tbody');
        tableBody.innerHTML = '';
        let totalQty = 0;
        let totalAmount = 0;

        Object.keys(combinedItems).forEach(category => {
            const categoryRow = document.createElement('tr');
            categoryRow.innerHTML = `<td class="font-weight-bold">${category}</td><td colspan="3"></td>`;
            tableBody.appendChild(categoryRow);

            Object.values(combinedItems[category]).forEach(item => {
                const row = document.createElement('tr');
                row.innerHTML = `
                        <td></td>
                        <td>${item.name}</td>
                        <td>${item.qty}</td>
                        <td>${item.total.toFixed(2)}</td>
                    `;
                tableBody.appendChild(row);

                totalQty += parseFloat(item.qty);
                totalAmount += parseFloat(item.total);
            });
        });

        const spacerow = document.createElement('tr');
        spacerow.innerHTML = `
            <td colspan="4" class="font-weight-bold"></td>
            `;
        tableBody.appendChild(spacerow);

        const totalRow = document.createElement('tr');
        totalRow.innerHTML = `
            <td colspan="2" class="font-weight-bold">Total</td>
            <td>${totalQty.toFixed(1)}</td>
            <td>${totalAmount.toFixed(2)}</td>
            `;
        tableBody.appendChild(totalRow);
    }

    function filterTable() {
        const fromDate = new Date($('#from').val());
        const toDate = new Date($('#to').val());
        const dateFilter = $('#dates').val();
        const selectedClass = $('#class').val();
        const selectedSite = $('#site').val();
        const searchQuery = $('#search').val().toLowerCase();

        const now = new Date();
        const lastMonth = new Date(now.setMonth(now.getMonth() - 1));

        const filteredItems = orderItems.filter(item => {
            const date = new Date(item.created_at);
            const className = item.class;
            const siteName = item.site;
            const rowText = `${item.item_code} ${item.item_name}`.toLowerCase();

            let showRow = true;

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

            return showRow;
        });

        const combinedItems = combineItems(filteredItems);
        displayTable(combinedItems);
    }

    $('#dates, #from, #to, #class, #site, #search').change(filterTable);

    $(document).ready(() => {
        const combinedItems = combineItems(orderItems);
        console.log('combined data', combinedItems);
        displayTable(combinedItems);
    });

    function generatePDF() {
        const {
            jsPDF
        } = window.jspdf;
        const doc = new jsPDF();

        doc.setFontSize(16);
        doc.text("RUHARA DISTRIBUTORS", doc.internal.pageSize.getWidth() / 2, 23, {
            align: "center"
        });

        doc.setFontSize(10);
        doc.text("Address : NO 228/A SAMAGIPURA MAHAOYA AMPARA", doc.internal.pageSize
            .getWidth() / 2, 30, {
                align: "center"
            });
        doc.setFontSize(10);
        doc.text("Mobile : 077 4518513 | Email : ruharadistributors2@gmail.com", doc.internal.pageSize.getWidth() / 2,
            35, {
                align: "center"
            });

        doc.setFontSize(12);
        doc.text("Sale by Item Summary", doc.internal.pageSize.getWidth() / 2, 40, {
            align: "center"
        });

        doc.setFontSize(10);
        doc.text("From: " + $('#from').val() + " To: " + $('#to').val() + " (Class: " + $('#class').val() +
            " | Site: " + $('#site').val() + ")", doc.internal.pageSize.getWidth() / 2, 46, {
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
        visibleRows.pop();

        let totalQty = 0;
        let totalAmount = 0;

        visibleRows.forEach(row => {
            const qty = parseFloat(row[2]);
            const amount = parseFloat(row[3]);

            if (!isNaN(qty)) {
                totalQty += qty;
            }

            if (!isNaN(amount)) {
                totalAmount += amount;
            }
        });
        const spacerow = ["", "", "", ""];
        visibleRows.push(spacerow);


        const totalRow = ["", "Total", totalQty.toFixed(2), totalAmount.toFixed(2)];
        visibleRows.push(totalRow);


        visibleRows.push(spacerow);

        const totalRow2 = ["", "Total", totalQty.toFixed(2), totalAmount.toFixed(2)];
        visibleRows.push(totalRow2);

        totalRow2[0] = {
            content: totalRow2[0],
            styles: {
                fillColor: [0, 0, 0]
            }
        };
        totalRow2[1] = {
            content: totalRow2[1],
            styles: {
                fillColor: [0, 0, 0],
                textColor: [255, 255, 255]
            }
        };
        totalRow2[2] = {
            content: totalRow2[2],
            styles: {
                fillColor: [0, 0, 0],
                textColor: [255, 255, 255]
            }
        };
        totalRow2[3] = {
            content: totalRow2[3],
            styles: {
                fillColor: [0, 0, 0],
                textColor: [255, 255, 255]
            }
        };


        doc.autoTable({
            head: [$('#invoiceTable thead tr').find('th').map(function() {
                return $(this).text();
            }).get()],
            body: visibleRows,
            startY: 60,
            theme: 'striped',
            headStyles: {
                fillColor: [26, 145, 196],
                fontSize: 9,
                cellWidth: 'auto',
                cellPadding: 2,
            },
            styles: {
                cellPadding: 1,
                fontSize: 8,
                cellWidth: 'auto'
            }
        });

        doc.save("ERP_Invoice_Report.pdf");
    }
    </script>
</body>

</html>