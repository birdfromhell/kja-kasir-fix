@extends('layout.main')
@section('content')
<!-- content @s -->
<div class="nk-content">    
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">  
                <div class="nk-block-head nk-block-head-sm">     
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Daftar Kategori</h3>
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
                                            <a href="#" data-target="addProduct" class="toggle btn btn-icon btn-primary d-md-none">
                                                <em class="icon ni ni-plus"></em>
                                            </a>
                                            <a href="#" data-target="addProduct" class="toggle btn btn-primary d-none d-md-inline-flex">
                                                <em class="icon ni ni-plus"></em><span>Add New</span>
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
                                    <thead class="thead-light">
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
                                                            <li><a href="{{ url('perusahaan/edit') }}"><em class="icon ni ni-edit"></em> Edit</a></li>
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
                                                <button class="btn btn-primary btn-sm" onclick="window.location.href='{{ url('kategori/edit') }}'">
                                                    <em class="icon ni ni-edit"></em>
                                                </button>
                                                <form action="{{ url('/kategori/1') }}" method="POST" style="display: inline;">
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
                            <h5 class="nk-block-title">Tambah Kategori</h5>
                        </div>
                    </div>
                    <div class="nk-block">
                        <form action="{{ url('kategori/store') }}" method="POST"> <!-- Add form action -->
                            @csrf
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="kategori-barang">Kategori Barang</label>
                                        <input type="text" class="form-control" id="kategori-barang" name="kategori-barang" placeholder="Masukan Kategori Barang">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex justify-content-start mt-2">
                                        <button class="btn btn-primary me-2" type="submit">
                                            <em class="icon ni ni-plus"></em><span>Add New</span>
                                        </button>
                                        <button type="reset" class="btn btn-lg btn-danger" style="margin-left: 10px;">
                                            <em class="icon ni ni-refresh"></em> Reset
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- .nk-add-product -->
            </div>
        </div>
    </div>
</div>
<!-- content @e -->
@endsection