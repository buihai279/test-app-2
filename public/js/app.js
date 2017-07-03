var app = angular.module('myApp',[]).constant('API', 'http://localhost/thuctap/test-app-2/public/');

app.directive('fileModel', ['$parse', function ($parse) {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            var model = $parse(attrs.fileModel);
            var modelSetter = model.assign;
            element.bind('change', function(){
                scope.$apply(function(){
                    modelSetter(scope, element[0].files[0]);
                });
            });
        }
    };
}]);

app.controller('ParentCtrl', function( $http,$scope,$log,API,$rootScope) {

  $scope.sortType     = 'name'; // set the default sort type
  $scope.sortReverse  = false;  // set the default sort order
  $scope.searchFish   = '';     // set the default search/filter term

  $rootScope.refreshPage=function () {
       $http({
          method : "GET",
          url : "api/listMember"
        }).then(function mySuccess(response) {
            $scope.members = response.data;
            $scope.sortType     = 'updated_at'; // set the default sort type
            $scope.sortReverse  = true;  // set the default sort order
          }, function myError(response) {
            $scope.errors=response;
            $scope.members = response.statusText;
        });
  }

  $http({
    method : "GET",
    url : "api/listMember"
  }).then(function mySuccess(response) {
      $scope.members = response.data;
    }, function myError(response) {
      $scope.members = response.statusText;
  });

  // edit member
  $scope.getEditMember=function (index) {
      $http({
        method : "GET",
        url : API+"member/edit/"+index
      }).then(function mySuccess(response) {
          $scope.editMember = response.data;
          $("#newPhoto").val("");
        });
  }
 


  $scope.deleteMember=function(idDelete){
    $http({
      method:'POST',
      url:API+'member/delete/'+idDelete,
       data:$.param($scope.idDelete),
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
            $('#deleteModal').modal('hide');
            alert('Delete success!');
      }, function (response) {
            alert('Delete error!');
            $scope.errors=response;
          alert(response);
      });
  }
  $scope.btnDelete=function (id) {
    $scope.idDelete=id;
  }

  $scope.reverseFun=function () {
    $scope.sortReverse=!$scope.sortReverse;
  }

});


app.controller('myUpdateCtrl', function($scope,$http,$log,API,$rootScope){
    
    $scope.updateMember = function(index){
        var file = $scope.editMember.newPhoto;

        var fd = new FormData();
        fd.append('photo', file);
        fd.append("name", $scope.editMember.name);
        fd.append("address", $scope.editMember.address);
        fd.append("age", $scope.editMember.age);

        $http.post( API+'member/'+index, fd, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        }).then(function successCallback(response) {
            alert('Update success!');
           $rootScope.refreshPage();
           $('#editModal').modal('hide')
        },function errorCallback(response) {
            alert('Update error!');
            $scope.errors=response;
          console.log(response);
        });

    };
    
});


app.controller('myCreateCtrl', function($scope,$http,$log,API,$rootScope){
    
     $scope.createMember=function (newMember) {

      var file = $scope.newMember.photo;
        var fd = new FormData();
        fd.append('photo', file);
        fd.append("name", $scope.newMember.name);
        fd.append("address", $scope.newMember.address);
        fd.append("age", $scope.newMember.age);

        $http.post( API+'members/add', fd, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        }).then(function successCallback(data) {
            alert('Update success!');
            $('#createModal').modal('hide')
           $rootScope.refreshPage();
        },function errorCallback(response) {
            $scope.errors=response;
            alert(response);
          console.log(response);
        });

        $scope.newMember ={};
        $scope.newMember.photo =null;
      }
});
