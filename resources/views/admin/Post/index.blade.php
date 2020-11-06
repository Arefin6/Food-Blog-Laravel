@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
       <div class="panel-title text-center">
       		Posts
       </div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    <th>
                       img
                    </th>
                    <th>
                        Title
                    </th>
                    <th>
                        Edit
                    </th>
                    <th>
                        Delete
                    </th>
                </thead>

                <tbody>
                    @if($posts->count()>0)
                    @foreach($posts as $post)
                        <tr>
                            <td>
                               <img src="{{ asset('/'. $post->featured) }}" alt="" width="90px">
                            </td>
                            <td>
                             {{$post->title}}
                            </td>
                            <td>
                                
                                 
                              <a href="{{route('post.edit',['id' => $post->id])}}" class="btn btn-xs btn-info">Edit</a>      

                                
                            </td>
                            <td>
                                
                              <a href="{{route('post.delete',['id' => $post->id])}}" class="btn btn-xs btn-danger">Delete</a> 
                                    
                                
                            </td>
                        </tr>
                    @endforeach
                    @else
                    	<tr>
                    		<th colspan="5" class="text-center">No published post</th>
                    	</tr>
                    	
                    @endif	
                </tbody>
            </table>
        </div>
    </div>
@stop