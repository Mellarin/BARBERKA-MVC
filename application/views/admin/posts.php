<?php
if(empty($_SESSION['admin'])){
    header('location: /'.'home');
    exit;
}
?>
<div style="color:black;"ng-app="barberka" ng-controller="barberkaController" class="container">
    <div style="font-size:35px; color:white; text-align:center; margin-top:-30px" class="card-header">Haircuts</div>
    <div class="table-responsive">
    <table datatable="ng" class="table table-bordered">
        <thead>
        <tr>
            <th style="font-size:30px; color:white;">ID</th>
            <th style="font-size:30px; color:white;">Name</th>
            <th style="font-size:30px; color:white;">Update</th>
            <th style="font-size:30px; color:white;">Delete</th>
        </tr>
        </thead>
        <tbody>
        <tr dir-paginate="haircuts in barberka_haircuts | itemsPerPage:pageSize ">
            <td style="font-size:25px;background-color:white;">{{haircuts.ID}}</td>
            <td style="font-size:25px; background-color:white;">{{haircuts.name}}</td>
            <td style="background:white;"><a href="/admin/edithaircut/{{haircuts.ID}}" class="btn btn-primary">Update</a></td>
            <td style="background:white;"><a href="/admin/deletehaircut/{{haircuts.ID}}" class="btn btn-danger">Delete</a></td>
        </tr>
        </tbody>
    </table>
    </div>
    <dir-pagination-controls max-size="5" direction-links="true" boundary-links="true" ></dir-pagination-controls>
    <br/>
    <br/>
</div>
<script>
    let app = angular.module('barberka', ['angularUtils.directives.dirPagination']);
    app.controller('barberkaController', function($scope){
            $scope.pageSize=5;
            $scope.barberka_haircuts = <?php echo json_encode($list)?>;
    });
</script>