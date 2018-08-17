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
    vm.clickedBarangayMoreInfo = clickedBarangayMoreInfo;
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
    vm.markerLevels = {};
    vm.messagesFacebook = {};
    vm.messagesTwitter = {};
    vm.municipalityInfo = {};
    vm.params = {};
    vm.targetDate;

    // Function Definitions

    function onInit() {
      vm.targetDate = "2014-09-19 8:00:00";

      $log.debug("mainController has been initiated!");
      recalculateData(vm.targetDate);
    }

    function clickedBarangayMoreInfo(barangay) {
      $log.debug("clickedBarangayMoreInfo", barangay);
      vm.params = barangay;
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
          shelters: [
            "Constantino Covered Court",
            "Nagbalong Covered Court"
          ],
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
          shelters: [
            "Guillermo Basketball Court",
            "Patubig Barangay Hall"
          ],
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
          shelters: [
            "Constantino Covered Court",
            "Nagbalong Covered Court"
          ],
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
          shelters: [
            "Guillermo Basketball Court",
            "Patubig Barangay Hall"
          ],
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
          shelters: [
            "Constantino Covered Court",
            "Nagbalong Covered Court"
          ],
        },
      ];

      $log.debug(vm.allBarangays);
    }

    // TODO: Get the Municipality Alert Level and all other info needed for display
    function getAlertMunicipality(targetDate) {
      $log.debug("getAlertMunicipality function: target date = ", targetDate);

      // TODO: municipality name, alert level, cumulative rain, wind level,
      //    temperature and heat index

      vm.municipalityInfo = {
        name: "Marilao, Bulacan",
        alert: {
          level: 5,
          desc: "critical",
        },
        // weather: {
        //   rain: 80,
        //   wind: 120,
        //   temperature: 18,
        //   heat_index: 23,
        // }
      };

      let api_url = '/municipality/weather/1/' + targetDate;
      $log.debug("api value: ", api_url);

      $http.get(api_url).then(function(resp) {
        $log.debug("Get Weather API", resp.data);
        vm.municipalityInfo.weather = resp.data;
      });

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

      vm.markerLevels = [
        {
          name: "Abangan Bridge",
          height: 8
        },
        {
          name: "Tabing Ilog Bridge",
          height: 10
        },
        {
          name: "San Jose Bridge",
          height: 7
        },
        {
          name: "Poblacion Marker",
          height: 6.5
        },
        {
          name: "SM Marker",
          height: 6
        },
        {
          name: "Lias Marker",
          height: 4
        },
        {
          name: "Ibayo Marker",
          height: 2
        },
      ];

      // Reproduce row class and desc from height level
      for (var i = 0; i < vm.markerLevels.length; i++) {
        let height = vm.markerLevels[i].height;

        if (height >= 8) {
          vm.markerLevels[i].rowClass = "critical";
          vm.markerLevels[i].desc = "Critical";
        } 
        else if (height > 6) {
          vm.markerLevels[i].rowClass = "high";
          vm.markerLevels[i].desc = "High";
        }
        else if (height > 4) {
          vm.markerLevels[i].rowClass = "mid-high";
          vm.markerLevels[i].desc = "Mid High";
        }
        else if (height > 2) {
          vm.markerLevels[i].rowClass = "medium";
          vm.markerLevels[i].desc = "Medium";
        }
        else {
          vm.markerLevels[i].rowClass = "none";
          vm.markerLevels[i].desc = "Normal";
        }
      }
    }

    // Collate facebook messages
    function getMessagesFacebook(targetDate) {
      $log.debug("getMessagesFacebook function: target date = ", targetDate);

      let api_url = '/messages/facebook/1/' + targetDate;
      $log.debug("api value: ", api_url);

      $http.get(api_url).then(function(resp) {
        $log.debug("Get Facebook Messages API", resp.data);
        vm.messagesFacebook = resp.data;
      });
    }

    // TODO: Collate twitter messages
    function getMessagesTwitter(targetDate) {
      $log.debug("getMessagesTwitter function: target date = ", targetDate);

      // TODO:
      //    Get last 5 messages with respect to the target date

      vm.messagesTwitter = [
        {
          ts: "2018-06-12 20:30",
          sender: "test",
          message: "Wala pong kuryente dito sa may Abangan"
        },
        {
          ts: "2018-06-12 18:30",
          sender: "test2",
          message: "Stranded na po kami dito sa may SM Marilao"
        },
        {
          ts: "2018-06-12 15:30",
          sender: "test3",
          message: "Nagbabara na po ang mga kanal sa amin"
        },
      ]; 
    }

    // Recalculate necessary data when target date changes
    // TODO: Use ng-change on this later on
    function recalculateData(targetDate) {
      $log.debug("recalculateData function: target date = ", targetDate);

      getAlertMunicipality(targetDate);
      getAlertBarangays(targetDate);
      getMarkerLevels(targetDate);
      getMessagesFacebook(targetDate);
      getMessagesTwitter(targetDate);
    }
    
  });

})();
