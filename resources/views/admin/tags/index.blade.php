@extends('layouts.admin')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Posts</h1>

        <a href="{{route('admin.tags.create')}}"
           class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50 mr-2"></i> Add New
        </a>
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
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($tags as $index => $tag)
                                <tr>
                                    <td>{{$index + $tags->firstItem()}}</td>
                                    <td>{{$tag->name}}</td>

                                    <td>
                                        {{$tag->created_at->diffForHumans()}}
                                    </td>

                                    <td>
                                        <a href="{{route('admin.tags.show',$tag->name)}}" class="btn btn-warning"
                                           title="View Tag">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{route('admin.tags.edit', $tag->name)}}" class="btn btn-primary"
                                           title="Edit Tag">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a  href="{{route('admin.tags.destroy', $tag->name)}}" class="btn btn-danger delTag" data-name="{{$tag->name}}">
                                            <i class="fa fa-trash"></i>
                                        </a>

                                        <form id="delete-form_{{$tag->name}}" action="{{route('admin.tags.destroy', $tag->name)}}" method="POST" style="display: none;">
                                            @method('DELETE');
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center text-uppercase font-weight-bold">
                                        No Tags available
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{$tags->links()}}
                </div>
            </div>
        </div>
    </div>

@endsection
