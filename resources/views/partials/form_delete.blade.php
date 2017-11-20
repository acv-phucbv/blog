@section('inline_scripts')
<script type="text/javascript">
$('.btn-item-delete').click(function(e) {
    e.preventDefault();

    var form = $(this).attr('data-form');

    var callback = function() {
        $(form).submit();
    }.bind(this);

    modalConfirmShow("{{ $message ?? trans('common.delete_row_confirm') }}", callback);

    return false;
});
</script>
@parent
@endsection

{{ Form::open(['route' => [$route, $item], 'method' => 'delete', 'id' => 'form-delete-' . $item->id, 'class' => 'form-delete hidden']) }}
    {{ method_field('delete') }}
{{ Form::close() }}
