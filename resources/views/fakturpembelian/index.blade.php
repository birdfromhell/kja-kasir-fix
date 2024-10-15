@extends('layout.main')
@section('content')
<!-- content @s -->
<div class="nk-content ">    
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">  
                <div class="nk-block-head nk-block-head-sm">     
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Daftar Faktur Pembelian</h3>
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
                                            <th style="background-color: #d3d3d3; color: #000000;">#</th>
                                            <th style="background-color: #d3d3d3; color: #000000;">ID FB Beli</th>
                                            <th style="background-color: #d3d3d3; color: #000000;">ID FB Barang</th>
                                            <th style="background-color: #d3d3d3; color: #000000;">Tanggal</th>
                                            <th style="background-color: #d3d3d3; color: #000000;">Detail FB</th>
                                            <th style="background-color: #d3d3d3; color: #000000;">Keterangan</th>                                 
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
                            <h5 class="nk-block-title">Tambah Barang</h5>
                        </div>
                    </div>
                    <div class="nk-block">
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="nama-barang">Nama Barang</label>
                                    <input type="text" class="form-control" id="nama-barang" name="nama-barang" placeholder="Masukkan Nama Barang">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="satuan">Satuan</label>
                                    <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Masukkan Satuan">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="kategori">Kategori</label>
                                    <select class="form-control" id="kategori" name="kategori">
                                        <option selected disabled>Silahkan Pilih Kategori</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="kelompok-barang">Kelompok Barang</label>
                                    <select class="form-control" id="kelompok-barang" name="kelompok-barang">
                                        <option selected disabled>Pilih Kategori Terlebih Dahulu</option>
                                    </select>
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
