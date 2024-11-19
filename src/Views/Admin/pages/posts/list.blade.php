@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="float-right page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#!">Drixo</a></li>
                        <li class="breadcrumb-item active">Posts</li>
                    </ol>
                </div>
                <h5 class="page-title">Posts</h5>
            </div>
            <div class="col-md-12">
                <div class="card m-b-30">
                    <form action="" method="GET" class="mt-4 d-flex justify-content-between">
                        <div class="card-body">
                            <h2 class="mb-4">
                                <span class="badge badge-default"> Posts </span>
                            </h2>

                            @include('components.alert')

                            <div class="d-flex justify-content-between mb-4" style="width: 100%">
                                <div class="d-flex">
                                    <div style="margin-right: 32px">
                                        <a href="/admin/posts/list-hide" class="btn btn-danger mo-mb-2" data-toggle="tooltip"
                                            data-placement="top" title="" data-original-title="List Posts Hiden">
                                            <i class="mdi mdi-playlist-remove"></i>
                                        </a>
                                        <a href="/admin/posts/add" class="btn btn-success mo-mb-2" data-toggle="tooltip"
                                            data-placement="top" title="" data-original-title="Add Post">
                                            <i class="ion-android-add"></i>
                                        </a>
                                    </div>
                                    <div class="d-flex">
                                        <select class="custom-select mr-2" name="id_category">
                                            <option value="" {{ $idCategorySelected ? 'selected' : '' }}>All Category</option>
                                            @foreach ($categories as $item)
                                                <option
                                                    value="{{ $item['id'] }}"
                                                    {{ $idCategorySelected == $item['id'] ? 'selected' : '' }}
                                                >
                                                    {{ $item['nameCategory'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <button type="submit" class="btn btn-success mo-mb-2 btn-filter" data-toggle="tooltip"
                                            data-placement="top" data-original-title="Filter">
                                            <i class="mdi mdi-filter"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="w-100 mr-2">
                                        <input
                                            class="form-control"
                                            type="search"
                                            placeholder="Search..."
                                            name="search"
                                            value="{{ $search }}"
                                        >
                                    </div>
                                    <button type="submit"
                                        class="btn btn-success waves-effect waves-light d-flex align-items-center btn-search">
                                        <i class="ti-search"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Author</th>
                                            <th>Category Name</th>
                                            <th>Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        @php $key = ($page * $perPage) - $perPage + 1; @endphp
                                        @empty($posts)
                                            <tr>
                                                <td colspan="7" class="text-center">No Post Here</td>
                                            </tr>
                                        @endempty
                                        @foreach ($posts as $post)
                                            <tr>
                                                <th scope="row">{{ $key }}</th>
                                                <td>{{ $post['title'] }}</td>
                                                <td>
                                                    <img src="{{ show_upload($post['image']) }}" alt="" width="80"
                                                        height="80"
                                                        style=" object-fit: cover;
                                                            border-radius: 4px;
                                                            box-shadow: 0 2px 8px 0 rgba(0, 0, 0, 0.2);
                                                            ">
                                                </td>
                                                <td>{{ $post['userName'] }}</td>
                                                <td>{{ $post['nameCategory'] }}</td>
                                                <td>
                                                    <span class="badge badge-danger" style="font-size: 1rem;">
                                                        {{ $post['typeName'] }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <a href='/admin/posts/detail/{{ $post['id'] }}'
                                                        class='btn btn-success waves-effect waves-light' data-toggle='tooltip'
                                                        data-placement='top' title='' data-original-title='Detail'>
                                                        <i class="mdi mdi-launch"></i>
                                                    </a>
                                                    <a href="/admin/posts/edit/{{ $post['id'] }}"
                                                        class="btn btn-warning waves-effect waves-light" data-toggle="tooltip"
                                                        data-placement="top" title="" data-original-title="Edit">
                                                        <i class="ion-edit"></i>
                                                    </a>

                                                    <a href='/admin/posts/hide/{{ $post['id'] }}'
                                                        class='btn btn-danger waves-effect waves-light' data-toggle='tooltip'
                                                        data-placement='top' title='' data-original-title='Hide'
                                                        onclick="return confirm('Hide ??')">
                                                        <i class="mdi mdi-eye-off"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @php $key++; @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @include('components.table.pagination')
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
