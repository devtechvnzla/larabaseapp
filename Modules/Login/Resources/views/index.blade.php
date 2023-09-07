@extends('layouts/admin')

@section('title', 'LOGINS')

@section('content')
@include('sweetalert::alert')
  <div>
    @livewire('logins')
 </div>
@endsection
