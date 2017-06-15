@extends('layouts.app')

@section('content')
<div class="wrap" ng-app="myApp" ng-controller="myCtrl">
    
    <div class="container">

        <div class="row">

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
                                <th>Name</th>
                                <th>Address</th>
                                <th style="width: 5px">Age</th>
                                <th style="width: 40px">Photo</th>
                                <th style="width: 15px">#</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr ng-repeat="member in members">
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
                <div class="page_nav" style="text-align: center;">
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <li class="disabled">
                              <span>
                                <span aria-hidden="true">&laquo;</span>
                              </span>
                            </li>
                            <li class="active">
                              <span>1 <span class="sr-only">(current)</span></span>
                            </li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li>
                              <a href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                              </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
      <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit member: <b>@{{member.name}}</b></h4>
              </div>
          <div class="modal-body">
             <form>
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" ng-model="member.name">
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" ng-model="member.address" >
                  </div>
                  <div class="form-group">
                    <label>Age</label>
                    <input type="text" class="form-control" ng-model="member.age" >
                  </div>
                  <div class="form-group">
                    <label>Old Photo</label>
                    <img src="uploads/@{{member.photo}}"  class="img-reponsive" width="150px">
                  </div>
                  <div class="form-group">
                    <label>New Photo</label>
                    <input type="file">
                    <p class="help-block">Example block-level help text here.</p>
                  </div>
                </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal" ng-click="updateMember(member.id)"><i class="glyphicon glyphicon-floppy-saved"></i> Save changes</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Create member</h4>
          </div>
          <div class="modal-body">
                <form>
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" ng-model="newMember.name">
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" ng-model="newMember.address" >
                  </div>
                  <div class="form-group">
                    <label>Age</label>
                    <input type="text" class="form-control" ng-model="newMember.age" >
                  </div>
                  <div class="form-group">
                    <label >Photo</label>
                    <input type="file" ng-model="newMember.photo">
                    <p class="help-block">Example block-level help text here.</p>
                  </div>
                </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="btnAdd" ng-click="addMember()"><i class="glyphicon glyphicon-floppy-open"></i> Create member</button>
          </div>
        </div>
      </div>
    </div>


    <div class="modal fade " id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">You want delete?</h4>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-danger" ng-click="deleteMember(idDelete)"><i class="glyphicon glyphicon-trash"></i> Delete</button>
          </div>


        </div>
      </div>
    </div>
</div>
<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
@endsection
