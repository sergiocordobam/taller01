@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="https://laravel.com/img/logotype.min.svg" class="img-fluid rounded-start">
    </div>
    <div class="col-md-8">
      <div class="card-body">
           <strong>Order id:</strong> {{ $viewData["orders"]["id"] }}
      </div>
      <div class="card-body">
           <strong>Order date:</strong> {{ $viewData["orders"]["date"] }}
      </div>
      <div class="card-body">
           <strong>Order total:</strong> {{ $viewData["orders"]["total"] }}
      </div>
      <div class="card-body">
           <form method="POST" action="{{ route('orders.delete', ['id'=> $viewData['orders']['id']]) }}">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id" value="{{ $viewData["orders"]["id"] }}" />
                <input type="submit" class="btn btn-primary" value="Delete" />
           </form>
      </div>
    </div>
  </div>
</div>
@endsection
