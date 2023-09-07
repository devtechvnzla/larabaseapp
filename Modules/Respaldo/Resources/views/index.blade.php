@extends('layouts/admin')

@section('title', 'RESPALDO')

@section('content')
@include('sweetalert::alert')
  <div>
    @livewire('respaldos')
 </div>
@endsection
