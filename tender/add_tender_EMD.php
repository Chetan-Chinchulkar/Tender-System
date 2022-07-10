

<!DOCTYPE html>
<html>
    <!-- yes/no type for EMD -->
    <head>
    <title>Tender</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <link href="css/index.css" rel='stylesheet' type='text/css' />
    </head> 
    <body>
        <!-- yes/no form for EMD -->
        <form action="add_tender_EMD.php" method="POST">
            <div class="form-group">
                <label for="tender_EMD">Tender EMD</label>
                <select class="form-control" id="tender_EMD" name="tender_EMD">
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
            <!-- form input for EMD amount -->
            <div class="form-group">
                <label for="EMD_amount">EMD Amount</label>
                <input type="text" class="form-control" id="EMD_amount" name="EMD_amount" placeholder="EMD Amount">
            </div>
            <!-- form input for EMD in favour of -->
            <div class="form-group">
                <label for="EMD_in_favour_of">EMD In Favour of </label>
                <input type="text" class="form-control" id="EMD_in_favour_of" name="EMD_in_favour_of" placeholder="EMD In Favour Of">
            </div>
            <!-- form input for EMD mode of payment -->

            <script>
                var tender_EMD = document.getElementById("tender_EMD");
                var amount = document.getElementById("amount");
                var in_favour_of = document.getElementById("in_favour_of");
                var mode_of_payment = document.getElementById("mode_of_payment");
                var tender_EMD_div = document.getElementById("tender_EMD_div");
                var amount_div = document.getElementById("amount_div");
                var in_favour_of_div = document.getElementById("in_favour_of_div");
                var mode_of_payment_div = document.getElementById("mode_of_payment_div");
                var submit = document.getElementById("submit");
                var tender_EMD_option = document.getElementById("tender_EMD_option");
                var amount_option = document.getElementById("amount_option");
                var in_favour_of_option = document.getElementById("in_favour_of_option");
                var mode_of_payment_option = document.getElementById("mode_of_payment_option");
                var tender_EMD_option_div = document.getElementById("tender_EMD_option_div");
                var amount_option_div = document.getElementById("amount_option_div");
                var in_favour_of_option_div = document.getElementById("in_favour_of_option_div");
                var mode_of_payment_option_div = document.getElementById("mode_of_payment_option_div");
                var EMD_amount_option_div = document.getElementById("EMD_amount_option_div");
                var EMD_in_favour_of_option_div = document.getElementById("EMD_in_favour_of_option_div");
                var EMD_amount = document.getElementById("EMD_amount");
                var EMD_in_favour_of = document.getElementById("EMD_in_favour_of");
                
                tender_EMD.addEventListener("change", function(){
                    if(tender_EMD.value == "yes"){
                        tender_EMD_div.style.display = "block";
                        tender_EMD_option.style.display = "block";
                        tender_EMD_option_div.style.display = "block";
                        submit.style.display = "block";
                    }
                    else{
                        tender_EMD_div.style.display = "none";
                        tender_EMD_option.style.display = "none";
                        tender_EMD_option_div.style.display = "none";
                        submit.style.display = "none";
                    }
                });
                mode_of_payment.addEventListener("change", function(){
                    if(mode_of_payment.value == "online_rtgs"){
                        mode_of_payment_div.style.display = "block";
                        mode_of_payment_option.style.display = "block";
                        mode_of_payment_option_div.style.display = "block";
                        submit.style.display = "block";
                    }
                    else{
                        mode_of_payment_div.style.display = "none";
                        mode_of_payment_option.style.display = "none";
                        mode_of_payment_option_div.style.display = "none";
                        submit.style.display = "none";
                    }
                });
                amount.addEventListener("change", function(){
                    if(amount.value != ""){
                        amount_div.style.display = "block";
                        amount_option.style.display = "block";
                        amount_option_div.style.display = "block";
                        submit.style.display = "block";
                    }
                    else{
                        amount_div.style.display = "none";
                        amount_option.style.display = "none";
                        amount_option_div.style.display = "none";
                        submit.style.display = "none";
                    }
                });
                
            </script>

    </body>
</html>