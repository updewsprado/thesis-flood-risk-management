(function() {
  'use strict';

  var app = angular.module('frmsApp', ['ui.router']);

  app.controller('mainCtrl', function($log, $scope, $http, $window) {

    $log.debug("mainController has been initiated!");
    var vm = $scope;

    // Function Declarations
    vm.getActionBoardMunicipality = getActionBoardMunicipality;
    vm.getCurrentDate = getCurrentDate;
    vm.getMarkerLevels = getMarkerLevels;
    vm.getMessagesFacebook = getMessagesFacebook;
    vm.getMessagesTwitter = getMessagesTwitter;

    // Variables
    vm.municipality = {
      name: "Marilao, Bulacan",
    };

    // Function Definitions

    // TODO: Get the Municipality Action Board
    function getActionBoardMunicipality(targetDate) {
      $log.debug("getActionBoardMunicipality function: target date = ", targetDate);
    }

    // TODO: Get current date (to be used as input for other functions)
    function getCurrentDate() {
      $log.debug("getCurrentDate function");
    }

    // TODO: Get current Marker Levels
    function getMarkerLevels(targetDate) {
      $log.debug("getMarkerLevels function: target date = ", targetDate);
    }

    // TODO: Collate facebook messages
    function getMessagesFacebook(targetDate) {
      $log.debug("getMessagesFacebook function: target date = ", targetDate);
    }

    // TODO: Collate twitter messages
    function getMessagesTwitter(targetDate) {
      $log.debug("getMessagesTwitter function: target date = ", targetDate);
    }


    
  });

})();
