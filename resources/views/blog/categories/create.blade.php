@extends('layouts.dashboard')

@section('template_title')
  Create New Category
@endsection

@section('template_fastload_css')
@endsection

@section('content')
    <section class="content-header">
      <h1>
        Create New Category
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="#">Categories</li>
        <li class="active">Create</li>
      </ol>
    </section>
    <br/>

      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">

            Create New Category

            <a href="/blog/posts" class="btn btn-info btn-xs pull-right">
              <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
              Back <span class="hidden-xs">to</span><span class="hidden-xs"> Categories</span>
            </a>

          </div>
          <div class="panel-body">

            {!! Form::open(array('action' => 'CategoryController@store')) !!}

              <div class="form-group has-feedback row {{ $errors->has('name') ? ' has-error ' : '' }}">
                {!! Form::label('name', 'Title', array('class' => 'col-md-3 control-label')); !!}
                <div class="col-md-9">
                  <div class="input-group">
                    {!! Form::text('name', NULL, array('id' => 'name', 'class' => 'form-control', 'placeholder' => 'Descript to post')) !!}
                    <label class="input-group-addon" for="name"><i class="fa fa-fw {{ trans('forms.create_user_icon_username') }}" aria-hidden="true"></i></label>
                  </div>
                  @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              {!! Form::button('<i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;' . 'Create a new category', array('class' => 'btn btn-success btn-flat margin-bottom-1 pull-right','type' => 'submit', )) !!}

            {!! Form::close() !!}

          </div>
        </div>
      </div>


@endsection

@section('footer_scripts')
@endsection
