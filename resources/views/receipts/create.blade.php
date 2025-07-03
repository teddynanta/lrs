@extends('layouts.index')
@section('content')
    <form action="{{ route('lrs.store') }}" method="POST">
        @csrf
        <div class="container mt-3">
            <h4>Data Pasien</h4>
            <div class="mb-3">
                <label for="namapasien" class="form-label">Nama Pasien</label>
                <input type="text" name="patient[nama]" placeholder="Nama Pasien" required class="form-control"
                    id="namapasien" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="alamatpasien" class="form-label">Alamat Pasien</label>
                <input type="text" name="patient[alamat]" placeholder="Alamat" required class="form-control"
                    id="alamatpasien" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="jeniskelamin" class="form-label">Jenis Kelamin Pasien</label>
                <select id="jeniskelamin" class="form-select" name="patient[jenis_kelamin]">
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="umurpasien" class="form-label">Umur Pasien</label>
                <input type="number" name="patient[umur]" placeholder="Umur" required id="umurpasien" class="form-control"
                    aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="penanggung" class="form-label">Penanggung Pasien</label>
                <input type="text" name="patient[penanggung]" placeholder="Penanggung (opsional)" id="penanggung"
                    class="form-control" aria-describedby="emailHelp">
            </div>


            <h4>Data Nota</h4>
            <div class="mb-3">
                <label for="nomornota" class="form-label">Nomor Nota</label>
                <input type="text" name="nomor_nota" placeholder="Nomor Nota" required id="nomornota"
                    class="form-control" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="tanggalperiksa" class="form-label">Tanggal Periksa</label>
                <input type="date" name="tanggal_periksa" required id="tanggalperiksa" class="form-control"
                    aria-describedby="emailHelp">
            </div>

            <h4>Obat / Tindakan</h4>
            <div id="items">
                <div class="item mt-3">
                    <label for="ket" class="form-label">Nama Obat/Tindakan</label>
                    <input id="ket" type="text" class="form-control" name="items[0][keterangan]"
                        placeholder="Nama Obat/Tindakan">
                    <label for="harga" class="form-label">Harga Satuan</label>
                    <input id="harga" type="number" class="form-control" name="items[0][harga_satuan]"
                        placeholder="Harga Satuan">
                    <label for="qty" class="form-label">Qty</label>
                    <input id="qty" type="number" class="form-control" name="items[0][qty]" placeholder="Qty">
                </div>
            </div>
            <button type="button" class="btn btn-success mt-3" onclick="addItem()">+ Tambah Item</button>
            <br><br>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>

    <script>
        let itemIndex = 1;

        function addItem() {
            const html = `
        <div class="item mt-3">
            <label for="ket" class="form-label">Nama Obat/Tindakan</label>
            <input id="ket" type="text" class="form-control" name="items[${itemIndex}][keterangan]" placeholder="Nama Obat/Tindakan">
            <label for="harga" class="form-label">Harga Satuan</label>
            <input id="harga" type="number" class="form-control" name="items[${itemIndex}][harga_satuan]" placeholder="Harga Satuan">
            <label for="qty" class="form-label">Qty</label>
            <input id="qty" type="number" class="form-control" name="items[${itemIndex}][qty]" placeholder="Qty">
        </div>`;
            document.getElementById('items').insertAdjacentHTML('beforeend', html);
            itemIndex++;
        }
    </script>
@endsection
