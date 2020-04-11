@extends('layouts.apps_admin')

@section('content')

<div class="col-lg-9">
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header text-primary">Edit Header Content</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-9">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <a href="{{ route('admins.headers.index')}}"  class="pull-right btn btn-primary btn-sm"><i class="fa fa-bars fa-fw"></i></a>
                        Edit Header Content
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">

                                
                                    <form role="form" method="post" action="{{ route('admins.header.update',['id'=>$header->id])}}" enctype="multipart/form-data">
                                    	{{ csrf_field() }}
                                        <div class="form-group">
                                            <label>Update Header Image 1900x600 Pixels</label>
                                            <input class="form-control" type="file" id="imgInp" name="image"  accept="image/*" >
                                            <img class="img-thumbnail" id="blah" src="{{ asset($header->image)}}" alt="your image"  />
                                            @if($errors->has('image'))
                                              <div><small class="text-danger">*{{ $errors->first('image') }}</small></div>
                                            @endif
                                            
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Edit Header Title</label>
                                            <input class="form-control" value="{{$header->title}}"  name="title"  required>
                                            @if($errors->has('title'))
                                              <div><small class="text-danger">*{{ $errors->first('title') }}</small></div>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label>Edit Header Desciption</label>
                                            <textarea name="description"  class="form-control" rows="3" required="required">{{$header->description}}</textarea>
                    
                                            @if($errors->has('description'))
                                              <div><small class="text-danger">*{{ $errors->first('description') }}</small></div>
                                            @endif
                                        </div>

                                        
                                       
                                       <div class="form-group text-center">
                                        <button  
                                         type="submit" class="btn btn-primary btn-md  pad-space"><span class="glyphicon glyphicon-edit"></span> Update</button>
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