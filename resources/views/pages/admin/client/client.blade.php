@extends('layouts.adminnew')

@section('content')
<div id="content">
    <div class="panel box-shadow-none content-header">
        <div class="panel-body">
            <div class="col-md-12">
                <h3 class="animated fadeInLeft">Client</h3>
                <p class="animated fadeInDown">CMS<span class="fa-angle-right fa"></span>Client</p>
            </div>
        </div>
    </div>
    <div class="col-md-12 top-20 padding-0">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading"><h3>Data Client</h3>  
                	 <a href="{{url('/admin/client/input')}}"><button type="button" style="margin-bottom: 10px;" class="btn btn-success">Add Data</button></a> 
                </div>
                <div class="panel-body">
                    <div class="responsive-table">
                        <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">                        
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Created Date</th>
                                    <th>Created By</th>
                                    <th>Modified Date</th>
                                    <th>Modified By</th>
                                    <th style="width: 25%;">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $no = 1; ?>
                                @foreach($clients as $client)
                                <tr>    
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $client->title }}</td>
                                    <td>{{ $client->created_at }}</td>
                                    <td>{{ $client->created_by }}</td>
                                    <td>{{ $client->updated_at }}</td>
                                    <td>{{ $client->updated_by }}</td>
                                    <td style="float: left;">
                                        <a href="{{url('/admin/client/'.$client->id.'/edit')}}" style="padding-left: 10px;"><button type="button" class="btn btn-warning">Edit</button></a>
                                        <form method="POST" action="{{url('/admin/client/'.$client->id.'/delete')}}" class="text-center" style="float: right; padding-left: 10px;">
                                            <!-- csrf perlu ditambahakan di setiap post -->
                                            {{ csrf_field() }}
                                            <input class="btn btn-danger" type="submit" name="delete" value="Delete" onclick="return confirm('Are you sure want to delete caption {{ $client->title }}?');">
                                            <input type="hidden" name="_method" value="DELETE">
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>
@endsection