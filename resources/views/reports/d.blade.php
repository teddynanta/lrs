@extends('layouts.index')
@section('content')
    <h2>10 Jenis Obat Paling Banyak Digunakan Tahun 2015</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Obat</th>
                <th>Total Penggunaan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $item)
                <tr>
                    <td>{{ $item->keterangan }}</td>
                    <td>{{ $item->total_qty }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
