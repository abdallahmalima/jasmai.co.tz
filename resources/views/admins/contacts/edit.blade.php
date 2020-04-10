@extends('layouts.apps_admin')

@section('content')

<div class="col-lg-9">
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header text-primary">Contacts Details</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-9">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Contacts Details
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">

                                
                                    <form role="form" method="post" action="{{ route('admins.contact.update')}}" enctype="multipart/form-data">
                                    	{{ csrf_field() }}
                                        
                                        
                                        <div class="form-group">
                                            <label>Edit Contacts Description</label>
                                            <input class="form-control"  name="description" value="{{$contact->description}}" required>
                                            @if($errors->has('description'))
                                              <div><small class="text-danger">*{{ $errors->first('description') }}</small></div>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label>Edit  Address</label>
                                            <input class="form-control"  name="address" value="{{$contact->address}}" required>
                                            @if($errors->has('address'))
                                              <div><small class="text-danger">*{{ $errors->first('address') }}</small></div>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label>Edit  Email</label>
                                            <input class="form-control"  name="email" value="{{$contact->email}}" required>
                                            @if($errors->has('email'))
                                              <div><small class="text-danger">*{{ $errors->first('email') }}</small></div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Edit Phone Number 1</label>
                                            <input class="form-control"  name="phone1" value="{{$contact->phone1}}" required>
                                            @if($errors->has('phone1'))
                                              <div><small class="text-danger">*{{ $errors->first('phone1') }}</small></div>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label>Edit Phone Number 2</label>
                                            <input class="form-control"  name="phone2" value="{{$contact->phone2}}" required>
                                            @if($errors->has('phone2'))
                                              <div><small class="text-danger">*{{ $errors->first('phone2') }}</small></div>
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