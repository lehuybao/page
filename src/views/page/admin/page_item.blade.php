
@if( ! $pages->isEmpty() )
<table class="table table-hover">
    <thead>
        <tr>
            <td style='width:5%'>{{ trans('page::page.order') }}</td>
            <th style='width:10%'></th>
            <th style='width:50%'>Tên trang</th>
            <th style='width:20%'>{{ trans('page::page.operations') }}</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $nav = $pages->toArray();
            $counter = ($nav['current_page'] - 1) * $nav['per_page'] + 1;
        ?>
        @foreach($pages as $page)
        <tr>
            <td>
                <?php echo $counter; $counter++ ?>
            </td>
            <td>{!! $page->page_id !!}</td>
            <td>{!! $page->page_name !!}</td>
            <td>
                <a href="{!! URL::route('admin_page.edit', ['id' => $page->page_id]) !!}"><i class="fa fa-edit fa-2x"></i></a>
                <a href="{!! URL::route('admin_page.delete',['id' =>  $page->page_id, '_token' => csrf_token()]) !!}" class="margin-left-5 delete"><i class="fa fa-trash-o fa-2x"></i></a>
                <span class="clearfix"></span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
 <span class="text-warning">
	<h5>
		{{ trans('page::page.message_find_failed') }}
	</h5>
 </span>
@endif
<div class="paginator">
    {!! $pages->appends($request->except(['page']) )->render() !!}
</div>