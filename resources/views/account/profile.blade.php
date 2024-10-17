@extends('layout.app')
@section('content')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block">
                        <div class="card">
                            <div class="card-aside-wrap">
                                <div class="card-inner card-inner-lg">
                                    <div class="nk-block-head nk-block-head-lg">
                                        <div class="nk-block-between">
                                            <div class="nk-block-head-content">
                                                <h4 class="nk-block-title">Profile Dan Perusahaan</h4>
                                            </div>
                                            <div class="nk-block-head-content align-self-start d-lg-none">
                                                <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="nk-block" id="personalInfo">
                                        <!-- Personal Information Form -->
                                        <div class="nk-data data-list">
                                            <div class="data-head">
                                                <h6 class="overline-title">Basics</h6>
                                            </div>
                                            <form action="/akun-update/{{ Auth::user()->id }}" method="get" id="profile-form">
                                                @csrf
                                                <div class="data-item">
                                                    <div class="data-col">
                                                        <span class="data-label">Full Name</span>
                                                        <input type="text" class="form-control" name="name" value="{{ old('name', Auth::user()->name) }}">
                                                    </div>
                                                </div>
                                                <div class="data-item">
                                                    <div class="data-col">
                                                        <span class="data-label">Email</span>
                                                        <input type="email" class="form-control" name="email" value="{{ old('email', Auth::user()->email) }}">
                                                    </div>
                                                </div>
                                                <div class="data-item">
                                                    <div class="data-col">
                                                        <span class="data-label">Phone Number</span>
                                                        <input type="tel" class="form-control" name="phone" value="{{ old('phone', Auth::user()->phone) }}">
                                                    </div>
                                                </div>
                                                <div class="data-item">
                                                    <div class="data-col">
                                                        <span class="data-label">Date of Birth</span>
                                                        <input type="date" class="form-control" name="dob" value="{{ old('dob', Auth::user()->dob) }}">
                                                    </div>
                                                </div>
                                                <div class="data-item">
                                                    <div class="data-col">
                                                        <span class="data-label">Address</span>
                                                        <textarea class="form-control" name="address" rows="3">{{ old('address', Auth::user()->address) }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="data-item">
                                                    <div class="data-col">
                                                        <button type="submit" class="btn btn-primary">Update Profile</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="nk-block" id="accountSettings" style="display: none;">
                                        <!-- Account Settings Form -->
                                        <div class="iq-card-body">
                                            <form action="/perusahaan-update/{{ Auth::user()->perusahaan->id }}" method="get" id="company-form">
                                                @method('post')
                                                @csrf
                                                <div class="row align-items-center">
                                                    <div class="form-group col-sm-12">
                                                        <label for="kode_perusahaan">Kode Perusahaan:</label>
                                                        <input type="text" class="form-control" id="kode_perusahaan" name="kode_perusahaan" value="{{ Auth::user()->kode_perusahaan }}" readonly>
                                                    </div>
                                                    <div class="form-group col-sm-8">
                                                        <label for="nama_perusahaan">Nama Perusahaan:</label>
                                                        <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" value="{{ old('nama_perusahaan', Auth::user()->perusahaan->nama_perusahaan ?? 'Kururing') }}">
                                                    </div>
                                                    <div class="form-group col-sm-4">
                                                        <label for="jenis">Jenis:</label>
                                                        <input type="text" class="form-control" id="jenis" name="jenis" value="{{ Auth::user()->perusahaan->jenis ?? 'Kururing' }}" disabled>
                                                    </div>
                                                    <div class="form-group col-sm-12">
                                                        <label for="nama_pimpinan">Nama Pimpinan:</label>
                                                        <input type="text" class="form-control" id="nama_pimpinan" name="nama_pimpinan" value="{{ old('nama_pimpinan', Auth::user()->perusahaan->nama_pimpinan ?? 'Kururing') }}">
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label for="alamat_kantor">Alamat Kantor:</label>
                                                        <textarea class="form-control" id="alamat_kantor" name="alamat_kantor" rows="5" style="line-height: 22px;">{{ old('alamat_kantor', Auth::user()->perusahaan->alamat_kantor ?? 'Kururing') }}</textarea>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label for="alamat_gudang">Alamat Gudang:</label>
                                                        <textarea class="form-control" id="alamat_gudang" name="alamat_gudang" rows="5" style="line-height: 22px;">{{ old('alamat_gudang', Auth::user()->perusahaan->alamat_gudang ?? 'Kururing') }}</textarea>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary mr-2" id="informasipsf">Submit</button>
                                                <button type="reset" class="btn iq-bg-danger">Reset</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg" data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
                                    <div class="card-inner-group" data-simplebar>
                                        <div class="card-inner">
                                            <div class="user-card">
                                                <div class="user-avatar bg-primary">
                                                    <span>{{ substr(Auth::user()->name, 0, 2) }}</span>
                                                </div>
                                                <div class="user-info">
                                                    <span class="lead-text">{{ Auth::user()->name }}</span>
                                                    <span class="sub-text">{{ Auth::user()->email }}</span>
                                                </div>
                                                <div class="user-action">
                                                    <div class="dropdown">
                                                        <a class="btn btn-icon btn-trigger mr-n2" data-toggle="dropdown" href="#"><em class="icon ni ni-more-v"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <ul class="link-list-opt no-bdr">
                                                                <li><a href="#"><em class="icon ni ni-camera-fill"></em><span>Change Photo</span></a></li>
                                                                <li><a href="#"><em class="icon ni ni-edit-fill"></em><span>Update Profile</span></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-inner p-0">
                                            <ul class="link-list-menu">
                                                <li><a href="#" id="personalInfoLink" class="active"><em class="icon ni ni-user-fill-c"></em><span>Informasi Akun</span></a></li>
                                                <li><a href="#" id="accountSettingsLink"><em class="icon ni ni-setting-alt-fill"></em><span>Informasi Perusahaan</span></a></li>
                                                <li><a href="#" id="securitySettingsLink"><em class="icon ni ni-lock-alt-fill"></em><span>Ganti Password</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal for Change Password -->
        <div class="modal fade bd-example-modal-lg haiya" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/changePassword" method="POST" id="changePasswordForm">
                        @csrf
                        <div class="modal-body">
                            <label class="control-label col-sm-5 align-self-left mb-0" for="email">Old Password:</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="oldPassword" name="oldPassword" placeholder="Masukkan password lama" required>
                            </div>

                            <label class="control-label col-sm-5 align-self-left mb-0" for="email">New Password:</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Masukkan password baru" required onchange="validatePassword()">
                            </div>

                            <label class="control-label col-sm-5 align-self-left mb-0" for="email">Confirm Password:</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Konfirmasi Password baru" required onchange="validatePassword()">
                                <span id="passwordError" class="text-danger"></span>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="submitButton">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Profile form submission
            $('#profile-form').submit(function(event) {
                event.preventDefault();
                var formData = $(this).serialize();

                Swal.fire({
                    title: 'Warning',
                    text: "Are you sure you want to update your profile?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                    cancelButtonText: "Cancel"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'GET',
                            url: '/akun-update/{{ Auth::user()->id }}',
                            data: formData,
                            success: function(response) {
                                Swal.fire({
                                    title: 'Success',
                                    icon: 'success',
                                    text: 'Profile updated successfully!'
                                }).then(() => {
                                    location.reload();
                                });
                            },
                            error: function(xhr, status, error) {
                                Swal.fire({
                                    title: 'Error',
                                    text: 'Failed to update profile: ' + error,
                                    icon: 'error'
                                });
                            }
                        });
                    }
                });
            });

            // Company form submission
            $('#company-form').submit(function(event) {
                event.preventDefault();
                var formData = $(this).serialize();

                Swal.fire({
                    title: 'Warning',
                    text: "Are you sure you want to update company information?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                    cancelButtonText: "Cancel"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'GET',
                            url: '/perusahaan-update/{{ Auth::user()->perusahaan->id }}',
                            data: formData,
                            success: function(response) {
                                Swal.fire({
                                    title: 'Success',
                                    icon: 'success',
                                    text: 'Company information updated successfully!'
                                });
                            },
                            error: function(xhr, status, error) {
                                Swal.fire({
                                    title: 'Error',
                                    text: 'Failed to update company information: ' + error,
                                    icon: 'error'
                                });
                            }
                        });
                    }
                });
            });

            // Toggle between Personal Information and Account Settings
            $('#personalInfoLink').click(function(e) {
                e.preventDefault();
                $('#personalInfo').show();
                $('#accountSettings').hide();
                $(this).addClass('active');
                $('#accountSettingsLink').removeClass('active');
            });

            $('#accountSettingsLink').click(function(e) {
                e.preventDefault();
                $('#personalInfo').hide();
                $('#accountSettings').show();
                $(this).addClass('active');
                $('#personalInfoLink').removeClass('active');
            });

            // Show Change Password Modal
            $('#securitySettingsLink').click(function(e) {
                e.preventDefault();
                $('#exampleModal').modal('show');
            });

            // Handle Change Password Form Submission
            $(document).ready(function() {
                // Show Change Password Modal
                $('#securitySettingsLink').click(function(e) {
                    e.preventDefault();
                    $('#exampleModal').modal('show');
                });

                // Handle Change Password Form Submission
                $('#changePasswordForm').submit(function(event) {
                    event.preventDefault();
                    var formData = $(this).serialize();

                    Swal.fire({
                        title: 'Warning',
                        text: "Are you sure you want to change your password?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: "Yes",
                        cancelButtonText: "Cancel"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: 'POST',
                                url: '/changePassword',
                                data: formData,
                                success: function(response) {
                                    Swal.fire({
                                        title: 'Success',
                                        icon: 'success',
                                        text: 'Password changed successfully!'
                                    }).then(() => {
                                        $('#exampleModal').modal('hide');
                                    });
                                },
                                error: function(xhr, status, error) {
                                    var errorMessage = xhr.responseJSON.error || 'Failed to change password';
                                    Swal.fire({
                                        title: 'Error',
                                        text: errorMessage,
                                        icon: 'error'
                                    });
                                }
                            });
                        }
                    });
                });
            });
            function validatePassword() {
                var newPassword = document.getElementById('newPassword').value;
                var confirmPassword = document.getElementById('confirmPassword').value;
                var passwordError = document.getElementById('passwordError');

                if (newPassword !== confirmPassword) {
                    passwordError.textContent = 'Passwords do not match';
                    document.getElementById('submitButton').disabled = true;
                } else {
                    passwordError.textContent = '';
                    document.getElementById('submitButton').disabled = false;
                }
            }
        });
    </script>
@endsection
