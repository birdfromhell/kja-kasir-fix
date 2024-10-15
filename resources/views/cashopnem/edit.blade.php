@extends('layout.main')
@section('content')
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block nk-block-lg">
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h5 class="card-title">Cash Opnem</h5>
                        </div>
                    </div>
                    <div class="row g-gs">
                        <div class="col-lg-6">
                            <div class="card h-100">
                                <div class="card-inner">
                                    <form action="#">
                                        <div class="form-group">
                                            <label class="form-label" for="pecahan">Pecahan</label>
                                            <select class="form-control" id="pecahan" name="pecahan" onchange="showHidePlafon()">
                                                <option selected disabled>Silahkan Pilih Pecahan</option>
                                                <option value="Supplier">Supplier</option>
                                                <option value="Konsumen">Konsumen</option>
                                            </select>
                                        </div>
                                    
                                        <div class="form-group">
                                            <label class="form-label" for="kertas">Kertas</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="kertas"placeholder=" ">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="logam">Logam</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="logam"placeholder=" ">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="jumlah">Jumlah </label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="jumlah"placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="total">Total</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="total"placeholder=" ">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-lg btn-primary">Update</button>
                                            <button type="reset" class="btn btn-lg btn-danger" style="margin-left: 10px;">
                                                <em class="icon ni ni-refresh"></em> Reset
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Komponen lain tetap tidak berubah -->
            </div>
        </div>
    </div>
</div>
@endsection
