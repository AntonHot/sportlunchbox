@extends('layouts.app')

@section('content')
<div class="container">
    Привет, {{ $user->name }}!
</div>
@endsection
