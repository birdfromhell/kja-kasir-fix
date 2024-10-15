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
                            <h3 class="nk-block-title page-title">Daftar Buku Besar</h3>
                        </div>
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu">
                                    <em class="icon ni ni-more-v"></em>
                                </a>
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
                                            <div class="drodown">
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
                                            <a href="#" data-target="addProduct" class="toggle btn btn-icon btn-primary d-md-none" style="margin-right: 16px;" onclick="showAddBukuBesar(event)">
                                                <em class="icon ni ni-plus"></em>
                                            </a>
                                            <a href="#" data-target="addProduct" class="toggle btn btn-primary d-none d-md-inline-flex" style="margin-right: 16px;" onclick="showAddBukuBesar(event)">
                                                <em class="icon ni ni-plus"></em>
                                                <span>Buku Besar</span>
                                            </a>
                                            <a href="#" data-target="addSubBuku" class="toggle btn btn-primary d-none d-md-inline-flex" onclick="showAddSubBukuBesar(event)">
                                                <em class="icon ni ni-plus"></em>
                                                <span>Sub Buku Besar</span>
                                            </a>
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
                                    <tr style="background-color: #d3d3d3; color: #000000;">
                                        <th style="background-color: #d3d3d3; color: #000000;">#</th>
                                        <th style="background-color: #d3d3d3; color: #000000;">Kode Perusahaan</th>
                                        <th style="background-color: #d3d3d3; color: #000000;">Kategori Barang</th>                                
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
                                            <td>
                                                <button class="btn btn-primary btn-sm" onclick="window.location.href='{{ url('barang/edit') }}'">
                                                    <em class="icon ni ni-edit"></em>
                                                </button>
                                                <form action="{{ url('/perusahaan/1') }}" method="POST" style="display: inline;">
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

                <!-- Form Tambah Buku Besar -->
                <div class="nk-add-product toggle-slide toggle-slide-right" data-content="addProduct" data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true" data-simplebar style="display: none;">
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h5 class="nk-block-title">Tambah Buku Besar</h5>
                        </div>
                    </div>
                    <div class="nk-block">
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="tipe">Tipe</label>
                                    <select class="form-control" id="tipe" name="tipe">
                                        <option selected disabled></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="no-buku-besar">No Buku Besar</label>
                                    <input type="text" class="form-control" id="no-buku-besar" name="no-buku-besar" placeholder="Masukan No Buku Besar">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="keterangan">Keterangan</label>
                                    <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan Keterangan">
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary">
                                    <em class="icon ni ni-plus"></em><span>Add New</span>
                                </button>
                                <button type="button" class="btn btn-lg btn-danger" style="margin-left: 5px;" onclick="resetBukuBesar()">
                                    <em class="icon ni ni-refresh"></em> Reset
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Tambah Sub Buku Besar -->
                <div class="nk-add-product toggle-slide toggle-slide-right" data-content="addSubBuku" data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true" data-simplebar style="display: none;">
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h5 class="nk-block-title">Tambah Sub Buku Besar</h5>
                        </div>
                    </div>
                    <div class="nk-block">
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="akun-buku-besar">Akun Buku Besar</label>
                                    <select class="form-control" id="akun-buku-besar" name="akun-buku-besar">
                                        <option selected disabled></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="no-sub-buku-besar">No Sub Buku Besar</label>
                                    <input type="text" class="form-control" id="no-sub-buku-besar" name="no-sub-buku-besar" placeholder="Masukkan No Sub Buku Besar">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="keterangan-sub">Keterangan</label>
                                    <input type="text" class="form-control" id="keterangan-sub" name="keterangan-sub" placeholder="Masukkan Keterangan">
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary">
                                    <em class="icon ni ni-plus"></em><span>Add New Sub Buku</span>
                                </button>
                                <button type="button" class="btn btn-lg btn-danger" style="margin-left: 5px;" onclick="resetSubBukuBesar()">
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

<script>
    function showAddBukuBesar(event) {
        event.preventDefault();
        document.querySelector('[data-content="addProduct"]').style.display = 'block';
        document.querySelector('[data-content="addSubBuku"]').style.display = 'none';
    }

    function showAddSubBukuBesar(event) {
        event.preventDefault();
        document.querySelector('[data-content="addSubBuku"]').style.display = 'block';
        document.querySelector('[data-content="addProduct"]').style.display = 'none';
    }

    function resetBukuBesar() {
        document.getElementById('tipe').selectedIndex = 0;
        document.getElementById('no-buku-besar').value = '';
        document.getElementById('keterangan').value = '';
    }

    function resetSubBukuBesar() {
        document.getElementById('akun-buku-besar').selectedIndex = 0;
        document.getElementById('no-sub-buku-besar').value = '';
        document.getElementById('keterangan-sub').value = '';
    }
</script>
<!-- content @e -->
@endsection
