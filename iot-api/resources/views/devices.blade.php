@extends('layouts.main')
@section('container')
  <h1>Devices</h1>
  @php
    $i = 1;
  @endphp
  <table border="1" cellspacing="0" cellpadding="8">
    <tr>
        <td style="border-right: 1px solid black; border-bottom: 1px solid black;">No</td>
        <td style="border-right: 1px solid black; border-bottom: 1px solid black;">ID</td>
        <td style="border-right: 1px solid black; border-bottom: 1px solid black;">Device Name</td>
        <td style="border-right: 1px solid black; border-bottom: 1px solid black;">Created At</td>
        <td style="border-bottom: 1px solid black;">Updated At</td>
    </tr>
    @foreach($devices as $device)
      <tr>
        <td style="border-right: 1px solid black; border-bottom: 1px solid black;">{{ $i }}</td>
        <td style="border-right: 1px solid black; border-bottom: 1px solid black;">
          <a href="/devices/{{ $device["id"] }}">{{ $device["id"] }}</a>
        </td>
        <td style="border-right: 1px solid black; border-bottom: 1px solid black;">{{ $device->nama_device }}</td>
        <td style="border-right: 1px solid black; border-bottom: 1px solid black;">{{ $device->created_at }}</td>
        <td style="border-bottom: 1px solid black;">{{ $device->updated_at }}</td>
      </tr>
      @php
        $i++;
      @endphp
    @endforeach
  </table>
@endsection
