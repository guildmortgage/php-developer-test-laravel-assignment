<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Borrower Profile</title>
    <style type="text/css">
    .roundedcorners {
        border-radius: 25px;
        background: #AACCAA;
        border: 2px solid #73AD21;
        padding: 20px;
        width: 40%;
        position: absolute;
        top: 50%;
        left: 50%;
        -moz-transform: translateX(-50%) translateY(-50%);
        -webkit-transform: translateX(-50%) translateY(-50%);
        transform: translateX(-50%) translateY(-50%);
    }
    </style>
</head>
<body>

    
    <div class="roundedcorners">
    @if ( Session::has('msgpassed'))
        <h3><font color="red">{{ Session::get('msgpassed') }}</h3></font>
    @else
    <h3><font color="navy">Update the profile of {{ $borrowers->b_name }} / {{ $borrowers->id }}</h3><h4>The system generated user id <i>{{ $borrowers->id }}</i> is for internal use and cannot be modified.</h4></font>       
    @endif
        <form action="{{ route('update_borrower', $borrowers->id) }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $borrowers->id }}">
            <input type="text" name="b_name" value="{{ $borrowers->b_name }}"> : Name of the borrower<hr size="1" color="#73AD21" noshade/>
            <input type="text" name="loan_appl_id" value="{{ $borrowers->loan_appl_id }}"> : Loan Application Number<hr size="1" color="#73AD21" noshade/>
            
            <input type="checkbox" name="is_employed" {{ $borrowers->is_employed == 1 ? 'checked value=1' : ' value=1'}}> : Has a job?<hr size="1" color="#73AD21" noshade/>
            <input type="text" name="annual_income" value="{{ $borrowers->annual_income }}"> : Borrower's Annual Income<hr size="1" color="#73AD21" noshade/>
            
            <input type="checkbox" id="hasBank" name="has_bank" {{ $borrowers->has_bank == 1 ? 'checked value=1' : ' value=1'}}> : Check if borrower has a bank account<hr size="1" color="#73AD21" noshade/>
            <input type="text" name="acc_no" value="{{ $borrowers->acc_no }}"> : Borrower's Bank AC Number<hr size="1" color="#73AD21" noshade/>
            Creation date : <b>{{ $borrowers->created_at }}</b><hr size="1" color="#73AD21" noshade/>
            Updated on <b>{{$borrowers->updated_at == '' ? 'Not yet updated' : $borrowers->updated_at }}</b><hr size="1" color="#73AD21" noshade/>

            <input type="submit" value="Update Borrower Profile">
        </form>
    </div>
    
</body>
</html>