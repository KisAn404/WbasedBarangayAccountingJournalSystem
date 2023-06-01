    @extends('layouts.app')
    @section('content')
    <!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/reports.css">
</head>
<body>
    <div class="container">
                <h3>Reports</h3>
                <table class="table table-bordered table-light" style="width: 125%;">
                    <thead class="thead" style="background: linear-gradient(to bottom right, #0D98BA, #074C5D); color:white;">
                        <tr>
                            <th>Report Name</th>
                            <th>Filter Date</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>Report of Collection and Deposit</td>
                            <td>
                                <form method="get" action="{{ route('RCD') }}">
                                    <div>
                                        <label for="start_date">Start Date:</label>
                                        <input type="date" id="start_date" name="start_date" required>
                                
                                        <label for="end_date">End Date:</label>
                                        <input type="date" id="end_date" name="end_date" required>
                                        <button type="submit" style="float:right; border-radius: 5px; border: 1px solid #ccc; box-shadow: 5px 5px 5px #999;">View reports</button>
                                    </div>
                                    
                                    @csrf
                                </form>
                            </td>
                        </tr>
    
                         <tr>
                            <td>REAI</td>
                            <td>
                                <form method="get" action="{{ route('REAI') }}">
                                <label for="month">Select month:</label>
                                <select name="month" id="month">
                                        <option value="01">January</option>
                                        <option value="02">February</option>
                                        <option value="03">March</option>
                                        <option value="04">April</option>
                                        <option value="05">May</option>
                                        <option value="06">June</option>
                                        <option value="07">July</option>
                                        <option value="08">August</option>
                                        <option value="09">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                </select>
                                        <label for="year">Select year:</label>
                                        <select name="year" id="year">
                                         @for ($i = date('Y'); $i >= 2000; $i--)
                                         <option value="{{ $i }}">{{ $i }}</option>
                                         @endfor
                                </select>
                                <button type="submit" style="float:right; border-radius: 5px; border: 1px solid #ccc; box-shadow: 5px 5px 5px #999;">View reports</button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>Transmittal Letter</td>
                            <td>
                            <form method="get" action="{{ route('TL') }}">
                            <label for="month">Select month:</label>
                            <select name="month" id="month">
                                        <option value="01">January</option>
                                        <option value="02">February</option>
                                        <option value="03">March</option>
                                        <option value="04">April</option>
                                        <option value="05">May</option>
                                        <option value="06">June</option>
                                        <option value="07">July</option>
                                        <option value="08">August</option>
                                        <option value="09">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                </select>
                                        <label for="year">Select year:</label>
                                        <select name="year" id="year">
                                        @for ($i = date('Y'); $i >= 2000; $i--)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                </select>
                                <button type="submit" style="float:right; border-radius: 5px; border: 1px solid #ccc; box-shadow: 5px 5px 5px #999;">View reports</button>
                                </form>
                            </td>
                        </tr>
    
                        <tr>
                            <td>Cashbook</td>
                            <td>
                            <form method="get" action="{{ route('CB') }}">
                            <label for="month">Select month:</label>
                            <select name="month" id="month">
                                        <option value="01">January</option>
                                        <option value="02">February</option>
                                        <option value="03">March</option>
                                        <option value="04">April</option>
                                        <option value="05">May</option>
                                        <option value="06">June</option>
                                        <option value="07">July</option>
                                        <option value="08">August</option>
                                        <option value="09">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                             </select>
    
                                        <label for="year">Select year:</label>
                                         <select name="year" id="year">
                                        @for ($i = date('Y'); $i >= 2000; $i--)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                             </select>
                             <button type="submit" style="float:right; border-radius: 5px; border: 1px solid #ccc; box-shadow: 5px 5px 5px #999;">View reports</button>
                                </form>
                            </td>
                        </tr>
    
                        <tr>
                            <td>Summary of Checks Issued</td>
                            <td>
                            <form method="get" action="{{ route('SCKI') }}">
                            <label for="month">Select month:</label>
                            <select name="month" id="month">
                                        <option value="01">January</option>
                                        <option value="02">February</option>
                                        <option value="03">March</option>
                                        <option value="04">April</option>
                                        <option value="05">May</option>
                                        <option value="06">June</option>
                                        <option value="07">July</option>
                                        <option value="08">August</option>
                                        <option value="09">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                            </select>
                            <label for="year">Select year:</label>
                            <select name="year" id="year">
                                         @for ($i = date('Y'); $i >= 2000; $i--)
                                         <option value="{{ $i }}">{{ $i }}</option>
                                         @endfor
                                </select>
                                <button type="submit" style="float:right; border-radius: 5px; border: 1px solid #ccc; box-shadow: 5px 5px 5px #999;">View reports</button>
                                </form>
                            </td>
                        </tr>
    
                        <tr>
                            <td>Report of Accountability for Accountable Forms</td>
                            <td>
                            <form method="get" action="{{ route('RAAF') }}">
                                    <label for="month">Select month:</label>
                                    <select name="month" id="month">
                                        <option value="01">January</option>
                                        <option value="02">February</option>
                                        <option value="03">March</option>
                                        <option value="04">April</option>
                                        <option value="05">May</option>
                                        <option value="06">June</option>
                                        <option value="07">July</option>
                                        <option value="08">August</option>
                                        <option value="09">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                    <label for="year">Select year:</label>
                                    <select name="year" id="year">
                                        @for ($i = date('Y'); $i >= 2000; $i--)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                    <button type="submit" style="float:right; border-radius: 5px; border: 1px solid #ccc; box-shadow: 5px 5px 5px #999;">View reports</button>
                                    </form>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
</body>
@endsection
</html>





