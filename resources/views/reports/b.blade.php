@extends('layouts.index')
@section('content')
    <h2>Data Semua Dokter dan Transaksi Tahun 2015</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Dokter</th>
                <th>Jumlah Transaksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $doctor)
                <tr>
                    <td>{{ $doctor->nama }}</td>
                    <td>{{ $doctor->receipts->count() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
