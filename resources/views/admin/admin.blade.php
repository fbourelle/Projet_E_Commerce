@extends('welcome')

@section('content')
  <h1>Admin</h1>
  <button class="mini ui button" disabled>
    Manage Categories
  </button>
  <button class="mini ui button" disabled>
    Manage Tags
  </button>
  <button class="mini ui button" disabled>
    Manage sizes
  </button>
  <button class="mini ui button" disabled>
    Manage colors
  </button>
  <button class="mini ui button" disabled>
    Manage products
  </button>
  <button class="mini ui button" disabled>
    Manage users
  </button>
  <button class="mini ui button" disabled>
    Manage orders
  </button>
  <button class="mini ui button" disabled>
    Manage status
  </button>
  @yield('products')

@stop
