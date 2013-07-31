'use strict';
var ctrl = angular.module('gstarApp', ['ui','ui.bootstrap','blueimp.fileupload'], function($routeProvider, $locationProvider) {
    $routeProvider.when('/', {
        templateUrl: 'taxonomy/taxo_list',
        controller: 'getTaxonomyData'
    });
    $routeProvider.when('/parent/:parent_id', {
        templateUrl: 'taxonomy/taxo_list',
        controller: 'getTaxonomyData'
    });
});

var app_url = 'http://gstar.local/admin/product/taxonomy/';
var url = '/upload_image';

ctrl.config(function($interpolateProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
});

ctrl.factory('taxonomies', function(){
    return {list: []}
});

ctrl.factory('ids', function(){
    return {ids: 0}
});

ctrl.controller('taxonomy', function($scope, $dialog, $route, $routeParams, $location, taxonomies, ids) {
    // Inlined template for demo
    var t = '<div class="modal-header">'+
            '<h3>修改分類資料</h3>'+
            '</div>'+
            '<div class="modal-body">'+
            '<p>名稱：<input ng-model="edit_name" placeholder="分類名稱" required /></p>'+
            '</div>'+
            '<div class="modal-footer">'+
            '<button ng-click="close(edit_name)" class="btn btn-primary" >Close</button>'+
            '</div>';
    $scope.opts = {
        backdrop: true,
        keyboard: true,
        backdropClick: true,
        dialogFade: true,
        template:  t, // OR: templateUrl: 'path/to/view.html',
        controller: 'DialogController'
    };
    $scope.openDialog = function(id){
        ids.ids = id;
        var d = $dialog.dialog($scope.opts);
        d.open().then(function(result){
            if(result) {
                alert('輸入結果為：' + result);

            }
        });
    };
});

ctrl.controller('DialogController', function($scope, dialog, taxonomies, ids){
    var obj = taxonomies.list[ids.ids];
    $scope.edit_name = obj.name;
    $scope.close = function(result){
        dialog.close(result);
    };
});

ctrl.controller('getTaxonomyData', function($scope, $routeParams, taxonomies, ids) {
    $.getJSON(app_url+'getItems/'+$routeParams.parent_id, function(res){
        taxonomies.list = res.list;
        $scope.parent_name = res.parent_name;
        $scope.$apply(function () {
            $scope.taxonomies = res.list;
        });
    });
    $scope.addTaxonomy = function() {
        var item = this.new_item;
        var parent_id = $routeParams.parent_id;
        $.ajax({
            url: app_url+'add_taxonomy',
            dataType: 'json',
            data: 'new_item='+item+'&parent_id='+parent_id,
            type: 'post',
            success: function(res){
                console.log(res);
                $scope.$apply(function () {
                    $scope.taxonomies.push(res);
                });
            }
        });
    }
});

ctrl.controller('DemoFileUploadController', ['$scope', '$http', '$filter', '$window',
    function ($scope, $http, $filter, $window) {
        $scope.loadingFiles = true;
        $scope.options = {
            url: url
        };
        $http.get(url)
            .then(
                function (response) {
                    console.log(response);
                    $scope.loadingFiles = false;
                    $scope.queue = response.data.files || [];
                },
                function () {
                    $scope.loadingFiles = false;
                }
            );
    }
])

ctrl.controller('FileDestroyController', ['$scope', '$http',
    function ($scope, $http) {
        var file = $scope.file,
            state;
        if (file.url) {
            file.$state = function () {
                return state;
            };
            file.$destroy = function () {
                state = 'pending';
                return $http({
                    url: file.deleteUrl,
                    method: file.deleteType
                }).then(
                    function () {
                        state = 'resolved';
                        $scope.clear(file);
                    },
                    function () {
                        state = 'rejected';
                    }
                );
            };
        } else if (!file.$cancel && !file._index) {
            file.$cancel = function () {
                $scope.clear(file);
            };
        }
    }
]);

ctrl.directive('ibutton', function($timeout) {
    return {
        restrict: 'A',
        require: 'ngModel',
        link: function(scope, element, attrs, ngModel) {
            var loadIButton = function() {
                angular.element(element).iButton({
                    display: function(value, srcData) {
                        ngModel.$setViewValue(value);
                        scope.$apply();
                    }
                });
            }
            $timeout(function() {
                loadIButton();
            }, 10);
        }
    };
});

// ctrl.directive('xeditable', function($timeout) {
//     return {
//         restrict: 'A',
//         require: 'ngModel',
//         link: function(scope, element, attrs, ngModel) {
//             var loadXeditable = function() {
//                 angular.element(element).editable({
//                     display: function(value, srcData) {
//                         ngModel.$setViewValue(value);
//                         scope.$apply();
//                     }
//                 });
//             }
//             $timeout(function() {
//                 loadXeditable();
//             }, 10);
//         }
//     };
// });
