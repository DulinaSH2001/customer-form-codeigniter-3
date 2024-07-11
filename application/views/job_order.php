<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Order</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
    body {
        background-color: lightgrey;
        font-family: Arial, sans-serif;
    }

    .container {
        max-width: fit-content;
        margin-left: 20px;
        margin-right: 20px;

    }

    .form-control {
        border: 1px solid #ced4da;

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

    .scrollable-table {
        overflow-x: auto;
    }

    .scrollable-table table {
        width: 100%;
    }
    </style>
</head>

<body>
    <div class="container mt-3">
        <h5>Job Order</h5>
        <form id="joborder" action="<?php echo base_url() ?>index.php/JobController/savejob" method="post">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="customerName">Customer Name <span class="text-danger">*</span></label>
                            <input type="hidden" id="cuscode" name="cuscode" value="">
                            <select id="customerSelect" class="form-control">
                                <?php foreach($customers as $customer): ?>
                                <option value="<?php echo $customer->cus_code; ?>">
                                    <?php echo $customer->customer; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="class">Class</label>
                            <select id="class" name="jclass" class="form-control">
                                <option selected>Class 1</option>
                                <option>Class 2</option>
                                <option>Class 3</option>
                                <option>Class 4</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="site">Site</label>
                            <select id="site" class="form-control" name="jsite">
                                <option selected>Site 1</option>
                                <option>Site 2</option>
                                <option>Site 3</option>
                                <option>Site 4</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row d-flex ">
                        <div class="form-group col-md-3 ">
                            <label for="address">Address</label>
                            <textarea class="form-control" rows="5" name="address" placeholder="address"> </textarea>
                        </div>
                        <div class="form-group col-md-3 ">
                            <label for="deliveryDestination">Delivery Destination</label>
                            <textarea class="form-control" rows="5" name="delivery_destination"
                                placeholder="address"> </textarea>
                        </div>
                        <div class="form-group col-6 d-flex justify-content-end ">
                            <div class="form-row">
                                <div class="form-group col-8">
                                    <label for="joNo">JO No</label>
                                    <input type="text" class="form-control" id="joNo" name="joNo"
                                        value="<?php echo $joborder_code?>" readonly>
                                </div>
                                <div class="form-group col-8">
                                    <label for="date">Date</label>
                                    <input type="date" class="form-control" id="date" name="date" value="2024-07-01">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="orderBy">Order By</label>
                            <select id="orderBy" name="order" class="form-control">
                                <option selected>Order 1</option>
                                <option>Order 2</option>
                                <option>Order 3</option>
                                <option>Order 4</option>

                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="checkedBy">Checked By</label>
                            <select id="checkedBy" name="checkedBy" class="form-control">
                                <option selected>Checked 1</option>
                                <option>Checked 2</option>
                                <option>Checked 3</option>
                                <option>Checked 4</option>

                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="rep">Rep</label>
                            <select id="rep" name="rep" class="form-control">
                                <option selected>Rep 1</option>
                                <option>Rep 2</option>
                                <option>Rep 3</option>
                                <option>Rep 4</option>

                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="shipVia">Ship Via</label>
                            <select id="shipVia" name="shipvia" class="form-control">
                                <option selected>Ship 1</option>
                                <option>Ship 2</option>
                                <option>Ship 3</option>
                                <option>Ship 4</option>

                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="referenceNo">Reference No</label>
                            <input type="text" class="form-control" name="reference_no" id="referenceNo">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="expectedDate">Expected Date</label>
                            <input type="date" class="form-control" id="expectedDate" name="expected_date"
                                value="2024-07-01">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="attent">Attent</label>
                            <input type="text" class="form-control" id="attent" name="attent">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="terms">Terms</label>
                            <input type="text" class="form-control" id="terms" name="terms">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="dueDate">Due Date</label>
                            <input type="date" class="form-control" id="dueDate" name="due_date" value="2024-07-01">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3 ">
                <div class="card-body">

                    <div class="form-group text-right">
                        <button type="button" class="btn btn-success" id="addRowBtn">Add Item</button>
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th class="smd-col">Item Code</th>
                                <th class="lg-col">Description</th>
                                <th class="sm-col">OnHand</th>
                                <th class="sm-col">Qty</th>
                                <th class="sm-col">Rate(LKR)</th>
                                <th class="smd-col">Amount</th>
                                <th class="sm-col">Disc %</th>
                                <th class="smd-col">Discount</th>
                                <th class="smd-col">Total</th>
                                <th class="md-col">Class</th>
                                <th class="smd-col">Site</th>
                                <th class="smd-col">Unit</th>
                                <th class="sm-col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="itemRows">
                            <tr class="item-row">
                                <td>
                                    <select class="form-control item-select" name="itemcode[]">
                                        <option selected>Choose...</option>
                                        <?php foreach($items as $item): ?>
                                        <option value="<?php echo $item->itemcode; ?>"
                                            data-description="<?php echo $item->itemdescription; ?>"
                                            data-rate="<?php echo $item->itemrate; ?>">
                                            <?php echo $item->itemcode; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                                <td><textarea class="form-control item-description" rows="1" name="description[]"
                                        placeholder="description"></textarea></td>
                                <td><input type="text" class="form-control item-onhand" name="onhand[]"></td>
                                <td><input type="number" class="form-control item-qty" name="qty[]" id=" item-qty-1">
                                </td>
                                <td><input type="text" class="form-control item-rate" name="rate[]" readonly></td>
                                <td><input type="text" class="form-control item-amount" id="item-amount-1"
                                        name="amount[]" readonly>
                                </td>
                                <td><input type="text" class="form-control item-disc" name="discountpercent[]"></td>
                                <td><input type="text" class="form-control item-discount" id="item-discount-1"
                                        name="discount[]" readonly></td>
                                <td><input type="text" class="form-control item-total" id="item-total-1" name="total[]"
                                        readonly>
                                </td>
                                <td><select class="form-control item-class" name="class[]">
                                        <option selected>Class 1</option>
                                        <option>Class 2</option>
                                        <option>Class 3</option>
                                        <option>Class 4</option>
                                    </select></td>
                                <td><select class="form-control item-site" name="site[]">
                                        <option selected>Site 1</option>
                                        <option>Site 2</option>
                                        <option>Site 3</option>
                                        <option>Site 4</option>
                                    </select></td>
                                <td><select class="form-control item-unit" name="unit[]">
                                        <option selected>Unit 1</option>
                                        <option>Unit 2</option>
                                        <option>Unit 3</option>
                                        <option>Unit 4</option>
                                    </select></td>
                                <td><button type="button" class="btn btn-danger btn-sm delete-row">Delete</button></td>
                            </tr>
                            <tr>
                                <td>
                                    <select class="form-control item-select" name="itemcode[]">
                                        <option selected>Choose...</option>
                                        <?php foreach($items as $item): ?>
                                        <option value="<?php echo $item->itemcode; ?>"
                                            data-description="<?php echo $item->itemdescription; ?>"
                                            data-rate="<?php echo $item->itemrate; ?>">
                                            <?php echo $item->itemcode; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                                <td><textarea class="form-control item-description" rows="1" name="description[]"
                                        placeholder="description"></textarea></td>
                                <td><input type="text" class="form-control item-onhand" name="onhand[]"></td>
                                <td><input type="number" class="form-control item-qty" name="qty[]" id=" item-qty-1">
                                </td>
                                <td><input type="text" class="form-control item-rate" name="rate[]" readonly></td>
                                <td><input type="text" class="form-control item-amount" id="item-amount-1"
                                        name="amount[]" readonly>
                                </td>
                                <td><input type="text" class="form-control item-disc" name="discountpercent[]"></td>
                                <td><input type="text" class="form-control item-discount" id="item-discount-1"
                                        name="discount[]" readonly></td>
                                <td><input type="text" class="form-control item-total" id="item-total-1" name="total[]"
                                        readonly>
                                </td>
                                <td><select class="form-control item-class" name="class[]">
                                        <option selected>Class 1</option>
                                        <option>Class 2</option>
                                        <option>Class 3</option>
                                        <option>Class 4</option>
                                    </select></td>
                                <td><select class="form-control item-site" name="site[]">
                                        <option selected>Site 1</option>
                                        <option>Site 2</option>
                                        <option>Site 3</option>
                                        <option>Site 4</option>
                                    </select></td>
                                <td><select class="form-control item-unit" name="unit[]">
                                        <option selected>Unit 1</option>
                                        <option>Unit 2</option>
                                        <option>Unit 3</option>
                                        <option>Unit 4</option>
                                    </select></td>
                                <td><button type="button" class="btn btn-danger btn-sm delete-row">Delete</button></td>
                            </tr>
                        </tbody>
                        <tbody class="calculate col">

                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Qty<input type="number" class="form-control " id="sumQty" name="sumQty" readonly>
                                </td>
                                <td></td>
                                <td>Amount<input type="text" class="form-control item-tamount" id="sumAmount"
                                        name="sumAmount" readonly></td>
                                <td></td>
                                <td>Discount<input type="text" class="form-control item-tdiscount" id="sumDiscount"
                                        name="sumDiscount" readonly></td>
                                <td>Total<input type="text" class="form-control item-ttotal" id="sumTotal"
                                        name="sumTotal" readonly></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="exRate">Ex.Rate</label>
                                    <input type="text" class="form-control" id="exRate" name="ex_rate">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="totalAmount">LKR Total Amount</label>
                                    <input type="text" class="form-control" id="totalAmount" name="totalAmount"
                                        readonly>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="account">Account</label>
                                    <input type="text" class="form-control" id="account" name="account">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="nbtPercent">NBT %</label>
                                    <input type="text" class="form-control" id="nbtPercent" name="nbt_percent">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="nbt">NBT</label>
                                    <input type="text" class="form-control" id="nbt" name="nbt" readonly>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="subTotal">Sub Total</label>
                                    <input type="text" class="form-control" id="subTotal" name="sub_total" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="form-row">

                                <div class="form-group col-md-8">
                                    <label for="memo">Memo</label>
                                    <textarea class="form-control" id="memo" name="memo" rows="3"></textarea>
                                </div>

                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="vatPercent">VAT %</label>
                                    <input type="text" class="form-control" id="vatPercent" name="vat_percent">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="vat">VAT</label>
                                    <input type="text" class="form-control" id="vat" name="vat" readonly>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="total">Total</label>
                                    <input type="text" class="form-control" id="total" name="final_total" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <button type="submit" class="btn btn-success">Save & Close</button>
                        <button type="submit" class="btn btn-primary">Save & New</button>
                        <button type="submit" class="btn btn-info">Save & Print</button>
                    </div>
                </div>
            </div>

        </form>

    </div>
    <script>
    document.addEventListener('DOMContentLoaded', (event) => {

        document.getElementById('cuscode').value = document.getElementById('customerSelect').value;

        document.getElementById('customerSelect').addEventListener('change', function() {
            var selectedCode = this.value;
            document.getElementById('cuscode').value = selectedCode;
        });


        function updateRowDetails(row) {
            var selectedOption = row.querySelector('.item-select').options[row.querySelector('.item-select')
                .selectedIndex];
            var description = selectedOption.getAttribute('data-description');
            var rate = selectedOption.getAttribute('data-rate');

            row.querySelector('.item-description').value = description;
            row.querySelector('.item-rate').value = rate;

            updateRowTotals(row);
        }

        function updateRowTotals(row) {
            var qty = parseFloat(row.querySelector('.item-qty').value) || 0;
            var rate = parseFloat(row.querySelector('.item-rate').value) || 0;
            var disc = parseFloat(row.querySelector('.item-disc').value) || 0;

            var amount = qty * rate;
            var discount = (amount * disc) / 100;
            var total = amount - discount;

            row.querySelector('.item-amount').value = amount.toFixed(2);
            row.querySelector('.item-discount').value = discount.toFixed(2);
            row.querySelector('.item-total').value = total.toFixed(2);

            calculateTotals();
        }

        function calculateTotals() {
            var sumQty = 0;
            var sumAmount = 0;
            var sumDiscount = 0;
            var sumTotal = 0;

            $("table tbody tr").each(function() {
                var qty = parseFloat($(this).find(".item-qty").val()) || 0;
                var amount = parseFloat($(this).find(".item-amount").val()) || 0;
                var discount = parseFloat($(this).find(".item-discount").val()) || 0;
                var total = parseFloat($(this).find(".item-total").val()) || 0;

                sumQty += qty;
                sumAmount += amount;
                sumDiscount += discount;
                sumTotal += total;
            });

            $("#sumQty").val(sumQty);
            $("#sumAmount").val(sumAmount.toFixed(2));
            $("#sumDiscount").val(sumDiscount.toFixed(2));
            $("#sumTotal").val(sumTotal.toFixed(2));
            $("#totalAmount").val(sumTotal.toFixed(2));

            calNBT(sumTotal);
        }

        function calNBT(subtotal) {
            var nbtPercent = parseFloat(document.getElementById('nbtPercent').value) || 0;
            var nbt = (nbtPercent / 100) * subtotal;
            var subTotalWithNBT = subtotal + nbt;

            document.getElementById('nbt').value = nbt.toFixed(2);
            document.getElementById('subTotal').value = subTotalWithNBT.toFixed(2);

            calvat(subTotalWithNBT);
        }

        function calvat(subtotalWithNBT) {
            var vatPercent = parseFloat(document.getElementById('vatPercent').value) || 0;
            var vat = (vatPercent / 100) * subtotalWithNBT;
            var total = subtotalWithNBT + vat;

            document.getElementById('vat').value = vat.toFixed(2);
            document.getElementById('total').value = total.toFixed(2);
        }



        document.querySelectorAll('.item-qty, .item-disc').forEach(function(input) {
            input.addEventListener('input', function() {
                var row = this.closest('tr');
                updateRowTotals(row);
                calculateTotals();

            });
        });
        document.getElementById('nbtPercent').addEventListener('input', function() {
            calculateTotals();
        });

        document.getElementById('vatPercent').addEventListener('input', function() {
            calculateTotals();
        });
        document.addEventListener('change', function(event) {
            var target = event.target;
            if (target && target.classList.contains('item-select')) {
                var row = target.closest('tr');
                updateRowDetails(row);
            }
        });
        document.addEventListener('input', function(event) {
            var target = event.target;
            if (target && (target.classList.contains('item-qty') || target.classList.contains(
                    'item-disc'))) {
                var row = target.closest('tr');
                updateRowTotals(row);
            }
        });

        document.getElementById('addRowBtn').addEventListener('click', function() {
            var newRow = document.querySelector('#itemRows .item-row').cloneNode(true);
            newRow.querySelector('.item-select').selectedIndex = 0; // Reset item select
            newRow.querySelector('.item-description').value = ''; // Clear description
            newRow.querySelector('.item-qty').value = ''; // Clear qty
            newRow.querySelector('.item-rate').value = ''; // Clear rate
            newRow.querySelector('.item-amount').value = ''; // Clear amount
            newRow.querySelector('.item-disc').value = ''; // Clear discount
            newRow.querySelector('.item-discount').value = ''; // Clear discount amount
            newRow.querySelector('.item-total').value = ''; // Clear total

            document.getElementById('itemRows').appendChild(newRow);
        });

        document.getElementById('itemRows').addEventListener('click', function(event) {
            var target = event.target;
            if (target && target.classList.contains('delete-row')) {
                target.closest('tr').remove();
                calculateTotals();
            }
        });

        // Initial calculation for existing rows
        document.querySelectorAll('#itemRows .item-row').forEach(function(row) {
            updateRowDetails(row);
        });

        // Initial total calculation
        calculateTotals();
    });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>