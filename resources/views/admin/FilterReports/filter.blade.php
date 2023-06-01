<!-- resources/views/report.blade.php -->
 <div class="card">
    <div class="card-body"style="background-color: rgb(2, 175, 202)">
<form method="get" action="{{ route('RCD') }}">
    
    <div>
        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date" name="start_date" required>
    </div>
    <div>
        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" name="end_date" required>
    </div>
    <button type="submit">Generate Report</button>
    </form>
    </div>
 </div>

 
