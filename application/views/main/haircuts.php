<section class="haircuts" id="Haircuts" ng-app="paginationApp" ng-controller="paginationController">
    <h1 class="heading"> Popular haircuts </h1>
    <div class="box-container">
        <?php foreach($list as $value): ?>
                <?php $image='public/usersImages/'.$value['ID'].'.jpg' ?>
            <div class="box">
                <img src="<?php if(file_exists($image)){ echo $image; } else { echo '/public/imagesOfAccounts/Fish.jpg';} ?>" alt="">
                <div class="info">
                    <h3><?php echo $value['name'] ?></h3>
                    <p><?php echo $value['description'] ?></p>
                    <a href="<? echo '/haircut/'.$value['ID']?>" class="btn">Details</a>
                </div>
            </div>
        <?php endforeach; ?>
        <div align="right">
            <dir-pagination-controls max-size="5" direction-links="true" boundary-links="true" >HELLO</dir-pagination-controls>
        </div>
    </div>
    <script>
        var pagin = angular.module('paginationApp', ['angularUtils.directives.dirPagination']);
        pagin.controller('paginationController', function($scope, $http){
            $http.get('pagination.php').success(function(data){
                $scope.allData = data;
            });
        });
    </script>
</section>
