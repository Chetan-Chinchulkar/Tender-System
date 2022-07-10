


<!DOCTYPE html>
<!-- form for yes/no in tender fee -->
<html>
    <head>
        <title>Tender</title>
    </head>
    <body>
        <form action="add_tender_fee.php" method="POST">
            <div class="form-group">
                <label for="tender_fee">Tender Fee</label>
                <select class="form-control" id="tender_fee" name="tender_fee">
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>
            <!-- form inputs for mode of payment as Online RTGS,DD,Online Portal-->
            <div class="form-group">
                <label for="mode_of_payment">Mode of Payment</label>
                <select class="form-control" id="mode_of_payment" name="mode_of_payment">
                    <option value="online_rtgs">Online RTGS</option>
                    <option value="dd">DD</option>
                    <option value="online_portal">Online Portal</option>
                </select>
            </div>
            <!-- form input for amount -->
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount">
            </div>
            <!-- form input for in favour of -->
            <div class="form-group">
                <label for="in_favour_of">In Favour Of</label>
                <input type="text" class="form-control" id="in_favour_of" name="in_favour_of" placeholder="In Favour Of">
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <!-- script to display Yes or No according to selected option  -->
        <script>
            var tender_fee = document.getElementById("tender_fee");
            var amount = document.getElementById("amount");
            var in_favour_of = document.getElementById("in_favour_of");
            var mode_of_payment = document.getElementById("mode_of_payment");
            var tender_fee_div = document.getElementById("tender_fee_div");
            var amount_div = document.getElementById("amount_div");
            var in_favour_of_div = document.getElementById("in_favour_of_div");
            var mode_of_payment_div = document.getElementById("mode_of_payment_div");
            var submit = document.getElementById("submit");
            var tender_fee_option = document.getElementById("tender_fee_option");
            var amount_option = document.getElementById("amount_option");
            var in_favour_of_option = document.getElementById("in_favour_of_option");
            var mode_of_payment_option = document.getElementById("mode_of_payment_option");
            var tender_fee_option_div = document.getElementById("tender_fee_option_div");
            var amount_option_div = document.getElementById("amount_option_div");
            var in_favour_of_option_div = document.getElementById("in_favour_of_option_div");

            tender_fee.addEventListener("change", function() {
                if (tender_fee.value == "yes") {
                    tender_fee_div.style.display = "block";
                    tender_fee_option.style.display = "block";
                    tender_fee_option_div.style.display = "block";
                } else {
                    tender_fee_div.style.display = "none";
                    tender_fee_option.style.display = "none";
                    tender_fee_option_div.style.display = "none";
                }
            });

            amount.addEventListener("change", function() {
                if (amount.value == "yes") {
                    amount_div.style.display = "block";
                    amount_option.style.display = "block";
                    amount_option_div.style.display = "block";
                } else {
                    amount_div.style.display = "none";
                    amount_option.style.display = "none";
                    amount_option_div.style.display = "none";
                }
            });

            mode_of_payment.addEventListener("change", function() {
                if (mode_of_payment.value == "online_rtgs") {
                    mode_of_payment_div.style.display = "block";
                    mode_of_payment_option.style.display = "block";
                } else {
                    mode_of_payment_div.style.display = "none";
                    mode_of_payment_option.style.display = "none";
                }
            });
        </script>
    </body>
</html>