
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title bariol-thin"><i class="fa fa-search"></i><?php echo trans('page::page.page_category_search') ?></h3>
    </div>
    <div class="panel-body">

        {!! Form::open(['route' => 'admin_page_category','method' => 'get']) !!}

        <!--TITLE-->
		<div class="form-group">
            {!! Form::label('page_category_name',trans('page::page.page_category_name_label')) !!}
            {!! Form::text('page_category_name', @$params['page_category_name'], ['class' => 'form-control', 'placeholder' => trans('page::page.page_category_name')]) !!}
        </div>

        {!! Form::submit(trans('page::page.search').'', ["class" => "btn btn-info pull-right"]) !!}
        {!! Form::close() !!}
    </div>
</div>




