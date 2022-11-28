<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Display All Borrowers</title>
    <style type="text/css">
    .roundedcorners {
        border-radius: 25px;
        background: #AACCAA;
        border: 2px solid #73AD21;
        padding: 20px;
        width: 70%;
        text-align: center;
        align: center;
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
        <h3><font color="red">{{ Session::get('msgpassed') }}</font></h3>
    @endif
        <h3>List of all borrowers</h3>
        <a href="{{ route('view_all') }}">Click for API version</a>
        <hr noshade size="1"/>

        <table border="1" cellpadding="5" cellspacing="0" width="100%" bordercolor="#73AD21">
            <tr>
                <th>Borrower id</th>
                <th>Name</th>
                <th>Loan application id</th>
                <th>Employed</th>
                <th>Annual income</th>
                <th>Bank AC</th>
                <th>Account no</th>
                <th>Profile created at</th>
                <th>Updated at</th>
                <th>Delete profile</th>
                <th>API end points</th>
            </tr>
            
            @foreach ($borrowers as $borrower)
            <tr>
                <td><a href="/edit_borrower/{{$borrower->id}}">{{$borrower->id}}</a></td>
                <td>{{$borrower->b_name}}</td>
                <td>{{$borrower->loan_appl_id}}</td>
                <td>{{$borrower->is_employed == 0 ? 'no':'yes'}}</td>
                <td>{{$borrower->annual_income == 0 ? 'N/A': $borrower->annual_income}}</td>
                <td>{{$borrower->has_bank == 0 ? 'no':'yes'}}</td>
                <td>{{$borrower->acc_no == 0 ? 'N/A':$borrower->acc_no}}</td>
                <td>{{$borrower->created_at}}</td>
                <td>{{$borrower->updated_at == '' ? 'Not yet updated' : $borrower->updated_at }}</td>
                <td>
                    <form action="{{ route('delete_borrower', $borrower->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" value="{{$borrower->id}}">
                        <input type="submit" value="Delete entry">
                    </form>
                </td>
                <td>
                    <a href="api/view_one/{{$borrower->id}}" target="_blank">API version</a>

                </td>
            </tr>
            @endforeach
        </table>



    </div>
    
</body>
</html>