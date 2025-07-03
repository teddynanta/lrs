@extends('layouts.index')
@section('content')
    <h2>Jumlah dan Total Uang Per Obat (Agustus - Desember 2015)</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Obat</th>
                <th>Jumlah</th>
                <th>Total Uang</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $item)
                <tr>
                    <td>{{ $item->keterangan }}</td>
                    <td>{{ $item->total_qty }}</td>
                    <td>Rp {{ number_format($item->total_uang, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
