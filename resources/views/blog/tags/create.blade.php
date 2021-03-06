@extends('layouts.dashboard')

@section('template_title')
  Create Tag
@endsection

@section('template_fastload_css')
@endsection

@section('content')
    <section class="content-header">
      <h1>
        Create New Tag
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Blog</a></li>
        <li class="#">Tags</li>
        <li class="active">Create</li>
      </ol>
    </section>
    <br/>
 
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">

            Create Tag

            <a href="/blog/tags" class="btn btn-info btn-xs pull-right">
              <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
              Back <span class="hidden-xs">to</span><span class="hidden-xs"> Tags</span>
            </a>

          </div>
          <div class="panel-body">


            {!! Form::open(array('action' => 'TagController@store')) !!}

            {!! csrf_field() !!}
              <div class="form-group has-feedback row {{ $errors->has('name') ? ' has-error ' : '' }}">
                {!! Form::label('name', 'Title', array('class' => 'col-md-3 control-label')); !!}
                <div class="col-md-9">
                  <div class="input-group">
                    {!! Form::text('name', NULL, array('id' => 'name', 'class' => 'form-control', 'placeholder' => "Tag Name" )) !!}
                    <label class="input-group-addon" for="name"><i class="fa fa-fw {{ trans('forms.create_user_icon_username') }}" aria-hidden="true"></i></label>
                  </div>
                  @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                  @endif
                </div>                
              </div>
              <div class="form-group has-feedback row {{ $errors->has('slug') ? ' has-error ' : '' }}">
                {!! Form::label('slug', 'Slug', array('class' => 'col-md-3 control-label')); !!}
                <div class="col-md-9">
                  <div class="input-group">
                    {!! Form::text('slug', NULL, array('id' => 'slug', 'class' => 'form-control', 'placeholder' => "Tag Slug" )) !!}
                    <label class="input-group-addon" for="slug"><i class="fa fa-fw {{ trans('forms.create_user_icon_username') }}" aria-hidden="true"></i></label>
                  </div>
                  @if ($errors->has('slug'))
                    <span class="help-block">
                        <strong>{{ $errors->first('slug') }}</strong>
                    </span>
                  @endif
                </div>                
              </div>              
              {!! Form::button('<i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;' . 'Save tag', array('class' => 'btn btn-success btn-flat margin-bottom-1 pull-right','type' => 'submit', )) !!}

            {!! Form::close() !!}

          </div>
        </div>
      </div>
 

@endsection

@section('footer_scripts')
@endsection
