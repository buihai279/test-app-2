var app = angular.module('myApp', []).constant('API', 'http://localhost/thuctap/test-app-2/public/');
app.controller('myCtrl', function($scope, $http, API) {
  $http({
    method : "GET",
    url : "api/listMember"
  }).then(function mySuccess(response) {
      $scope.members = response.data;
    }, function myError(response) {
      $scope.members = response.statusText;
  });
  $scope.editMember=function (index) {
      $http({
        method : "GET",
        url : API+"member/edit/"+index
      }).then(function mySuccess(response) {
          $scope.member = response.data;
        });
  }
  $scope.updateMember=function (index) {
      $http({
        method:'POST',
        url: API+'member/'+index,
        data:$.param($scope.member),
        headers: {'Content-Type': 'application/x-www-form-urlencoded'}
      }).then(function successCallback(response) {
        location.reload();
    }, function errorCallback(response) {
        alert('This is embarassing. An error has occured. Please check the log for details');
    });

  }
  $scope.addMember=function () {
    alert('ok')
     $http({
        method:'POST',
        url: API+'foo/member',
        data:$.param($scope.newMember),
        headers: {'Content-Type': 'application/x-www-form-urlencoded'}
      }).then(function (response) {
          console.log(response);
      }, function (response) {
        console.log('lỗi rồi m!!!');
      });
  }

});
