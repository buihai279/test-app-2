@extends('layouts.app')

@section('content')
<div class="wrap" ng-app="myApp" ng-controller="myCtrl">
    
    <div class="container">

        <div class="row">
          <div class="alert alert-info">
              <p>Sort Type: @{{ sortType }}</p>
              <p>Sort Reverse: @{{ sortReverse }}</p>
              <p>Search Query: @{{ searchString }}</p>
          </div>

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
            <div class="col-md-12">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#createModal">
                  <i class="glyphicon glyphicon-plus"></i> Create member
                </button>
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
                                <td><img class="img-reponsive" width="100px" src="uploads/@{{member.photo}}"></td>
                                <td>
                                    <button type="button" class="btn btn-xs btn-info btn-block" data-toggle="modal" data-target="#editModal" ng-click="editMember(member.id)">Edit</button>
                                    <button type="button" class="btn btn-xs btn-danger btn-block" ng-click="btnDelete(member.id)" data-toggle="modal" data-target="#deleteModal">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div ng-include="'pagination.htm'"></div>
            </div>
        </div>
    </div>


    <div ng-include="'modal.htm'"></div>
</div>

<div ng-app="app">
    <div ng-controller="AppController">
        <input type="file" nv-file-select uploader="uploader"/><br/>
        <ul>
            <li ng-repeat="item in uploader.queue">
                Name: <span ng-bind="item.file.name"></span><br/>
                <button ng-click="item.upload()">upload</button>
            </li>
        </ul>
    </div>
</div>
@endsection
