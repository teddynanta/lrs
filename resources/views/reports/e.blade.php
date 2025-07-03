@extends('layouts.index')
@section('content')
    <h2>Kategori Umur Pasien</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Umur</th>
                <th>Kategori</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $item)
                <tr>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->umur }}</td>
                    <td>{{ $item->kategori_umur }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
