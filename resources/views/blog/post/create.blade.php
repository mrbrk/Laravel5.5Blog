@extends('layouts.dashboard')

@section('template_title')
  Create New Post
@endsection

@section('template_fastload_css')
@endsection

@section('head')

@endsection

@section('content')
<script type="text/javascript">
  tinymce.init({
    selector : "textarea",
    plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste"],
    toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
  }); 
</script>
    <section class="content-header">
      <h1>
        Create New Post
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Blog</a></li>
        <li class="#">Post</li>
        <li class="active">Create</li>
      </ol>
    </section>
    <br/>
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">

            Create New Post

            <a href="/blog/posts" class="btn btn-info btn-xs pull-right">
              <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
              Back <span class="hidden-xs">to</span><span class="hidden-xs"> Posts</span>
            </a>

          </div>
          <div class="panel-body">

            {!! Form::open(array('action' => 'PostController@store','files' => true)) !!}

              <div class="form-group has-feedback row {{ $errors->has('title') ? ' has-error ' : '' }}">
                {!! Form::label('title', 'Title', array('class' => 'col-md-3 control-label')); !!}
                <div class="col-md-9">
                  <div class="input-group">
                    {!! Form::text('title', NULL, array('id' => 'title', 'class' => 'form-control', 'placeholder' => 'Descript to post')) !!}
                    <label class="input-group-addon" for="title"><i class="fa fa-fw {{ trans('forms.create_user_icon_username') }}" aria-hidden="true"></i></label>
                  </div>
                  @if ($errors->has('title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group has-feedback row {{ $errors->has('image_name') ? ' has-error ' : '' }}">
                {!! Form::label('image_name', 'Post Pictrue', array('class' => 'col-md-3 control-label')); !!}
                <div class="col-md-9">
                  <div class="input-group">
                    {!! Form::file('image_name', ['id'=>'image_name' ,'class' => 'form-control']) !!}
                    <label class="input-group-addon" for="image_name"><i class="fa fa-fw {{ trans('forms.create_user_icon_username') }}" aria-hidden="true"></i></label>
                  </div>
                  @if ($errors->has('image_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('image_name') }}</strong>
                    </span>
                  @endif
                </div>
              </div>              

              <div class="form-group has-feedback row {{ $errors->has('body') ? ' has-error ' : '' }}">
                {!! Form::label('body', 'Content', array('class' => 'col-md-3 control-label')); !!}
                <div class="col-md-9">
                  <div class="input-group">
                    {!! Form::textarea('body', NULL, array('id' => 'body', 'class' => 'form-control', 'placeholder' => 'Be Creative :)')) !!}
                  </div>
                  @if ($errors->has('body'))
                    <span class="help-block">
                        <strong>{{ $errors->first('body') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group has-feedback row {{ $errors->has('category') ? ' has-error ' : '' }}">
                {!! Form::label('category', 'Category', array('class' => 'col-md-3 control-label')); !!}
                <div class="col-md-9">
                  <div class="input-group">
                    <select class="form-control" name="category_id" id="category_id">
                      <option value="">Select a Category</option>
                      @if ($categories->count())
                        @foreach($categories as $category)
                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                      @endif
                    </select>
                    <label class="input-group-addon" for="name"><i class="fa fa-fw {{ trans('forms.create_user_icon_role') }}" aria-hidden="true"></i></label>
                  </div>
                  @if ($errors->has('category'))
                    <span class="help-block">
                        <strong>{{ $errors->first('category') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="form-group has-feedback row {{ $errors->has('tags') ? ' has-error ' : '' }}">
                {!! Form::label('tags', 'Tags', array('class' => 'col-md-3 control-label')); !!}
                <div class="col-md-9">
                  <div class="input-group">
                    <checkbox class="form-control"  name="tags" id="tags">
                      @if ($tags->count())
                        @foreach($tags as $tag)
                        <label>
                            <input type="checkbox" name="tags[]" value="{{ $tag->id }}">{{ $tag->name }}
                        </label>
                         <!-- <option value="{{ $tag->id }}">{{ $tag->name }}</option> -->
                        @endforeach
                      @endif
                    </checkbox>
                    <label class="input-group-addon" for="name"><i class="fa fa-fw {{ trans('forms.create_user_icon_role') }}" aria-hidden="true"></i></label>
                  </div>
                  @if ($errors->has('tags'))
                    <span class="help-block">
                        <strong>{{ $errors->first('tags') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              {!! Form::button('<i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;' . 'Create a new post', array('class' => 'btn btn-success btn-flat margin-bottom-1 pull-right','type' => 'submit', )) !!}

            {!! Form::close() !!}

          </div>
        </div>
      </div>


@endsection

@section('footer_scripts')

@endsection
