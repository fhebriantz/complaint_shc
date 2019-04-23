@extends('layouts.adminnew')

@section('content')
<div id="content">
    <div class="panel box-shadow-none content-header">
        <div class="panel-body">
            <div class="col-md-12">
                <h3 class="animated fadeInLeft">Portfolio</h3>
                <p class="animated fadeInDown">CMS<span class="fa-angle-right fa"></span>Portfolio<span class="fa-angle-right fa"></span>Edit</p>
            </div>
        </div>
    </div>
    <div class="col-md-12 top-20 padding-0">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading"><h3>Data Portfolio</h3></div>
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
                    	<form method="POST" action="{{url('/admin/portfolio/'.$portfolio_data->id.'/edit')}}"  enctype="multipart/form-data">
						{{ csrf_field() }}
	                        <table class="table">                     
	                            <tr>
                                    <td>Title</td>
                                    <td><textarea class="form-control" id="" rows="" name="title">{!! $portfolio_data->title !!}</textarea></td>
                                </tr>   
                                <tr>
                                    <td>Subtitle</td>
                                    <td><textarea class="form-control" id="" rows="" name="subtitle">{!! $portfolio_data->subtitle !!}</textarea></td>
                                </tr> 

                                <tr>
                                    <td>Images</td>
                                    <td><input type="text" name="images" placeholder="Image" value="{{ $portfolio_data->images }}" style="width: 100%" readonly>
                                    <input type="file" name="images" placeholder="Image" value="{{ $portfolio_data->images }}" style="width: 100%">
                                    <p style="color: red">
                                    @if( $portfolio_data->id == 3 || $portfolio_data->id == 4 )
                                    Size 1300 x 650 important!
                                    @else
                                    Size must be square or 1 : 1
                                    @endif

                                    </p>
                                    <img src="{{ asset('asset/img/'.$portfolio_data->images.'')}}" style="max-height:200px;max-width:200px;margin-top:10px;">
                                    
                                    <input class="btn btn-danger" type="submit" name="deletes" value="Delete" onclick=" return confirm('Are you sure want to delete image?');"> <p style="color: red">{{ session('status')}}</p> 
                                    </td>
                                </tr>

								<tr>
									<td></td>
									<td>
										<input class="btn btn-info" name="submit" value="Submit" type="submit" style="padding: 5px;">
										<a class="btn btn-danger" href="{{url('/admin/portfolio')}}"  style="padding: 5px; text-decoration: none;">Back</a>
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