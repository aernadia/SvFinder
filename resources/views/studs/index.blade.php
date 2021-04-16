@extends('studs.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Check all Students</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('studs.create') }}"> Add New Students</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Student ID</th>
            <th>Name</th>
            <th>Program Code</th>
            <th width="250px">Action</th>
        </tr>
        @foreach ($studs as $stud)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $stud->stud_id }}</td>
            <td>{{ $stud->stud_name }}</td>
            <td>{{ $stud->prog_code }}</td>
            <td>
                <form action="{{ route('studs.destroy',$stud->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('studs.show',$stud->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('studs.edit',$stud->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $studs->links() !!}
      
@endsection