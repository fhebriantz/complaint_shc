@extends('layouts.adminnew')

@section('content')
<div id="content">
    <div class="panel box-shadow-none content-header">
        <div class="panel-body">
            <div class="col-md-12">
                <h3 class="animated fadeInLeft">About</h3>
                <p class="animated fadeInDown">CMS<span class="fa-angle-right fa"></span>About<span class="fa-angle-right fa"></span>Input</p>
            </div>
        </div>
    </div>
    <div class="col-md-12 top-20 padding-0">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading"><h3>Data About</h3></div>
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
                    	<form method="POST" action="{{url('/admin/about/input')}}" enctype="multipart/form-data">
						{{ csrf_field() }}
	                        <table class="table">                        
	                            <tr>
                                    <td>Title</td>
                                    <td><textarea class="form-control" id="" rows="" name="title">{{ old('title') }}</textarea></td>

                                </tr>
                                <tr>
                                    <td>Subtitle</td>
                                    <td><textarea class="form-control" id="" rows="" name="subtitle">{{ old('subtitle') }}</textarea></td>
                                </tr> 
                                <tr>
                                    <td>Description</td>
                                    <td><textarea class="form-control" id="" rows="5" name="desc">{{ old('desc') }}</textarea></td>
                                </tr>

                                <tr>
                                    <td>Images</td>
                                    <td><input type="file" id="inputgambar" name="images"  style="width: 100%" placeholder="Image" ><p style="color: red">Max 4 mb  </p></td>
                                </tr>


								<tr>
									<td></td>
									<td><input class="btn btn-info" name="submit" value="submit" type="submit"></td>
								</tr>
	                        </table>
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