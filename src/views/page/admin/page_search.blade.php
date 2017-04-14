
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title bariol-thin"><i class="fa fa-search"></i><?php echo trans('page::page.page_search') ?></h3>
    </div>
    <div class="panel-body">

        {!! Form::open(['route' => 'admin_page','method' => 'get']) !!}

        <!--TITLE-->
        <div class="form-group">
            {!! Form::label('page_name', trans('page::page.page_name_label')) !!}
            {!! Form::text('page_name', @$params['page_name'], ['class' => 'form-control', 'placeholder' => trans('page::page.page_name_placeholder')]) !!}
        </div>
        <!--/END TITLE-->

        {!! Form::submit(trans('page::page.search').'', ["class" => "btn btn-info pull-right"]) !!}
        {!! Form::close() !!}
    </div>
</div>


