(function() {
  'use strict';

  var app = angular.module('frmsApp', []);

  app.controller('mainCtrl', function($log, $scope, $http, $window) {

    $log.debug("mainController has been initiated!");
    var vm = $scope;
    vm.municipality = "Marilao, Bulacan";
  });

})();
