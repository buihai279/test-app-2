

angular
    .module('app', ['angularFileUpload'])
    .controller('AppController', function($scope, FileUploader) {
        alert(1);
        $scope.uploader = new FileUploader();
    });



    var app = angular.module('myApp',[]).constant('API', 'http://localhost/thuctap/test-app-2/public/');

// app.directive('uploadFile', function(){
//   return {
//     restrict: 'A',
//     link: function(scope, element, attrs) {
//       element.bind('change',function(event){
//         console.log(element[0].files[0]);
//         var uploadUrl = "/fileUpload";
//         uploadFileToUrl(element[0].files[0], uploadUrl);
//       });
//     }
//   }
// });

app.controller('myCtrl', function($scope, $http, API) {

  $scope.sortType     = 'name'; // set the default sort type
  $scope.sortReverse  = false;  // set the default sort order
  $scope.searchFish   = '';     // set the default search/filter term




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
  $scope.addMember=function (obj) {
     $http({
        method:'POST',
        url: API+'foo/member',
        data:$.param(obj),
        headers: {'Content-Type': 'application/x-www-form-urlencoded'}
      }).then(function (response) {
        $http({
          method : "GET",
          url : "api/listMember",
        }).then(function mySuccess(response) {
            $scope.members = response.data;
          }, function myError(response) {
            $scope.members = response.statusText;
        });
          $('#createModal').modal('hide');
          $scope.sortType     = 'created_at'; // set the default sort type
          $scope.sortReverse  = true;  // set the default sort order
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

  $scope.reverseFun=function () {
    $scope.sortReverse=!$scope.sortReverse;
  }

});

