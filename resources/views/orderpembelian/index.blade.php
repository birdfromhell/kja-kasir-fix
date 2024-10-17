@extends('layout.app')
@section('content')
<!-- content @s -->
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Daftar Purchase Order</h3>
                        </div>
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li>
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-right">
                                                    <em class="icon ni ni-search"></em>
                                                </div>
                                                <input type="text" class="form-control" id="default-04" placeholder="Search">
                                            </div>
                                        </li>
                                        <li>
                                            <div class="dropdown">
                                                <a href="#" class="btn btn-outline-primary">Print</a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="#"><span>Item Baru</span></a></li>
                                                        <li><a href="#"><span>Unggulan</span></a></li>
                                                        <li><a href="#"><span>Stok Habis</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nk-block-tools-opt">
                                            <a href="#" data-target="addProduct" class="toggle btn btn-icon btn-primary d-md-none"><em class="icon ni ni-plus"></em></a>
                                            <a href="#" data-target="addProduct" class="toggle btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em><span>Add New</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-inner-group">
                            <div class="card-inner p-0">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr style="background-color: #d3d3d3; color: #000000;">
                                            <th style="background-color: #d3d3d3; color: #000000;">No</th>
                                            <th style="background-color: #d3d3d3; color: #000000;">ID PO</th>
                                            <th style="background-color: #d3d3d3; color: #000000;">Nama User</th>
                                            <th style="background-color: #d3d3d3; color: #000000;">Tanggal PO</th>
                                            <th style="background-color: #d3d3d3; color: #000000;">Nama Supplier</th>
                                            <th style="background-color: #d3d3d3; color: #000000;">Detail PO</th>
                                            <th style="background-color: #d3d3d3; color: #000000;">Jumlah Barang</th>
                                            <th style="background-color: #d3d3d3; color: #000000;">Total Harga</th>
                                            <th style="background-color: #d3d3d3; color: #000000;">Status</th>
                                            <th style="background-color: #d3d3d3; color: #000000;">Jatuh Tempo</th>
                                            <th style="background-color: #d3d3d3; color: #000000;">Aksi</th>
                                            <th style="width: 50px; background-color: #d3d3d3; color: #000000;">
                                                <div class="dropdown" style="display: flex; align-items: center;">
                                                    <button class="btn btn-icon btn-trigger dropdown-toggle" data-toggle="dropdown" style="padding: 0;">
                                                        <em class="icon ni ni-more-v" style="transform: rotate(90deg);"></em>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li><a href="{{ url('barang/edit') }}"><em class="icon ni ni-edit"></em> Edit</a></li>
                                                            <li><a href="#"><em class="icon ni ni-trash"></em> Delete</a></li>
                                                            <li><a href="#"><em class="icon ni ni-file-text"></em> Print</a></li>
                                                            <li><a href="#"><em class="icon ni ni-download"></em> Download</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>001</td>
                                            <td>Contoh Barang</td>
                                            <td>pcs</td>
                                            <td>Kategori A</td>
                                            <td>Kelompok A</td>
                                            <td>Sistem A</td>
                                            <td>Phisik A</td>
                                            <td>Maret</td>

                                            <td>0</td>
                                            <td>
                                                <button class="btn btn-primary btn-sm" onclick="window.location.href='{{ url('barang/edit') }}'">
                                                    <em class="icon ni ni-edit"></em>
                                                </button>
                                                <form action="{{ url('/barang/1') }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Anda yakin ingin menghapus?')">
                                                        <em class="icon ni ni-trash"></em>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nk-add-product toggle-slide toggle-slide-right" data-content="addProduct" data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h5 class="nk-block-title">Input Pembelian</h5>
                        </div>
                    </div>
                    <div class="nk-block">
                        <div class="row g-3">
                            <div class="col-md-6"> <!-- Kolom untuk tanggal -->
                                <div class="form-group mb-0"> <!-- Menghapus margin bawah untuk sejajar -->
                                    <label class="form-label" for="id-purchase-order">ID Purchase Order</label>
                                    <input type="date" class="form-control" id="id-purchase-order" name="id-purchase-order">
                                </div>
                            </div>

                            <div class="col-md-6"> <!-- Kolom kosong di samping kolom tanggal -->
                                <div class="form-group mb-0"> <!-- Menghapus margin bawah untuk sejajar -->
                                    <label class="form-label" for="harga-beli"></label>
                                    <input type="text" class="form-control" id="harga-beli" name="harga-beli" placeholder="Masukkan Harga Beli">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="nama-suplier">Nama Suplier</label>
                                    <input type="text" class="form-control" id="nama-suplier" name="nama-suplier" placeholder="Masukkan Nama suplier">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="barang-yang-terpilih">Barang Yang Terpilih</label>
                                    <input type="text" class="form-control" id="barang-yang-terpilih" name="barang-yang-terpilih" placeholder="Masukkan Barang Yang Terplih">

                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="kelompok-barang">Kelompok Barang</label>
                                    <select class="form-control" id="kelompok-barang" name="kelompok-barang">
                                        <option selected disabled>Pilih Jatuh Tempo Yang Sudah Ada Sebelumnya</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6"> <!-- Kolom untuk tanggal -->
                                <div class="form-group mb-0"> <!-- Menghapus margin bawah untuk sejajar -->
                                    <label class="form-label" for="tanggal">Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal">
                                </div>
                            </div>

                            <div class="col-md-6"> <!-- Kolom kosong di samping kolom tanggal -->
                                <div class="form-group mb-0"> <!-- Menghapus margin bawah untuk sejajar -->
                                    <label class="form-label" for="harga-beli">Harga Beli</label>
                                    <input type="text" class="form-control" id="harga-beli" name="harga-beli" placeholder="Masukkan Harga Beli">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="harga-beli">Harga Beli</label>
                                    <input type="text" class="form-control" id="harga-beli" name="harga-beli" placeholder="Masukkan Harga Beli">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="perusahaan">Perusahaan</label>
                                    <select class="form-control" id="perusahaan" name="perusahaan">
                                        <option selected disabled></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary">
                                    <em class="icon ni ni-plus"></em><span>Add New</span>
                                </button>
                                <button type="button" class="btn btn-lg btn-danger" style="margin-left: 5px;" onclick="resetForm()">
                                    <em class="icon ni ni-refresh"></em> Reset
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- content @e -->

<script>
    function resetForm() {
        document.getElementById('nama-barang').value = '';
        document.getElementById('satuan').value = '';
        document.getElementById('kategori').selectedIndex = 0;
        document.getElementById('kelompok-barang').selectedIndex = 0;
        document.getElementById('harga-beli').value = '';
        document.getElementById('perusahaan').selectedIndex = 0;
    }

    function showHidePlafon() {
        const kategori = document.getElementById('kategori').value;
        // Add logic if you need to show/hide plafon fields based on kategori
    }
</script>
@endsection
