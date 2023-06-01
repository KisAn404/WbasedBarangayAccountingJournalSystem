@extends('layouts.app')
@section('content')
<head>
<link rel="stylesheet" href="css/fundstyle.css">
</head>
<div class="container">
<div class="row" style="margin-top: 15px;">
<div class="button">
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-fund-modal">
    Add Fund
</button>
        {{-- @php
            $current_year = date('Y');
            $restrict_year = request()->query('year');
        @endphp
        @if ($restrict_year)
            <a class="btn btn-danger"  href="{{ route('fund.index') }}">Unrestrict</a>
        @else
            <a class="btn btn-danger" href="{{ route('fund.index', ['year' => $current_year]) }}">Restrict based on {{ $current_year }}</a>
        @endif --}}
    </div>
</div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-hover text-center" style="width: 120%;">
    <thead class="thead" >
        <tr>
            <th style="width: 120px;">Fund No.</th>
            <th>Source of Fund</th>
            <th>Amount</th>
            <th width="150px">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($funds as $fund)
            <tr class="body">
                <td>{{ $fund->id }}</td>
                <td>{{ $fund->src_of_fund }}</td>
                <td>{{ $fund->amount }}</td>
                <td>
            {{-- @if ($restrict_year)
                @if (strtotime($fund->created_at) + (365*24*60*60) >= time())
                    <p>Editing and deleting restricted.</p>
                @else --}}
                    {{-- <form action="{{ route('fund.destroy', $fund->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('fund.edit', $fund->id) }}">
                    </a>

                        <button type="submit" class="btn btn-danger">Delete</button> --}}
                    {{-- </form> --}}
                {{-- @endif --}}
            {{-- @else --}}
                <form action="{{ route('fund.destroy', $fund->id) }}" method="POST">
                  <a class="btn" data-bs-toggle="modal" data-bs-target="#editModal-{{ $fund->id }}" href="#">
                    <i class="fas fa-pencil-alt" style="font-size: 15px;"></i>
                </a>
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#myModal{{ $fund->id }}"><i class="fas fa-trash-alt" style="font-size: 10px;"></i></button>

                </form>
            {{-- @endif --}}

            
  
<!--Delete Modal -->

<div class="modal fade" id="myModal{{ $fund->id }}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Confirm Deletion</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body ">
        Are you sure you want to delete this item?
      </div>
      <div class="modal-footer">
        <form action="{{ route('fund.destroy', $fund->id) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal-{{ $fund->id }}" tabindex="-1" aria-labelledby="editModalLabel-{{ $fund->id }}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header">
              <header>
                  <h5 class="modal-title" id="editModalLabel-{{ $fund->id }}">Edit funds</h5>
              </header>
          </div>
          <div class="modal-body">
              <form action="{{ route('fund.update', $fund->id) }}" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                              <strong>Source of Fund</strong>
                              <input type="text" name="src_of_fund" value="{{ $fund->scr_of_fund }}" class="form-control" placeholder="">
                          </div>
                      </div>
                  </div>
               
                  <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                              <strong>Amount</strong>
                              <input type="text" name="amount" value="{{ $fund->amount}}" class="form-control" placeholder="">

<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">Save changes</button>
</div>
</form>
</div>
</div>
</div>



  
    </td>
    </tr>
    </tbody>
@endforeach

<tfoot>
  <tr>
    <td colspan="3" class="text-right"><strong>Total:</strong></td>
    <td colspan="3" class="text-left text-center">₱{{ number_format($totalFunds, 2, '.', ',') }}</td>

  </tr>
</tfoot>
  </table>
  {{ $funds->links('custom-pagination') }}
</div>
@include('fund.create')
@endsection
