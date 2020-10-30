@extends('layouts.app')

@section('content')

    @include('admin.includes.errors')

    <div class="panel panel-default">
        <div class="panel-heading">
            Edit Tag 
        <div class="panel-body">
            <form action="{{ route('tag.update',['id'=>$tag->id]) }}" method="post"
               value="{{$tag -> tag}}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Tag</label>
                    <input type="text" name="tag" class="form-control" value="{{$tag->tag}}">
                </div>
                
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Update tag</button>
                    </div> 
                </div>
            </form>
        </div>
    </div>
@stop