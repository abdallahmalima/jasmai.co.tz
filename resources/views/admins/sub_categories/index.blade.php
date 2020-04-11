@extends('layouts.apps_admin')

@section('content')

<div class="col-lg-9">
        
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header text-primary">All Sub-Categories</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           
            <div class="row">
                <div class="col-lg-9">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            
                             <a href="{{ route('admins.sub-category.create')}}"  class="pull-right btn btn-primary btn-sm">Add <span class="glyphicon glyphicon-plus"></span></a>
                             list of all Sub-Categories
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>TITLE</th>
                                        <th>ACTIONS</th>
                                      
                            
                                        
                                    </tr>
                                </thead>
                                  </tbody>
                                  @if($sub_categories->count()>0)
                                    @foreach($sub_categories as $sub_category)
                                    <tr>
                                        <td>{{ $sub_category->title }}</td>
                                        <td>
                                        <a href="{{ route('admins.sub-category.delete',$sub_category) }}"  class="btn btn-danger btn-md"><span class="glyphicon glyphicon-remove"></span></a>
                                        <a href="{{ route('admins.sub-category.edit',['id'=>$sub_category->id]) }}" class="btn btn-success btn-md"><span class="glyphicon glyphicon-edit"></span></a>
                                        </td>
                                        
                                    </tr>
                                    @endforeach

                                    @else
                                    <tr>
                                        <td colspan="4" class="text-primary text-center"><h3>No results found</h3></td>
                                    </tr>
                                    @endif
                                    
                                </tbody>
                            </table>
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