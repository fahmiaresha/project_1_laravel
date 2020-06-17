@extends('master/customer/template')
@section('title','Ubah Password')
@section('konten')

@if(session('current_password_tidak_cocok'))
      <font size="4"> 
      <script>
     Swal.fire({
          timer: 2000,
          icon: 'error',
          title: 'Oops',
          text: 'Current Password Tidak Cocok !',
        })
    </script>
    </font>
@endif

@if(session('password_baru_lama_sama'))
      <font size="4"> 
      <script>
     Swal.fire({
          timer: 2000,
          icon: 'error',
          title: 'Oops',
          text: 'Password Lama Dan Baru Tidak Boleh Sama !',
        })
    </script>
    </font>
@endif

@if(session('password_konfirmasipassword_tdk_cocok'))
      <font size="4"> 
      <script>
     Swal.fire({
          timer: 2000,
          icon: 'error',
          title: 'Oops',
          text: 'Password Baru Dan Konfirmasi Password Tidak Cocok !',
        })
    </script>
    </font>
@endif


@if(session('password_sukses_diubah'))
      <font size="4"> 
      <script>
     Swal.fire({
          timer: 2000,
          icon: 'success',
          title: 'Success',
          text: 'Password Berhasil Di Ubah !',
        })
    </script>
    </font>
@endif

<div class="animate__animated animate__fadeInUp"  style=" animation-duration: 3s;">
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                    <strong><font size="5" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">Update Password</font></strong>
                    
                    @php $z=Session::get('id') @endphp
                      
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/updatepassword">
                            <!-- @method('patch') -->
                            @csrf
                            <input type="hidden" name="id" value="{{$z}}"> <br/>
                            
                    <div class="form-group row" style="margin-top:-40px;" >
                        <label for="current_password" class="col-md-4 col-form-label text-md-left" style="margin-top: -25px;"><font size="4" style="font-family: Arial, Helvetica, sans-serif;">Current Password</font></label>

                        <div class="col-md-6 input-group" id="show_hide_password2">
                            <input id="current_password" type="password" placeholder="Current Password" class="form-control @error('current_password') is-invalid @enderror" name="current_password">
                            <div class="input-group-append" style="padding-bottom: 15px;">
                                <span class="input-group-text"><a href=""><i class="fa fa-eye" aria-hidden="true" style=" color:#333"></i> </a></span>
                                </div>
                            
                            @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong><font size="2">{{ $message }}</font></strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-left" style="margin-top: -25px;"><font size="4" style="font-family: Arial, Helvetica, sans-serif;">New Password</font></label>
                                <div class="col-md-6 input-group" id="show_hide_password">
                                <input id="password" type="password" placeholder="New Password" class="form-control @error('password') is-invalid @enderror" name="password" >
                                <div class="input-group-append" style="padding-bottom: 15px;">
                                <span class="input-group-text"><a href=""><i class="fa fa-eye" aria-hidden="true" style=" color:#333"></i> </a></span>
                                </div>
                               

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong><font size="2">{{ $message }} </font></strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-left" style="margin-top: -25px;"><font size="4" style="font-family: Arial, Helvetica, sans-serif;">Confirm Password</font></label>

                                <div class="col-md-6 input-group"  id="show_hide_password3">
                                    <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control  @error('password_confirmation') is-invalid @enderror" name="password_confirmation">
                                    <div class="input-group-append" style="padding-bottom: 15px;">
                                    <span class="input-group-text"><a href=""><i class="fa fa-eye" aria-hidden="true" style=" color:#333"></i> </a></span>
                                    </div>
                                    @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong><font size="2">{{ $message }} </font></strong>
                                        </span>
                                    @enderror
                                </div>

                                
                                
                            </div>

                   

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update Password
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('tambahscript')
<script>
$(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }
    });

    $("#show_hide_password2 a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password2 input').attr("type") == "text"){
            $('#show_hide_password2 input').attr('type', 'password');
            $('#show_hide_password2 i').addClass( "fa-eye-slash" );
            $('#show_hide_password2 i').removeClass( "fa-eye" );
        }else if($('#show_hide_password2 input').attr("type") == "password"){
            $('#show_hide_password2 input').attr('type', 'text');
            $('#show_hide_password2 i').removeClass( "fa-eye-slash" );
            $('#show_hide_password2 i').addClass( "fa-eye" );
        }
    });

    $("#show_hide_password3 a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password3 input').attr("type") == "text"){
            $('#show_hide_password3 input').attr('type', 'password');
            $('#show_hide_password3 i').addClass( "fa-eye-slash" );
            $('#show_hide_password3 i').removeClass( "fa-eye" );
        }else if($('#show_hide_password3 input').attr("type") == "password"){
            $('#show_hide_password3 input').attr('type', 'text');
            $('#show_hide_password3 i').removeClass( "fa-eye-slash" );
            $('#show_hide_password3 i').addClass( "fa-eye" );
        }
    });

});
</script>

@endsection