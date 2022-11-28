<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Borrower Profile</title>
    <style type="text/css">
    .roundedcorners {
        border-radius: 25px;
        background: #AACCAA;
        border: 2px solid #73AD21;
        padding: 20px;
        width: 500px;
        position: absolute;
        top: 50%;
        left: 50%;
        -moz-transform: translateX(-50%) translateY(-50%);
        -webkit-transform: translateX(-50%) translateY(-50%);
        transform: translateX(-50%) translateY(-50%);
    }
    </style>
    <script>
        function showHideBank() {
        // Get the checkbox
        var hasABank = document.getElementById("hasBank");
        // Get the output text
        var div_bank = document.getElementById("div_bank");

        // If the checkbox is checked, display the output text
            if (hasABank.checked == true){
                div_bank.style.display = "block";
            } else {
                div_bank.style.display = "none";
            }
        }

        function showHideIncome() {
        // Get the checkbox
        var checkBox = document.getElementById("hasAJob");
        // Get the output text
        var div_income = document.getElementById("div_income");

        // If the checkbox is checked, display the output text
            if (checkBox.checked == true){
                div_income.style.display = "block";
            } else {
                div_income.style.display = "none";
            }
        }
    </script>
</head>
<body>

    
    <div class="roundedcorners">
    @if ( Session::has('msgpassed'))
        <h3><font color="red">{{ Session::get('msgpassed') }}</font></h3>
    @endif
    
        <form action="{{ route('store_borrower') }}" method="post">
            @csrf
            <input type="text" name="b_name" placeholder="Full Name"> : Name of the borrower<hr/>
            <input type="text" name="loan_appl_id" placeholder="Bank assigned id"> : Loan Application Number<hr/>
            
            <input type="checkbox" id="hasAJob" name="is_employed" value="1" onclick="showHideIncome()"> : Has a job?<hr/>
            <div id="div_income" style="display:none"><input type="text" name="annual_income" placeholder="Annual Net Salary"> : Borrower's Annual Income<hr/></div>
            
            <input type="checkbox" id="hasBank" name="has_bank" value="1" onclick="showHideBank()"> : Check if borrower has a bank account<hr/>
            <div id="div_bank" style="display:none"><input type="text" name="acc_no" placeholder="Account Number"> : Borrower's Bank AC Number<hr/></div>
            <input type="submit" value="Create Borrower Profile">
        </form>
    </div>
    
</body>
</html>