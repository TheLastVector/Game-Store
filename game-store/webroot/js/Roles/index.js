var app = angular.module('app', []);

app.controller(
    'RoleCRUDCtrl', 
    ['$scope', 'RoleCRUDService', 
        function ($scope, RoleCRUDService) {
            $scope.updateRole = function () {
                RoleCRUDService.updateRole($scope.role.id, $scope.role.name, $scope.role.description).then(
                    function success(response) {
                        $scope.message = 'Role data updated!';
                        $scope.errorMessage = '';
                        $scope.getAllRoles();
                    },
                    function error(response) {
                        $scope.errorMessage = 'Error updating role!';
                        $scope.message = '';
                    }
                );
            }

            $scope.getRole = function (id) {
                RoleCRUDService.getRole(id).then(
                    function success(response) {
                        $scope.role = response.data.data;
                        $scope.role.id = id;
                        $scope.message = '';
                        $scope.errorMessage = '';
                    },
                    function error(response) {
                        $scope.message = '';
                        if (response.status === 404) {
                            $scope.errorMessage = 'Role not found!';
                        } else {
                            $scope.errorMessage = "Error getting role!";
                        }
                    }
                );
            }

            $scope.addRole = function () {
                if ($scope.role != null && $scope.role.name) {
                    RoleCRUDService.addRole($scope.role.name, $scope.role.description).then(
                        function success(response) {
                            $scope.message = 'Role added!';
                            $scope.errorMessage = '';
                            $scope.getAllRoles();
                        },
                        function error(response) {
                            $scope.errorMessage = 'Error adding role!';
                            $scope.message = '';
                        }
                    );
                } else {
                    $scope.errorMessage = 'Please enter a name!';
                    $scope.message = '';
                }
            }

            $scope.deleteRole = function (id) {
                RoleCRUDService.deleteRole(id).then(
                    function success(response) {
                        $scope.message = 'Role deleted!';
                        $scope.role = null;
                        $scope.errorMessage = '';
                        $scope.getAllRoles();
                    },
                    function error(response) {
                        $scope.errorMessage = 'Error deleting role!';
                        $scope.message = '';
                    }
                );
            }

            $scope.getAllRoles = function () {
                RoleCRUDService.getAllRoles().then(
                    function success(response) {
                        $scope.roles = response.data.data;
                        $scope.message = 'Table was updated';
                        $scope.errorMessage = '';
                    },
                    function error(response) {
                        $scope.message = '';
                        $scope.errorMessage = 'Error getting roles!';
                    }
                );
            }
        }
    ]
);

app.service(
    'RoleCRUDService', 
    ['$http', 
        function ($http) {
            this.getRole = function getRole(roleId) {
                return $http(
                    {
                        method: 'GET',
                        url: urlToRestApi + '/' + roleId,
                        headers: { 
                            'X-Requested-With' : 'XMLHttpRequest',
                            'Accept' : 'application/json'
                        }
                    }
                );
            }

            this.addRole = function addRole(name, description) {
                return $http(
                    {
                        method: 'POST',
                        url: urlToRestApi,
                        data: {
                            name: name, 
                            description: description
                        },
                        headers: { 
                            'X-Requested-With' : 'XMLHttpRequest',
                            'Accept' : 'application/json'
                        }
                    }
                );
            }

            this.deleteRole = function deleteRole(id) {
                return $http(
                    {
                        method: 'DELETE',
                        url: urlToRestApi + '/' + id,
                        headers: { 
                            'X-Requested-With' : 'XMLHttpRequest',
                            'Accept' : 'application/json'
                        }
                    }
                )
            }

            this.updateRole = function updateRole(id, name, description) {
                return $http(
                    {
                        method: 'PATCH',
                        url: urlToRestApi + '/' + id,
                        data: {name: name, description: description},
                        headers: { 
                            'X-Requested-With' : 'XMLHttpRequest',
                            'Accept' : 'application/json'
                        }
                    }
                )
            }

            this.getAllRoles = function getAllRoles() {
                return $http({
                    method: 'GET',
                    url: urlToRestApi,
                    headers: { 
                        'X-Requested-With' : 'XMLHttpRequest',
                        'Accept' : 'application/json'
                    }
                });
            }
        }
    ]
);


