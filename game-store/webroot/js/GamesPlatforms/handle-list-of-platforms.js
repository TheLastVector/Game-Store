/* $(document).ready(function () {
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
}); */

var app = angular.module('linkedlists', []);

app.controller('gamesPlatformsController', function ($scope, $http) {
    // l'url vient de add.ctp
    $http.get(urlToLinkedListFilter).then(function (response) {
        $scope.platforms = response.data;
    });
});
