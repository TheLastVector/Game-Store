$(document).ready(function () {
    // The path to action from CakePHP is in urlToLinkedListFilter 
    $('#platform-id').on('change', function () {
        var platformId = $(this).val();
        if (platformId) {
            $.ajax({
                url: urlToLinkedListFilter,
                data: 'platform_id=' + platformId,
                success: function (subplatforms) {
                    $select = $('#subplatform-id');
                    $select.find('option').remove();
                    $.each(subplatforms, function (key, value)
                    {
                        $.each(value, function (childKey, childValue) {
                            $select.append('<option value=' + childValue.id + '>' + childValue.name + '</option>');
                        });
                    });
                }
            });
        } else {
            $('#subplatform-id').html('<option value="">Select Platform first</option>');
        }
    });
});
