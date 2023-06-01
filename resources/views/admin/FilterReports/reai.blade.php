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

  <button type="submit">Filter</button>
</form>


 
