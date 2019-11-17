@extends('layouts.admin')

@section('content')


    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Posts</h1>

        <a href="{{route('admin.category.create')}}"
           class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50 mr-2"></i> Add New
        </a>
    </div>

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
                                <th>#</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($categories as $index => $category)
                                <tr>
                                    <td>{{$index + $categories->firstItem()}}</td>
                                    <td>{{$category->name}}</td>
                                    <td ><span class="slug"></span>{{$category->slug}}</td>

                                    <td>
                                        {{$category->created_at->diffForHumans()}}
                                    </td>

                                    <td>
                                        <a href="{{route('admin.category.show', $category->slug)}}" class="btn btn-warning"
                                           title="View Slug">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{route('admin.category.edit', $category->slug)}}" class="btn btn-primary"
                                           title="Edit Category">
                                            <i class="fa fa-edit"></i>
                                        </a>


                                        <a  href="{{route('admin.category.destroy', $category->slug)}}" class="btn btn-danger delCat" data-slug="{{$category->slug}}">
{{--                                            onclick="event.preventDefault();--}}
{{--                                                    --}}
{{--                                                     document.getElementById('delete-form').submit();">--}}
                                            <i class="fa fa-trash"></i>
                                        </a>

                                        <form id="delete-form_{{$category->slug}}" action="{{route('admin.category.destroy', $category->slug)}}" method="POST" style="display: none;">
                                            @method('DELETE')
                                            @csrf
                                        </form>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center text-uppercase font-weight-bold">
                                        No Categories available
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{$categories->links()}}
                </div>
            </div>
        </div>
    </div>

@endsection
