@section('inline_scripts')
<script type="text/javascript">

var groupCheckable = $('#group-checkable');
var checkboxes = groupCheckable.attr('data-item');

groupCheckable.change(function () {
    var checked = $(this).is(":checked");
    $(checkboxes).each(function () {
        if (checked) {
            $(this).prop("checked", true);
            $(this).parents('tr').addClass("active font-dark");
        } else {
            $(this).prop("checked", false);
            $(this).parents('tr').removeClass("active font-dark");
        }
    });
});

$(checkboxes).change(function() {
    var checked = $(this).is(":checked");
    if (checked) {
        $(this).parents('tr').addClass("active font-dark");
        if ($(checkboxes + ':checked').length == $(checkboxes).length) {
            $(groupCheckable).prop("checked", true);
        }
    } else {
        $(this).parents('tr').removeClass("active font-dark");
        $(groupCheckable).prop("checked", false);
    }
});

$('.btn-patch-delete').click(function() {
    if ($(checkboxes + ':checked').length < 1) {
        modalMessageShow("{{ trans('common.no_selected_row') }}");
        return false;
    }

    var callback = function() {
        $('#form-patch').submit();
    }
    modalConfirmShow("{{ trans('common.delete_multiple_row_confirm') }}", callback);

    return false;
});

@if (old('ids'))
    @php $checkboxIds = old('ids') @endphp
    @foreach ($checkboxIds as $checkboxId)
        $(".checkbox-id-{{ $checkboxId }}").prop("checked", true);
    @endforeach
    checkboxesAction();
@endif

</script>
@parent
@endsection
