@extends('layouts/admin')

@section('title', 'AGENCIAS')

@section('content')
@include('sweetalert::alert')
  <div>
    @livewire('agencias')
 </div>
@endsection
