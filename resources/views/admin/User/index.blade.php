@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
       <div class="panel-title text-center">
       		Users
       </div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    <th>
                        User Name
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Delete
                    </th>
                </thead>

                <tbody>
                   @if($users->count()>0)
                   
                   
                    @foreach($users as $user)
                        <tr>
                            <td>
                                {{ $user->name }}
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                           
                            <td>
                                <a href="{{ route('user.delete', ['id' => $user->id ]) }}" class="btn btn-xs btn-danger">
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