@extends('layouts.index')
@section('content')
    <h2>Pasien Perempuan umur 19 – 30, Agustus 2015</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Umur</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $patient)
                <tr>
                    <td>{{ $patient->nama }}</td>
                    <td>{{ $patient->umur }}</td>
                    <td>{{ $patient->jenis_kelamin }}</td>
                    <td>{{ $patient->alamat }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
