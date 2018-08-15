(function() {
  'use strict';

  var app = angular.module('frmsApp', ['ui.router']);

  app.controller('mainCtrl', function($log, $scope, $http, $window) {

    $log.debug("mainController has been initiated!");
    var vm = $scope;

    // Function Declarations
    vm.getActionBoardMunicipality = getActionBoardMunicipality;
    vm.getAlertBarangays = getAlertBarangays;
    vm.getAlertMunicipality = getAlertMunicipality;
    vm.getCurrentDate = getCurrentDate;
    vm.getMarkerLevels = getMarkerLevels;
    vm.getMessagesFacebook = getMessagesFacebook;
    vm.getMessagesTwitter = getMessagesTwitter;

    // Variables
    vm.municipality = {
      name: "Marilao, Bulacan",
    };

    // Function Definitions

    // TODO: Get the Alert Levels of the Barangays
    function getAlertBarangays(targetDate) {
      $log.debug("getAlertBarangays function: target date = ", targetDate);

      // TODO: barangay name, alert level, average flood level, no. of affected people,
      //    risk and vulnerability info,
      //    barangay action board info
    }

    // TODO: Get the Municipality Alert Level and all other info needed for display
    function getAlertMunicipality(targetDate) {
      $log.debug("getAlertMunicipality function: target date = ", targetDate);

      // TODO: municipality name, alert level, cumulative rainfall, wind level,
      //    temperature and heat index
    }

    // TODO: Get the Municipality Action Board
    function getActionBoardMunicipality(targetDate) {
      $log.debug("getActionBoardMunicipality function: target date = ", targetDate);

      // TODO:
      //    State of calamity flag
      //    List of Barangays for Evacuation and action board for it
      //    List of Barangays for Continuous Monitoring and action board for it
      //    Start Recovery flag
    }

    // TODO: Get current date (to be used as input for other functions)
    function getCurrentDate() {
      $log.debug("getCurrentDate function");
    }

    // TODO: Get current Marker Levels
    function getMarkerLevels(targetDate) {
      $log.debug("getMarkerLevels function: target date = ", targetDate);

      // TODO:
      //    River & Flood markers and height
      //    Description will be dynamic on the front end part
    }

    // TODO: Collate facebook messages
    function getMessagesFacebook(targetDate) {
      $log.debug("getMessagesFacebook function: target date = ", targetDate);

      // TODO:
      //    Get last 5 messages with respect to the target date
    }

    // TODO: Collate twitter messages
    function getMessagesTwitter(targetDate) {
      $log.debug("getMessagesTwitter function: target date = ", targetDate);

      // TODO:
      //    Get last 5 messages with respect to the target date
    }


    
  });

})();
