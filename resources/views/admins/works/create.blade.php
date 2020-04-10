@extends('layouts.apps_admin')

@section('content')

<div class="col-lg-9">
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header text-primary">Add New Work Done Content</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-9">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <a href="{{ route('admins.works.index')}}"  class="pull-right btn btn-primary btn-sm"><i class="fa fa-bars fa-fw"></i></a>
                        Add New Work Done Content
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">

                                
                                    <form role="form" method="post" action="{{ route('admins.work.store')}}" enctype="multipart/form-data">
                                    	{{ csrf_field() }}
                                        
                                        <div class="form-group col-lg-6">
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

                                        <div class="form-group col-lg-6">
                                            <label for="sel1">Select Sub-Category Title</label>
                                            <select class="form-control" id="sel1" name="sub_category_id">
                                            <option >-----Select Sub-Category Here-----</option>
                                            @foreach($sub_categories as $sub_category)
                                                <option value="{{$sub_category->id}}">{{  $sub_category->title }}</option>
                                            @endforeach    
                                            </select>
                                            @if($errors->has('sub_category_id'))
                                              <div><small class="text-danger">*{{ $errors->first('sub_category_id') }}</small></div>
                                            @endif
                                        </div>


                                        <div class="form-group">
                                            <label>Select Work Done Image 1900x600 Pixels</label>
                                            <input class="form-control" type="file" id="imgInp" name="image"  accept="image/*" >
                                            <img class="img-thumbnail" id="blah" src="#" alt="your image"  />
                                            @if($errors->has('image'))
                                              <div><small class="text-danger">*{{ $errors->first('image') }}</small></div>
                                            @endif
                                            
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Enter Work Done Title</label>
                                            <input class="form-control"  name="title" value="{{ old('title') }}"   required>
                                            @if($errors->has('title'))
                                              <div><small class="text-danger">*{{ $errors->first('title') }}</small></div>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label>Enter Work Done Desciption</label>
                                            <textarea name="description"  class="form-control" rows="3" required="required"> {{ old('description') }} </textarea>
                    
                                            @if($errors->has('description'))
                                              <div><small class="text-danger">*{{ $errors->first('description') }}</small></div>
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