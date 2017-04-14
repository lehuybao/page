<!-- SAMPLE NAME -->
<div class="form-group">
    <?php $page_name = $request->get('page_titlename') ? $request->get('page_name') : @$page->page_name ?>
    {!! Form::label($name, trans('page::page.name').':') !!}
    {!! Form::text($name, $page_name, ['class' => 'form-control', 'placeholder' => trans('page::page.name').'']) !!}
</div>
<!-- /SAMPLE NAME -->