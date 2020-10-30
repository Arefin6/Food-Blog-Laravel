@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
       <div class="panel-title text-center">
       		Tags
       </div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    <th>
                        Tag name
                    </th>
                    <th>
                        Edit
                    </th>
                    <th>
                        Delete
                    </th>
                </thead>

                <tbody>
                   @if($tags->count()>0)
                   
                   
                    @foreach($tags as $tag)
                        <tr>
                            <td>
                                {{ $tag->tag }}
                            </td>
                            <td>
                                <a href="{{ route('tag.edit', ['id' => $tag->id ]) }}" class="btn btn-xs btn-info">
                                    <!-- <span class="glyphicon glyphicon-pencil"></span> -->
                                    Edit
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('tag.delete', ['id' => $tag->id ]) }}" class="btn btn-xs btn-danger">
                                    <!-- <span class="glyphicon glyphicon-trash"></span> -->
                                    Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                
                @else
                    <tr>
                    		<th colspan="5" class="text-center">No Tags Yet..</th>
                    </tr>
                 @endif   
                </tbody>
            </table>
        </div>
    </div>
@stop