@extends('layouts.apps_admin')

@section('content')

<div class="col-lg-9">
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header text-primary">Add New Sub-Category Content</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-9">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <a href="{{ route('admins.sub-categories.index')}}"  class="pull-right btn btn-primary btn-sm"><i class="fa fa-bars fa-fw"></i></a>
                        Add New Sub-Category Content
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">

                                
                                    <form role="form" method="post" action="{{ route('admins.sub-category.store')}}" enctype="multipart/form-data">
                                    	{{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="sel1">Select Category Title</label>
                                            <select class="form-control" id="sel1" name="category_id">
                                            <option >-----Select Category Here-----</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{  $category->title }}</option>
                                            @endforeach    
                                            </select>
                                            @if($errors->has('category_id'))
                                              <div><small class="text-danger">*{{ $errors->first('category_id') }}</small></div>
                                            @endif
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Enter Sub-Category Title</label>
                                            <input class="form-control"  name="title" value="{{ old('title') }}"   required>
                                            @if($errors->has('title'))
                                              <div><small class="text-danger">*{{ $errors->first('title') }}</small></div>
                                            @endif
                                        </div>

                                       
                                       
                                       <div class="form-group text-center">
                                        <button  
                                         type="submit" class="btn btn-primary btn-md  pad-space"><span class="glyphicon glyphicon-plus"></span> Add</button>
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
 
    $("#blah").hide();
 
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