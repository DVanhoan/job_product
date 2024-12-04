@extends('layouts.app')
@section('layout-holder')
  @include('inc.navbar')
  <div>
    @yield('content')
  </div>
@endsection
