var onloadCallback = function() {
    widgetId1 = grecaptcha.render('captcha', {
        'sitekey': '6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI',
        'theme': 'dark'
    });
};

// angular js codes will be here
var app = angular.module('Captcha', []);

app.controller('loginCtrl', function($scope, $http) {
    // more angular JS codes will be here

    // Login Process
    $scope.login = function() {
        //alert(grecaptcha.getResponse(widgetId1));
        if (grecaptcha.getResponse(widgetId1) == '') {
            $scope.captcha_status = 'Please verify captha.';
            return;
        }
        var req = {
            method: 'POST',
            url: 'api/users/token',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            data: {username: $scope.username, password: $scope.password}
        }
        // fields in key-value pairs
        $http(req)
                .success(function(jsonData, status, headers, config) {
                    // console.log(jsonData.data.token);
                    // tell the user was logged
                    Materialize.toast('User sucessfully logged in', 4000);
                    localStorage.setItem('token', jsonData.data.token);
                    localStorage.setItem('user_id', jsonData.data.id);
                    // Switch button for Logout
                    $('#login-btn').hide();
                    $('#logout-btn').show();
                })
                .error(function(data, status, headers, config) {
                    //console.log(data.response.result);
                    // tell the user was not logged
                    Materialize.toast(data.message, 4000);
                });
    }
    // Login Process
    $scope.logout = function() {
        localStorage.setItem('token', "no token");
        $('#logout-btn').hide();
        $('#login-btn').show();
        $scope.captcha_status = '';
    }
    $scope.changePassword = function() {
        var req = {
            method: 'PUT',
            url: 'api/users/' + localStorage.getItem("user_id"),
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + localStorage.getItem("token")
            },
            data: {'password': $scope.newPassword}
        }
        $http(req)
                .success(function(response) {
                    // tell the user subcategory record was updated
                    Materialize.toast('Password successfully changed', 4000);
                })
                .error(function(response) {
                    // tell the user subcategory record was not updated
                    //console.log(response);
                    Materialize.toast('Could not update Password', 4000);

                });
    }
});

// jquery codes will be here
$(document).ready(function() {
    localStorage.setItem('token', "no token");
    $('#logout-btn').hide();
});
