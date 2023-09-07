@extends('layouts/admin')

@section('title', 'TRAZAS DE LOS USUARIOS')

@section('content')
@include('sweetalert::alert')
  <div>
    @livewire('logs')
 </div>
@endsection
