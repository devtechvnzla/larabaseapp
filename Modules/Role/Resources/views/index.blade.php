@extends('layouts.admin')
@section('title','ROLES')
@section('content')
@include('sweetalert::alert')
   @livewire('roles')
@endsection
