@extends('layouts.adminnew')

@section('content')
<div id="content">
    <div class="panel box-shadow-none content-header">
        <div class="panel-body">
            <div class="col-md-12">
                <h3 class="animated fadeInLeft">Sosmed</h3>
                <p class="animated fadeInDown">CMS<span class="fa-angle-right fa"></span>Sosmed<span class="fa-angle-right fa"></span>Edit</p>
            </div>
        </div>
    </div>
    <div class="col-md-12 top-20 padding-0">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading"><h3>Data Sosmed</h3></div>
                <div class="panel-body">
                    <div class="responsive-table">
                        @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    	<form method="POST" action="{{url('/admin/sosmed/'.$sosmed_data->id.'/edit')}}"  enctype="multipart/form-data">
						{{ csrf_field() }}
	                        <table class="table">                     
	                            <tr>
                                    <td>Title</td>
                                    <td><textarea class="form-control" id="" rows="" name="title">{!! $sosmed_data->title !!}</textarea></td>
                                </tr> 
                                <tr>
                                    <td>Subtitle</td>
                                    <td><textarea class="form-control" id="" rows="" name="subtitle">{!! $sosmed_data->subtitle !!}</textarea></td>
                                </tr> 

								<tr>
									<td></td>
									<td>
										<input class="btn btn-info" name="submit" value="Submit" type="submit" style="padding: 5px;">
										<a class="btn btn-danger" href="{{url('/admin/sosmed')}}"  style="padding: 5px; text-decoration: none;">Back</a>
									</td>
								</tr>
	                        </table>
	                        <input type="hidden" name="_method" value="PUT">
	                    </form>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>
@endsection

@section('header')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
@endsection

@section('scripts')
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
<script>
    $(document).ready(function() {
  $('#summernote').summernote();
});
</script>
@endsection