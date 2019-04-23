@extends('layouts.adminnew')

@section('content')
<div id="content">
    <div class="panel box-shadow-none content-header">
        <div class="panel-body">
            <div class="col-md-12">
                <h3 class="animated fadeInLeft">Team</h3>
                <p class="animated fadeInDown">CMS<span class="fa-angle-right fa"></span>Team<span class="fa-angle-right fa"></span>Edit</p>
            </div>
        </div>
    </div>
    <div class="col-md-12 top-20 padding-0">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading"><h3>Data Team</h3></div>
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
                    	<form method="POST" action="{{url('/admin/team/'.$team_data->id.'/edit')}}"  enctype="multipart/form-data">
						{{ csrf_field() }}
	                        <table class="table">   

                                <tr>
                                    <td>Title</td>
                                    <td><input type="text" name="title" class="form-control" placeholder="Jhon Doe" value="{!! $team_data->title !!}"></td>
                                </tr>

                                <tr>
                                    <td>Subtitle</td>
                                    <td><input type="text" name="subtitle" class="form-control" placeholder="Web Developer" value="{!! $team_data->subtitle !!}"></td>
                                </tr>
                                <tr>
                                    <td>Facebook</td>
                                    <td><input type="text" name="facebook" class="form-control" placeholder="https://www.facebook.com/yourusername" value="{{$team_data->facebook}}"></td>
                                </tr>
                                <tr>
                                    <td>Instagram</td>
                                    <td><input type="text" name="instagram" class="form-control" placeholder="https://www.instagram.com/yourusername" value="{{$team_data->instagram}}"></td>
                                </tr>
                                <tr>
                                    <td>Twitter</td>
                                    <td><input type="text" name="twitter" class="form-control" placeholder="https://www.twitter.com/yourusername" value="{{$team_data->twitter}}"></td>
                                </tr>
                                <tr>
                                    <td>Linkedin</td>
                                    <td><input type="text" name="linkedin" class="form-control" placeholder="https://www.linkedin.com/in/lutfi-febrianto-77663914b" value="{{$team_data->linkedin}}"></td>
                                </tr>

                                <tr>
                                    <td>Images</td>
                                    <td><input type="text" name="images" placeholder="Image" value="{{ $team_data->images }}" style="width: 100%" readonly>
                                    <input type="file" name="images" placeholder="Image" value="{{ $team_data->images }}" style="width: 100%">
                                    <p style="color: red">Size must be 800 x 978 Important!</p>
                                    <img src="{{ asset('asset/img/'.$team_data->images.'')}}" style="max-height:200px;max-width:200px;margin-top:10px;">
                                    
                                    <input class="btn btn-danger" type="submit" name="deletes" value="Delete" onclick=" return confirm('Are you sure want to delete image?');"> <p style="color: red">{{ session('status')}}</p> 
                                    </td>
                                </tr>

								<tr>
									<td></td>
									<td>
										<input class="btn btn-info" name="submit" value="Submit" type="submit" style="padding: 5px;">
										<a class="btn btn-danger" href="{{url('/admin/team')}}"  style="padding: 5px; text-decoration: none;">Back</a>
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