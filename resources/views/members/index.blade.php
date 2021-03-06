@extends('layouts.app')

@section('content')
<style type="text/css">
  .modal {
 overflow-y: auto;
}

.modal-open {
 overflow: auto;
}
</style>
<div class="wrap" ng-app="myApp" ng-controller="ParentCtrl">
    
    <div class="container">

        <div class="row">
          <form>
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon"><i class="glyphicon glyphicon-search"></i></div>
                <input type="text" class="form-control" placeholder="Search name, address, age" ng-model="searchString">
              </div>
            </div>
          </form>

          <div class="alert alert-success alert-dismissible" role="alert" id="notify" style="display: none;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Success!</strong><span id="content-notify"></span>
          </div>
          <div ng-include="'modal-create.htm'"></div>
            <div class="col-md-12">
                <div ng-include="'modal.htm'"></div>
                <h3>List memmbers</h3>
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="width: 5px">ID</th>
                                <th>
                                    <div class="pull-left">
                                      <a href="" ng-click="sortType = 'name'; sortReverse = !sortReverse">Name</a>
                                    </div>
                                    <div class="pull-right">
                                      <div class="btn-group btn-group-xs" role="group">
                                        <button type="button" class="btn btn-default" ng-click="reverseFun()" ng-show="sortType == 'name' && !sortReverse">
                                          <i class="glyphicon glyphicon-arrow-up"></i>
                                        </button>
                                        <button type="button" class="btn btn-default" ng-click="reverseFun()" ng-show="sortType == 'name' && sortReverse">
                                          <i class="glyphicon glyphicon-arrow-down"></i>
                                        </button>
                                      </div>
                                    </div>
                                </th>
                                <th>
                                    <div class="pull-left">
                                      <a href="" ng-click="sortType = 'address'; sortReverse = !sortReverse">Address</a>
                                    </div>
                                    <div class="pull-right">
                                      <div class="btn-group btn-group-xs" role="group">
                                        <button type="button" class="btn btn-default" ng-click="reverseFun()" ng-show="sortType == 'address' && !sortReverse">
                                          <i class="glyphicon glyphicon-arrow-up"></i>
                                        </button>
                                        <button type="button" class="btn btn-default" ng-click="reverseFun()" ng-show="sortType == 'address' && sortReverse">
                                          <i class="glyphicon glyphicon-arrow-down"></i>
                                        </button>
                                      </div>
                                    </div>
                                </th>

                                <th>
                                    <div class="pull-left">
                                      <a href="" ng-click="sortType = 'age'; sortReverse = !sortReverse">Age</a>
                                    </div>
                                    <div class="pull-right">
                                      <div class="btn-group btn-group-xs" role="group">
                                        <button type="button" class="btn btn-default" ng-click="reverseFun()" ng-show="sortType == 'age' && !sortReverse">
                                          <i class="glyphicon glyphicon-arrow-up"></i>
                                        </button>
                                        <button type="button" class="btn btn-default" ng-click="reverseFun()" ng-show="sortType == 'age' && sortReverse">
                                          <i class="glyphicon glyphicon-arrow-down"></i>
                                        </button>
                                      </div>
                                    </div>
                                  </th>
                                <th style="width: 40px">Photo</th>
                                <th style="width: 15px">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="member in members| orderBy:sortType:sortReverse  | filter:searchString"">
                                <td>@{{member.id}}</td>
                                <td>@{{member.name}}</td>
                                <td>@{{member.address}}</td>
                                <td>@{{member.age}}</td>
                                <td>
                                  <img class="img-reponsive" width="100px" src="../storage/app/photo/@{{member.photo}}" ng-hide="member.photo == null">
                                </td>
                                <td>
                                    <button type="button" class="btn btn-xs btn-info btn-block" data-toggle="modal" data-target="#editModal" ng-click="getEditMember(member.id)">Edit</button>
                                    <button type="button" class="btn btn-xs btn-danger btn-block" ng-click="btnDelete(member.id)" data-toggle="modal" data-target="#deleteModal">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div ng-include="'edit-modal.htm'"></div>
</div>
@endsection
