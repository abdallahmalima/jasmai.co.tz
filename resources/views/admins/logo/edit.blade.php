@extends('layouts.apps_admin')

@section('content')

<div class="col-lg-9">
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header text-primary">Logo Details</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-9">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Website Logo
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">

                                
                                    <form role="form" method="post" action="{{ route('admins.logo.update')}}" enctype="multipart/form-data">
                                    	{{ csrf_field() }}
                                        <div class="form-group">
                                            <label>Upload Logo 200x45 Pixels</label>
                                            <input class="form-control" type="file" id="imgInp" name="logo"  accept="image/*" >
                                            <img class="img-thumbnail" id="blah" src="{{ asset($logo->logo)}}" alt="your image"  />
                                            @if($errors->has('logo'))
                                              <div><small class="text-danger">*{{ $errors->first('logo') }}</small></div>
                                            @endif
                                            
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Edit Logo Text</label>
                                            <input class="form-control"  name="logo_text" value="{{$logo->logo_text}}" required>
                                            @if($errors->has('logo_text'))
                                              <div><small class="text-danger">*{{ $errors->first('logo_text') }}</small></div>
                                            @endif
                                        </div>

                                        
                                       
                                       <div class="form-group text-center">
                                        <button  
                                         type="submit" class="btn btn-primary btn-md  pad-space">Update</button>
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

$(document).ready(function(){
 
   // $("#blah").hide();
 
});
    
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]);
            }
            }

            $("#imgInp").change(function() {
              readURL(this);
             $("#blah").show();
            });
    </script>

@endsection