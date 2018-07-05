@extends('layout.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Series</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('series.create') }}"> Create New Serie</a>
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
            <th>ID</th>
            <th>Title</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Price</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($series as $serie)
        <tr>
            <td>{{ $serie->id }}</td>
            <td>{{ $serie->title }}</td>
            <td>{{ $serie->start_date }}</td>
            <td>{{ $serie->end_date }}</td>
            <td>{{ $serie->price }}</td>
            <td>
                <form action="{{ route('series.destroy', $serie->id) }}" method="POST">
                    <a class="btn btn-warning btn-sm" href="{{ route('games.index', $serie->id) }}">Games</a>
                    <a class="btn btn-info btn-sm" href="{{ route('series.show',$serie->id) }}">Show</a>
                    <a class="btn btn-primary btn-sm" href="{{ route('series.edit',$serie->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')   
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $series->links() !!}
@endsection