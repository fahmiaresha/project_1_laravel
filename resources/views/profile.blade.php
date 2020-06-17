@extends('master/customer/template')
@section('title','Halaman Profile')
@section('konten')

@if(session('update_sukses'))
      <font size="4"> 
      <script>
     Swal.fire({
          timer: 2000,
          icon: 'success',
          title: 'Success',
          text: 'Profile Berhasil Di Update !',
        })
    </script>
    </font>
@endif
<div class="animate__animated animate__fadeInUp"  style=" animation-duration: 3s;">
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
               
                @php $z=Session::get('id') @endphp


                    @foreach($user as $d)
                    @if($d->user_id == $z)
                    <div class="card-header">
                    <center><i class="far fa-id-badge fa-2x"></i></center>
                    <center><strong><font size="5" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">Profile Admin</font></strong></center>   
                    </div>
                    <div class="card-body">
                    <form method="POST" action="/updateprofile">
                            <!-- @method('patch') -->
                            @csrf
                            <input type="hidden" name="id" value="{{$z}}">
                           
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-left" style="margin-top: -25px;"><font size="4" style="font-family: Arial, Helvetica, sans-serif;">First Name</font></label>

                        <div class="col-md-6 input-group">
                            <input type="text" name="first_name" id="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{$d->first_name2}}" readonly>
                            @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong><font size="2">{{ $message }} </font></strong>
                                        </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-left" style="margin-top: -25px;"><font size="4" style="font-family: Arial, Helvetica, sans-serif;">Last Name</font></label>

                        <div class="col-md-6 input-group">
                            <input type="text" name="last_name" id="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{$d->last_name}}" readonly>
                            @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong><font size="2">{{ $message }} </font></strong>
                                        </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-left" style="margin-top: -25px;"><font size="4" style="font-family: Arial, Helvetica, sans-serif;">Email</font></label>

                        <div class="col-md-6 input-group">
                            <input  type="email" name ="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{$d->email}}" readonly> 
                            @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong><font size="2">{{ $message }} </font></strong>
                                        </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-left" style="margin-top: -25px;"><font size="4" style="font-family: Arial, Helvetica, sans-serif;">Telepon</font></label>

                        <div class="col-md-6 input-group">
                            <input  type="number" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{$d->phone}}" readonly>
                            @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong><font size="2">{{ $message }} </font></strong>
                                        </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-left" style="margin-top: -25px;"><font size="4" style="font-family: Arial, Helvetica, sans-serif;">Job Status</font></label>

                        <div class="col-md-6 input-group">
                            <input  type="text" name="job_status" id="job_status" class="form-control @error('job_status') is-invalid @enderror" value="{{$d->job_status}}" readonly>
                            @error('job_status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong><font size="2">{{ $message }} </font></strong>
                                        </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-left" style="margin-top: -25px;"><font size="4" style="font-family: Arial, Helvetica, sans-serif;">Password</font></label>

                        <div class="col-md-6 input-group">
                            <input  type="password" class="form-control" value="{{$d->password}}" readonly>
                        </div>

                        <div class="col-md-2 input-group">
                        <a href="/ubahpassword" target="_blank"><font size="2">Ubah Pasword</font></a>
                        </div>
                        
                    </div>
                    
                         

                    @endif
                    @endforeach

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" id="tombol" class="btn btn-primary" onclick="edit()">
                                        Edit Profile
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
    $("#tombol").click(function(event) { 
                event.preventDefault(); 
    }); 
    


    function edit(){
        document.getElementById("first_name").readOnly=false;
        document.getElementById("last_name").readOnly=false;
        document.getElementById("email").readOnly=false;
        document.getElementById("phone").readOnly=false;
 
         ganti_tombol();

    }

    function ganti_tombol(){
        document.getElementById("tombol").innerHTML='Update Profile';
        $("#tombol").removeClass("btn btn-primary");
        $("#tombol").addClass("btn btn-success update");
        $("#tombol").attr('id','tombol_update');
        $("#tombol_update").attr("onclick","update()");
    }

        function update(){
            $("form").submit();            
    }

   

   

</script>

@endsection