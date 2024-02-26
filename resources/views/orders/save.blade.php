@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div class="text-center">
    <div class="row">
        <div class="created">
            <p class="lead">{{ $viewData["description"] }}</p>
        </div>
    </div>
</div>
@endsection