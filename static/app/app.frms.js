(function() {
  'use strict';

  var app = angular.module('frmsApp', ['ui.router']);

  app.filter('capitalizeWord', function() {
    return function(text) {
      return (!!text) ? text.charAt(0).toUpperCase() + text.substr(1).toLowerCase() : '';
    }
  });

  app.controller('mainCtrl', function($log, $scope, $http, $window) {

    var vm = $scope;
    this.$onInit = onInit;

    // Function Declarations
    vm.getActionBoardMunicipality = getActionBoardMunicipality;
    vm.getAlertBarangays = getAlertBarangays;
    vm.getAlertMunicipality = getAlertMunicipality;
    vm.getCurrentDate = getCurrentDate;
    vm.getMarkerLevels = getMarkerLevels;
    vm.getMessagesFacebook = getMessagesFacebook;
    vm.getMessagesTwitter = getMessagesTwitter;
    vm.recalculateData = recalculateData;

    // Variables
    vm.allBarangays = {};
    vm.municipalityInfo = {};

    // Function Definitions

    function onInit() {
      var targetDate = "2015-07-15 08:00:00";

      $log.debug("mainController has been initiated!");
      recalculateData(targetDate);
    }

    // TODO: Get the Alert Levels of the Barangays
    function getAlertBarangays(targetDate) {
      $log.debug("getAlertBarangays function: target date = ", targetDate);

      // TODO: barangay name, alert level, average flood level, no. of affected people,
      //    risk and vulnerability info,
      //    barangay action board info

      vm.allBarangays = [
        {
          basic_info: {
            name: "saog",
            families: 2289,
            population: 11445,
            vulnerable: 4921,
          },
          alert: {
            level: 5,
            desc: "critical",
            action_required: "rescue & evacuation",
          },
          flood_status: {
            score: 14,
            desc: "Neck High",
            level: 1.12,
          },
        },
        {
          basic_info: {
            name: "lias",
            families: 2289,
            population: 11445,
            vulnerable: 4921,
          },
          alert: {
            level: 4,
            desc: "severe",
            action_required: "rescue & evacuation",
          },
          flood_status: {
            score: 10,
            desc: "Waist High",
            level: 0.7,
          },
        },
        {
          basic_info: {
            name: "poblacion 1st",
            families: 2289,
            population: 11445,
            vulnerable: 4921,
          },
          alert: {
            level: 3,
            desc: "high",
            action_required: "continuous monitoring",
          },
          flood_status: {
            score: 8,
            desc: "Knee High",
            level: 0.5,
          },
        },
        {
          basic_info: {
            name: "abangan norte",
            families: 2289,
            population: 11445,
            vulnerable: 4921,
          },
          alert: {
            level: 2,
            desc: "moderate",
            action_required: "continuous monitoring",
          },
          flood_status: {
            score: 5,
            desc: "Ankle High",
            level: 0.2,
          },
        },
        {
          basic_info: {
            name: "lambakin",
            families: 2289,
            population: 11445,
            vulnerable: 4921,
          },
          alert: {
            level: 1,
            desc: "normal",
            action_required: "none",
          },
          flood_status: {
            score: 2,
            desc: "No Flood",
            level: 0,
          },
        },
      ];

      $log.debug(vm.allBarangays);
    }

    // TODO: Get the Municipality Alert Level and all other info needed for display
    function getAlertMunicipality(targetDate) {
      $log.debug("getAlertMunicipality function: target date = ", targetDate);

      // TODO: municipality name, alert level, cumulative rainfall, wind level,
      //    temperature and heat index

      vm.municipalityInfo = {
        name: "Marilao, Bulacan",
        alert: {
          level: 5,
          desc: "critical",
        },
        weather: {
          rainfall: 80,
          wind: 120,
          temperature: 18,
          heat_index: 23,
        }
      };
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

    // Recalculate necessary data when target date changes
    // TODO: Use ng-change on this later on
    function recalculateData(targetDate) {
      $log.debug("recalculateData function: target date = ", targetDate);

      getAlertMunicipality(targetDate);
      getAlertBarangays(targetDate);
    }
    
  });

})();
