var ctrl = angular.module('gstarApp', ['ui','ui.bootstrap','blueimp.fileupload'], function($routeProvider, $locationProvider) {
    $routeProvider.when('/', {
        templateUrl: 'taxo_list',
        controller: 'getTaxonomyData'
    });
    $routeProvider.when('/parent/:parent_id', {
        templateUrl: 'taxo_list',
        controller: 'getTaxonomyData'
    });
});

var app_url = 'http://gstar.local/admin/product/taxonomy/';
var url = '/upload_image';
var tmp_ids = 0;

ctrl.config(function($interpolateProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
});

ctrl.factory('taxonomies', function(){
    return {list: []}
});

// 產品設定
ctrl.controller('product', function($scope){

});

ctrl.controller('tab_ctrl', function($scope){
    var id = $('#id').val();
    console.log(id);
    $scope.tabList = [];
    $scope.models = {};
    $scope.content = {};
    if(id != ''){
        $.ajax({
            url: '/admin/product/getTabs/'+id,
            dataType: 'json',
            success: function(data){
                $.each(data, function(i, v){
                    $scope.$apply(function () {
                        $scope.models[v.tab_key] = v.title;
                        $scope.content[v.tab_key] = v.content;
                        $scope.tabList.push(v.tab_key);
                    });
                })
            }
        });
    }
    $scope.addTab = function() {
        var key = keyGen();
        while(angular.isDefined($scope.models[key])) {
            key = keyGen();
        }

        $scope.models[key] = '';
        $scope.tabList.push(key);
    }

    $scope.closeTab = function(tab) {
        var flag = confirm('確定刪除此頁面？');
        if(flag) {
            delete $scope.models[tab];
            delete $scope.content[content];
            tmp_ar = $scope.tabList;
            $scope.tabList = [];
            $.each(tmp_ar, function(i,v){
                if(v == tab){

                } else {
                    $scope.tabList.push(v);
                }
            });
        }
    }

    function keyGen() {
        return 'model-' + Math.round(Math.random() * 1000);
    }
});

ctrl.controller('DialogController', function($scope, dialog, taxonomies){
    var obj = taxonomies.list[tmp_ids];
    $scope.edit_name = obj.name;
    $scope.edit_id = obj.id;

    $scope.dialog_close = function(result){
        dialog.close(result);
    };

    $scope.save = function() {
        $.ajax({
            url: app_url+'edit',
            dataType: 'json',
            data: 'pk='+$scope.edit_id+'&value='+$scope.edit_name,
            type: 'post'
        });
    }

});

ctrl.controller('getTaxonomyData', function($scope, $dialog, $routeParams, taxonomies) {
    $.getJSON(app_url+'getItems/'+$routeParams.parent_id, function(res){
        taxonomies.list = res.list;
        $scope.parent_name = res.parent_name;
        $scope.$apply(function () {
            $scope.taxonomies = res.list;
        });
    });
    var t = '<div class="modal-header">'+
            '<h3>修改分類資料</h3>'+
            '</div>'+
            '<div class="modal-body">'+
            '<p>名稱：<input ng-model="edit_name" placeholder="分類名稱" required /></p>'+
            '<p><input type="hidden" name="id" ng-model="edit_id">'+
            '<button ng-click="save()" class="btn btn-primary">儲存</button></p>'+
            '</div>'+
            '<div class="modal-footer">'+
            '<button ng-click="dialog_close(edit_name)" class="btn btn-primary" >Close</button>'+
            '</div>';
    $scope.opts = {
        backdrop: true,
        keyboard: true,
        backdropClick: true,
        dialogFade: true,
        template: t,
        controller: 'DialogController'
    };
    $scope.openDialog = function(index){
        tmp_ids = index;
        $scope.d = $dialog.dialog($scope.opts);
        $scope.d.open().then(function(result){
            console.log(result);
            // $scope.$apply(function () {
                $scope.taxonomies[tmp_ids].name = result;
            // });
        });
    };

    $scope.addTaxonomy = function() {
        var item = this.new_item;
        var parent_id = $routeParams.parent_id;
        $.ajax({
            url: app_url+'add_taxonomy',
            dataType: 'json',
            data: 'new_item='+item+'&parent_id='+parent_id,
            type: 'post',
            success: function(res){
                $scope.$apply(function () {
                    $scope.taxonomies.push(res);
                });
            }
        });
    }
    $scope.deleTaxonomy = function(index) {
        var flag = confirm('確定刪除此分類？');
        if(flag) {
            var obj = $scope.taxonomies[index];
            $.ajax({
                url: app_url+'delete',
                dataType: 'json',
                data: 'pk='+obj.id,
                type: 'post',
                success: function(){
                    $scope.$apply(function () {
                        $scope.taxonomies.splice(index, 1);
                    });
                }
            });
        }
    }
    $scope.chgStatus = function(index) {
        var obj = $scope.taxonomies[index];
        if(obj.status) {
            obj.status = 0;
        } else {
            obj.status = 1;
        }

        $.ajax({
            url: app_url+'updateStatus',
            dataType: 'json',
            data: 'pk='+obj.id+'&value='+obj.status,
            type: 'post'
        });
    }

    $scope.updateSort = function(){
        ids = [];
        var e, i, _i, _len, _ref;
        _ref = $scope.taxonomies;
        for (i = _i = 0, _len = _ref.length; _i < _len; i = ++_i) {
            ids.push(_ref[i].id);
        }

        $.ajax({
            url: app_url+'updateSort',
            dataType: 'json',
            data: 'ids='+ids.join(','),
            type: 'post'
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

ctrl.directive('wysihtml', function($timeout) {
    return {
        restrict: 'A',
        require: 'ngModel',
        link: function(scope, element, attrs, ngModel) {
            var loadWysihtml = function() {
                angular.element(element).wysihtml5({
                    "font-styles": true,
                    "emphasis": true,
                    "lists": true,
                    "html": false,
                    "link": true,
                    "stylesheets": false,
                    "image": true,
                    "color": false,
                    display: function(value, srcData) {
                        ngModel.$setViewValue(value);
                        scope.$apply();
                    }
                });
            }
            $timeout(function() {
                loadWysihtml();
            }, 10);
        }
    };
});

ctrl.directive('ibutton', function($timeout) {
    return {
        restrict: 'A',
        require: 'ngModel',
        link: function(scope, element, attrs, ngModel) {
            var loadIButton = function() {
                angular.element(element).iButton({
                    change: function(){scope.chgStatus(scope.$index)},
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
