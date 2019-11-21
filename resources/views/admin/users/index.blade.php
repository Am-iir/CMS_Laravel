@extends('layouts.admin')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Users</h1>

    </div>

    @include('layouts.flash_message')

    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-12 mb-4">
            <!-- Project Card Example -->
            <div class="card shadow">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>SN</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Type</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($users as $index => $user)
                                <tr>
                                    <td>{{$index + $users->firstItem()}}</td>
                                    <td>{{$user->name}}</td>

                                    <td>
                                        {{$user->email}}
                                    </td>

                                    <td>
                                        {{$user->type}}
                                    </td>

                                    <td class="text-center">

                                        <a href="{{route('admin.users.edit', $user->id)}}" class="btn btn-primary"
                                           title="Edit Post">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a  href="" class="btn btn-danger delUser" data-id="{{$user->id}}">
                                            <i class="fa fa-trash"></i>
                                        </a>

                                        <form id="delete-form_{{$user->id}}" action="{{route('admin.users.destroy', $user->id)}}" method="POST" style="display: none;">
                                            @method('DELETE');
                                            @csrf
                                        </form>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center text-uppercase font-weight-bold">
                                        No Posts available
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </div>

@endsection



