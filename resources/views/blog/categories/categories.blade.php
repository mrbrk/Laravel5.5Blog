@extends('layouts.dashboard')

@section('template_title')
  Showing Categories
@endsection

@section('template_linked_css')
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
    <style type="text/css" media="screen">
        .posts-table {
            border: 0;
        }
        .posts-table tr td:first-child {
            padding-left: 15px;
        }
        .posts-table tr td:last-child {
            padding-right: 15px;
        }
        .posts-table.table-responsive,
        .posts-table.table-responsive table {
            margin-bottom: 0;
        }

    </style>
@endsection

@section('content')

    <section class="content-header">
      <h1>
        Showing Categories
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="#">Home</li>
        <li class="active">Categories</li>
      </ol>
    </section>
    <br/>
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">

                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            Showing All Categories

                            <div class="btn-group pull-right btn-group-xs">
                                <a href="/blog/categories/create">
                                <button type="button" class="btn btn-info btn-xs">
                                    Create New Category</button></a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="/blog/posts/create">
                                            <i class="fa fa-fw fa-post-plus" aria-hidden="true"></i>
                                            Create New Category
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/posts/deleted">
                                            <i class="fa fa-fw fa-group" aria-hidden="true"></i>
                                            Show Deleted Category
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="panel-body">

                        <div class="table-responsive posts-table">
                            <table class="table table-striped table-condensed data-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th class="hidden-sm hidden-xs hidden-md">Created</th>
                                        <th class="hidden-sm hidden-xs hidden-md">Updated</th>
                                        <th>Actions</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{$category->id}}</td>
                                            <td><a href="{{ URL::to('blog/categories/' . $category->slug ) }}">{{$category->name}}</a></td>
                                            <td>{{$category->slug}}</td>
                                            <td>{{$category->created_at }}</td>
                                            <td>{{$category->updated_at }}</td>
                                            <td>
                                                {!! Form::open(array('url' => 'blog/categories/' . $category->id, 'class' => '', 'data-toggle' => 'tooltip', 'title' => 'Delete')) !!}
                                                    {!! Form::hidden('_method', 'DELETE') !!}
                                                    {!! Form::button('<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">Delete</span><span class="hidden-xs hidden-sm hidden-md"> Category</span>', array('class' => 'btn btn-danger btn-sm','type' => 'button', 'style' =>'width: 100%;' ,'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete User', 'data-message' => 'Are you sure you want to delete this category ?')) !!}
                                                {!! Form::close() !!}
                                            </td>

                                            <td>
                                                <a class="btn btn-sm btn-info btn-block" href="{{ URL::to('blog/categories/' . $category->id . '/edit') }}" data-toggle="tooltip" title="Edit">
                                                    <i class="fa fa-pencil fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">Edit</span><span class="hidden-xs hidden-sm hidden-md"> Category</span>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


    @include('modals.modal-delete')

@endsection

@section('footer_scripts')

    @if (count($categories) > 10)
        @include('scripts.datatables')
    @endif
    @include('scripts.delete-modal-script')
    @include('scripts.save-modal-script')
    {{--
        @include('scripts.tooltips')
    --}}
@endsection