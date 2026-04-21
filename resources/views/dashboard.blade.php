@extends('layouts.admin')

@section('title')
  {{ __('Dashboard') }}
@endsection

@section('header')
  <h1 class="h3 mb-3"><strong>Employee</strong> Dashboard</h1>
@endsection

@section('content')
  @php
      $employee = \App\Models\Employee::where('email', Auth::user()->email)->first();
  @endphp
  
  <div class="row">
    <div class="col-12">
        <div class="card flex-fill">
            <div class="card-header">
                <h5 class="card-title mb-0">Welcome back, {{ Auth::user()->name }}!</h5>
            </div>
            <div class="card-body">
                @if($employee)
                    <p>You are officially enrolled as an Employee!</p>
                    <ul>
                        <li><strong>Department:</strong> {{ $employee->department->title ?? 'N/A' }}</li>
                        <li><strong>Designation:</strong> {{ $employee->designation->title ?? 'N/A' }}</li>
                        <li><strong>Attendance Records:</strong> {{ $employee->attendances()->count() }} days</li>
                        <li><strong>Leaves Requested:</strong> {{ $employee->leaves()->count() }}</li>
                    </ul>
                @else
                    You are logged in as an Employee, but your HR record hasn't been fully set up yet!
                @endif
            </div>
        </div>
    </div>
  </div>
@endsection
