@extends('laravel-authentication-acl::admin.layouts.base-2cols')

@section('title')
    {{ trans('page::page.page_category') }}
@stop

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="col-md-8">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title bariol-thin"><i class="fa fa-group"></i> {!! 'Page' !!}</h3>
                </div>
                <div class="panel-body">
                   Quản trị Trang
               </div>
           </div>
        </div>
        <div class="col-md-4">
            @include('page::page_category.admin.page_category_search')
        </div>
    </div>
</div>
@stop