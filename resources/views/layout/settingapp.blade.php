@extends('layout.app')

@section('content')
    <div id="content-page" class="content-page" style="margin-top: 75px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Setting Aplikasi</h4>
                            </div>
                        </div>
                        <div class="iq-card-body" style="margin-top: 20px">
                            <div class="acc-privacy">
                                <div class="data-privacy">
                                    <form class="form-horizontal" action="/setting/set/{{ auth()->user()->id }}" method="GET" id="settingForm">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-sm-5">
                                                <select class="form-control" id="debit" name="debit" required>
                                                    <option value="" selected disabled>Silahkan pilih akun debit</option>
                                                    @foreach ($akuns as $items)
                                                        <option value="-" disabled>
                                                            <strong>{{ $items->no_bukubesar }} - {{ $items->ket }}</strong>
                                                        </option>
                                                        @foreach ($items->subBukuBesar as $akun)
                                                            <option value="{{ $akun->no_subbukubesar }}">
                                                                &nbsp;&nbsp;&nbsp;&nbsp;{{ $akun->no_subbukubesar }} - {{ $akun->ket }}
                                                            </option>
                                                        @endforeach
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-5">
                                                <select class="form-control" id="kredit" name="kredit" required>
                                                    <option value="" selected disabled>Silahkan pilih akun kredit</option>
                                                    @foreach ($akuns as $items)
                                                        <option value="-" disabled>
                                                            <strong>{{ $items->no_bukubesar }} - {{ $items->ket }}</strong>
                                                        </option>
                                                        @foreach ($items->subBukuBesar as $akun)
                                                            <option value="{{ $akun->no_subbukubesar }}">
                                                                &nbsp;&nbsp;&nbsp;&nbsp;{{ $akun->no_subbukubesar }} - {{ $akun->ket }}
                                                            </option>
                                                        @endforeach
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" id="submitAplikasi" class="btn btn-primary">Lanjut</button>
                                            <button type="reset" id="resetAplikasi" class="btn iq-bg-danger">Reset</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $('#submitAplikasi').click(function(event) {
                event.preventDefault();
                var user_id = <?php echo json_encode(auth()->user()->id); ?>;
                var akun_kredit = $('#kredit').val();
                var akun_debit = $('#debit').val();

                var formData = {
                    _token: csrfToken,
                    user_id: user_id,
                    akun_kredit: akun_kredit,
                    akun_debit: akun_debit,
                };

                var method = 'GET'; // Changed method to POST
                var action = 'Setting akun';
                var url = '/setting/set/' + user_id;

                Swal.fire({
                    title: 'warning',
                    title: "Apakah anda yakin?",
                    showCancelButton: true,
                    confirmButtonText: "Yakin",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: method,
                            url: url,
                            data: formData,
                            success: function(response) {
                                Swal.fire({
                                    title: 'Success',
                                    icon: 'success',
                                    text: 'Berhasil' +
                                        action + ' dengan id : ' +
                                        user_id // Added space before action
                                });
                                setTimeout(() => {
                                    location.reload();
                                }, 2000);
                            },
                            error: function(xhr, status, error) {
                                Swal.fire({
                                    title: 'Error',
                                    text: 'Gagal untuk set akun: ' +
                                        'terjadi kesalahan',
                                    icon: 'error'
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>

@endsection
