extends('layouts.main')
@section('container')
    <h2>{{ $device["name"] }} ({{ $device["id"] }}) </h2>
    <a href="/devices">back to Devices </a>
@endsection
