@extends('layouts.apps_admin')

@section('content')

<div class="col-lg-9">
        
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header text-primary">Gallery</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           
            <div class="row">
                <div class="col-lg-9">
                  
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            
                             <a href="{{ route('admins.gallary.create')}}"  class="pull-right btn btn-primary btn-sm">Add <span class="glyphicon glyphicon-plus"></span></a>
                             list of all Pictures In Gallaries
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                @foreach($gallaries as $gallary)
                                 <div class="col-lg-6">
                                 <img class="img-thumbnail" src="{{ asset($gallary->image) }}" />
                                 <div>
                                 <a href="{{ route('admins.gallary.delete',$gallary) }}"  class="btn btn-danger btn-md"><span class="glyphicon glyphicon-remove"></span></a>
                                 <a href="{{ route('admins.gallary.edit',['id'=>$gallary->id]) }}" class="btn btn-success btn-md"><span class="glyphicon glyphicon-edit"></span></a>
                                 </div>
                                 </div>
                                @endforeach
                              <span class="pull-right">
                            
                               </span>
                            </div >
                                </div >
                           
                        </div>

                        
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>

           
           
        </div>
      

    </div>


@endsection