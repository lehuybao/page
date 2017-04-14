<!-- SAMPLE NAME -->
<div class="form-group">
    <?php $page_category_name = $request->get('page_titlename') ? $request->get('page_name') : @$page->page_category_name ?>
    {!! Form::label($name, trans('page::page.name').':') !!}
    {!! Form::text($name, $page_category_name, ['class' => 'form-control', 'placeholder' => trans('page::page.name').'']) !!}
</div>
<!-- /SAMPLE NAME -->