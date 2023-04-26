@extends('layouts.sidenavbar')

@section('content')
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/CoAstyle.css">
</head>
<body>
<div class="container">
    <h2 class="my-header">CHART OF ACCOUNTS</h2>
    <div class="table">
        <div class="pull-right">
            <form action="{{ route('account.index') }}" method="GET">
                @csrf
                <select name="acc_type" id="acc-type-select">
                    <option value="">All Account Types</option>
                    <option value="Assets" {{ $accountType === 'Assets' ? 'selected' : '' }}>Assets</option>
                    <option value="Liabilities" {{ $accountType === 'Liabilities' ? 'selected' : '' }}>Liabilities</option>
                    <option value="Equity" {{ $accountType === 'Equity' ? 'selected' : '' }}>Equity</option>
                    <option value="Revenue" {{ $accountType === 'Revenue' ? 'selected' : '' }}>Revenue</option>
                    <option value="Expenses" {{ $accountType === 'Expenses' ? 'selected' : '' }}>Expenses</option>
                </select>
            </form>
        </div>
    </div>
    <form action="{{ route('account.index') }}" method="GET">
        @csrf
        <div class="form-group">
            <input type="text" name="search" class="form-control" placeholder="Search...">
        </div>
    </form>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered table-light"  style="width: 120%;">
    <thead class="thead" >
            <tr>
                <th class="text-center">Account No.</th>
                <th class="text-center">Account Title</th>
                <th class="text-center">Account Code</th>
                <th class="text-center">Account Category</th>
                <th class="text-center">Account Type</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($accounts as $account)
                <tr>
                    <td class="text-center">{{ $account->id }}</td>
                    <td class="text-center">{{ $account->acc_title }}</td>
                    <td class="text-center">{{ $account->acc_code }}</td>
                    <td class="text-center">{{ $account->acc_category }}</td>
                    <td class="text-center">{{ $account->acc_type }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('scripts')
<script>
var select = document.getElementById("acc-type-select");
select.addEventListener("change", function(event) {
var selectedValue = event.target.value;
window.location.href = "{{ route('account.index') }}?acc_type=" + selectedValue;
});
</script>
@endsection
</body>
</html>