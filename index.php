<!DOCTYPE html>
<html ng-app="mainApp">
    <head>
        <title>Example</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/vendor.min.css" />
        <link rel="stylesheet" href="css/style.min.css" />
    </head>
    <body ng-controller="mainCtrl">
        <div id="modal" class="modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">{{modal.title}}</h4>
                    </div>
                    <div class="modal-body">
                        <p>{{modal.message}}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>    
        <div class="container-fluid">
            <div class="row">
                <div id="wrapper" class="col-sm-offset-2 col-md-offset-2 col-sm-8 col-md-8">
                    <h1>Users list</h1><hr>
                    <table class="table table-bordered table-striped table-condensed" ng-cloak>
                        <thead>
                            <tr>
                                <th>First name
                                    <button class="btn btn-primary btn-xs glyphicon glyphicon-triangle-bottom" ng-click="sortBy($event, 'firstName')"></button>
                                </th>
                                <th>Second name
                                    <button class="btn btn-primary btn-xs glyphicon glyphicon-triangle-bottom" ng-click="sortBy($event, 'secondName')"></button>
                                </th>
                                <th>E-mail
                                    <button class="btn btn-primary btn-xs glyphicon glyphicon-triangle-bottom" ng-click="sortBy($event, 'eMail')"></button>
                                </th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody ng-init="select()">
                            <tr ng-repeat="user in users | orderBy:property:reverse">
                                <td class="col-sm-3 col-md-3">
                                    <input type="text" placeholder="First name" ng-model="user.firstName" maxlength="20">
                                </td>
                                <td class="col-sm-3 col-md-3">
                                    <input type="text" placeholder="Second name" ng-model="user.secondName" maxlength="20">
                                </td>
                                <td class="col-sm-3 col-md-3">
                                    <input type="email" placeholder="address@mail.com" ng-model="user.eMail" maxlength="30">
                                </td>
                                <td class="col-sm-3 col-md-3" >
                                    <button class="refresh btn btn-primary" ng-click="update(user)">update <span class="glyphicon glyphicon-refresh"></span>
                                    </button>
                                    <button class="remove btn btn-danger" ng-click="delete(user)">remove <span class="glyphicon glyphicon-remove"></span>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <form class="row" name="mainForm">
                        <div class="form-group col-sm-3 col-md-3">
                            <input class="form-control" placeholder="First name" maxlength="20" required ng-model="newUser.firstName">
                        </div>
                        <div class="form-group col-sm-3 col-md-3">
                            <input class="form-control" placeholder="Second name" maxlength="20" required ng-model="newUser.secondName">
                        </div>
                        <div class="form-group col-sm-3 col-md-3">
                            <input type="email" class="form-control" placeholder="address@mail.com" maxlength="30" required ng-model="newUser.eMail">
                        </div>
                        <div class="form-group col-sm-3 col-md-3">
                            <button class="btn btn-success" ng-click="insert(newUser)">add user <span class="glyphicon glyphicon-plus"></span>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-sm-2 col-md-2"></div>
            </div>
        </div>
        <script src="js/vendor.min.js"></script>
        <script src="js/app.min.js"></script>
    </body>
</html>