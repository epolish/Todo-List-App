angular.module('mainApp',['ngResource'])
    .constant('baseUrl', window.location.protocol + '//' + window.location.host + '/example/bootstrap.php/')
    .controller('mainCtrl', function($scope, $http, $resource, baseUrl){
        $scope.property = null;
        $scope.reverse = false;
        $scope.users = [];
        $scope.modal = {title: null, message: null};
        $scope.usersResource = $resource(baseUrl + ':id', {id: '@id'}, {'update': {method: 'PUT'}});
        
        $scope.sortBy = function($event, value){
            var element = angular.element($event.currentTarget || $event.srcElement);
            element.toggleClass('glyphicon-triangle-top');
            $scope.reverse = ($scope.property === value) ? !$scope.reverse : false;
            $scope.property = value;
        };
        $scope.validateEmail = function(email){
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        };
        $scope.select = function(){
            $scope.users = $scope.usersResource.query();
        };
        $scope.insert = function(user){
            if(!$scope.mainForm.$valid){
                $scope.modal.title = 'Error';
                $scope.modal.message = 'Some fields are incorrect.';
            }else{
                new $scope.usersResource(user).$save().then(function(newUser){
                    $scope.users.push(newUser);
                    $scope.modal.title = 'Success';
                    $scope.modal.message = 'User has been added.';
                });
            }
            angular.element('#modal').modal();
        };
        $scope.update = function(user){
            if(user.firstName && user.secondName && $scope.validateEmail(user.eMail)){
                user.$update();
                $scope.modal.title = 'Success';
                $scope.modal.message = 'User has been updated.';
            }else{
                $scope.modal.title = 'Error';
                $scope.modal.message = 'Some fields are incorrect.';
            }
            angular.element('#modal').modal();
        };
        $scope.delete = function(user){
            user.$delete().then(function(){
                $scope.users.splice($scope.users.indexOf(user), 1);
                $scope.modal.title = 'Success';
                $scope.modal.message = 'User has been removed.';
                angular.element('#modal').modal();
            });
        };
    });
