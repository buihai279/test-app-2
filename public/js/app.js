var app = angular.module('myApp',[]).constant('API', 'http://localhost/thuctap/test-app-2/public/');
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
        
         $http({
          method : "GET",
          url : "api/listMember"
        }).then(function mySuccess(response) {
            $scope.members = response.data;
          }, function myError(response) {
            $scope.members = response.statusText;
        });
            $('#editModal').modal('hide');
            
    }, function errorCallback(response) {
        alert('This is embarassing. An error has occured. Please check the log for details');
    });

  }
  $scope.addMember=function () {
     $http({
        method:'POST',
        url: API+'foo/member',
        data:$.param($scope.newMember),
        headers: {'Content-Type': 'application/x-www-form-urlencoded'}
      }).then(function (response) {
        $http({
          method : "GET",
          url : "api/listMember"
        }).then(function mySuccess(response) {
            $scope.members = response.data;
          }, function myError(response) {
            $scope.members = response.statusText;
        });
            $('#createModal').modal('hide');
          // console.log(response);
      }, function (response) {
        // console.log('error!!!');
      });

  }

  $scope.deleteMember=function(idDelete){
    // alert(id);
    $http({
      method:'POST',
      url:API+'member/delete/'+idDelete,
       data:$.param($scope.idDelete),
        headers: {'Content-Type': 'application/x-www-form-urlencoded'}
      }).then(function (response) {
          // console.log(response);
            $http({
              method : "GET",
              url : "api/listMember"
            }).then(function mySuccess(response) {
                $scope.members = response.data;
              }, function myError(response) {
                $scope.members = response.statusText;
            });
            $('#deleteModal').modal('hide');
      }, function (response) {
        // console.log(response);
      });
  }
  $scope.btnDelete=function (id) {
    $scope.idDelete=id;
  }

});

