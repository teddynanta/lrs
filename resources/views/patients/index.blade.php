@extends('layouts.index')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Umur</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($patients as $patient)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $patient->nama }}</td>
                    <td>{{ $patient->alamat }}</td>
                    <td>{{ $patient->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                    <td>{{ $patient->umur }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
