@extends('Student.template')

@section('styles')

@endsection

@section('contents')
	@include('Shared.notification')
	<table class="table" id="table">
		<thead>
			<tr>
				<th>Image</th>
				<th>Title</th>
				<th>Author</th>
				<th>Publisher</th>
				<th>Location</th>
				<th>Status</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($reserves as $res)
				<tr>
					<td>
						<img src="{{URL::to('images')}}/{{$res->book->image}}" class="img-thumbnail" width="80px">
					</td>
					<td>{{$res->book->title}}</td>
					<td>{{$res->book->author}}</td>
					<td>{{$res->book->publisher}}</td>
					<td>{{$res->book->location}}</td>
					<td>
						@if($res->status_id == 1)
							Pending Reservation Request
						@elseif($res->status_id == 2)
							Reserve
						@elseif($res->status_id == 3)
							Returned		
						@endif
					</td>
					<td>
						@if($res->status_id == 1)
							<a href="{{route('student_cancel_book',$res->id)}}" class="btn btn-danger btn-xs">Cancel</a> 
						@elseif($res->status_id == 2)
							<a href="{{route('student_return_book',$res->id)}}" class="btn btn-info btn-xs">Return</a> 
						@elseif($res->status_id == 3)
							Returned	
						@endif
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

@endsection

@section('scripts')

@endsection