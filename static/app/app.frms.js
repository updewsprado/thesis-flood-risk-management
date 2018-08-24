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
    vm.allBarangays = [];
    vm.markerLevels = {};
    vm.messagesFacebook = {};
    vm.messagesTwitter = {};
    vm.municipalityInfo = {};
    vm.params = {};
    vm.targetDate;

    // Function Definitions

    function onInit() {
      vm.targetDate = "2014-09-19 0:00:00";

      $log.debug("mainController has been initiated!");
      recalculateData(vm.targetDate);
    }

    function clickedBarangayMoreInfo(barangay) {
      $log.debug("clickedBarangayMoreInfo", barangay);
      vm.params = barangay;
    }

    // Get the Alert Levels of the Barangays
    function getAlertBarangays(targetDate) {
      $log.debug("getAlertBarangays function: target date = ", targetDate);

      // vm.allBarangays = [
        // {
        //   basic_info: {
        //     name: "saog",
        //     families: 2289,
        //     population: 11445,
        //     vulnerable: 4921,
        //   },
        //   alert: {
        //     level: 5,
        //     desc: "critical",
        //     action_required: "rescue & evacuation",
        //   },
        //   flood_status: {
        //     score: 14,
        //     desc: "Neck High",
        //     level: 1.12,
        //   },
        //   shelters: [
        //     "Constantino Covered Court",
        //     "Nagbalong Covered Court"
        //   ],
        // },
      // ];

      // getBarangayBasicInfo
      let api_barangays_all = '/municipality/all_barangays/1/';
      $log.debug("api value: ", api_barangays_all);

      $http.get(api_barangays_all).then(function(resp) {
        $log.debug("Get Municipality Barangays All API", resp.data);

        var i = 0;
        for (i = 0; i < resp.data.length; i++) {
          vm.allBarangays[i] = {};
          vm.allBarangays[i].basic_info = resp.data[i];

          let ctr = i;

          // getBarangayAlert
          getBarangayAlert(vm.allBarangays[ctr].basic_info.id, targetDate).then(function(response) {
            vm.allBarangays[ctr].alert = response;
          });

          // getBarangayFloodStatus
          getBarangayFloodStatus(vm.allBarangays[ctr].basic_info.id, targetDate).then(function(response) {
            vm.allBarangays[ctr].flood_status = response;
          });

          // getBarangayShelters
          getBarangayShelters(vm.allBarangays[ctr].basic_info.id).then(function(response) {
            vm.allBarangays[ctr].shelters = response;
          });
        };

        $log.debug("all barangays", vm.allBarangays);
      });
    }

    function getBarangayAlert(barangayId, targetDate) {
      let api_alert = '/barangay/alert_level/' + barangayId + '/' + targetDate;
      $log.debug("api value: ", api_alert);

      return $http.get(api_alert).then(function(resp) {
        $log.debug("Get Barangay Alert API", resp.data);
        let balert = {};
        balert.level = resp.data.level;
        balert.desc = resp.data.adesc;
        balert.action_required = "Standby";

        return balert;
      });
    }

    function getBarangayFloodStatus(barangayId, targetDate) {
      let api_flood = '/barangay/flood_level/' + barangayId + '/' + targetDate;
      $log.debug("api value: ", api_flood);

      return $http.get(api_flood).then(function(resp) {
        $log.debug("Get Barangay Flood API", resp.data);
        let bflood = {};
        bflood.score = resp.data.score;
        bflood.level = resp.data.level;
        bflood.desc = resp.data.adesc;

        return bflood;
      });
    }

    function getBarangayShelters(barangayId) {
      let api_shelter = '/barangay/shelters/' + barangayId;
      $log.debug("api value: ", api_shelter);

      return $http.get(api_shelter).then(function(resp) {
        $log.debug("Get Barangay Shelter API", resp.data);

        let bshelters = [];
        for (var i = 0; i < resp.data.length; i++) {
          bshelters.push(resp.data[i].name);
        };
        return bshelters;
      });
    }

    // Get the Municipality Alert Level and all other info needed for display
    function getAlertMunicipality(targetDate) {
      $log.debug("getAlertMunicipality function: target date = ", targetDate);

      // municipality name, alert level, cumulative rain, wind level,
      //    temperature and heat index

      vm.municipalityInfo = {
        name: "Marilao, Bulacan",
        // alert: {
        //   level: 5,
        //   adesc: "critical",
        // },
        // weather: {
        //   rain: 80,
        //   wind: 120,
        //   temperature: 18,
        //   heat_index: 23,
        // }
      };

      let api_alert = '/municipality/alert_level/1/' + targetDate;
      $log.debug("api value: ", api_alert);

      $http.get(api_alert).then(function(resp) {
        $log.debug("Get Municipality Alert API", resp.data);
        vm.municipalityInfo.alert = {};
        vm.municipalityInfo.alert.level = resp.data.level;
        vm.municipalityInfo.alert.desc = resp.data.adesc;
      });

      let api_weather = '/municipality/weather/1/' + targetDate;
      $log.debug("api value: ", api_weather);

      $http.get(api_weather).then(function(resp) {
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

    // Get current Marker Levels
    function getMarkerLevels(targetDate) {
      $log.debug("getMarkerLevels function: target date = ", targetDate);

      let api_url = '/markers/levels/' + targetDate;
      $log.debug("api value: ", api_url);

      $http.get(api_url).then(function(resp) {
        $log.debug("Get Marker Levels API", resp.data);
        vm.markerLevels = resp.data;
        appendMarkerLevelDesc();
      });
    }

    function appendMarkerLevelDesc() {
      // Reproduce row class and desc from height level
      for (var i = 0; i < vm.markerLevels.length; i++) {
        let height = vm.markerLevels[i].height;
        let mtype = vm.markerLevels[i].marker_type;

        if (mtype == "River") {
          if (height >= 15) {
            vm.markerLevels[i].rowClass = "critical";
            vm.markerLevels[i].desc = "Critical";
          } 
          else if (height >= 13) {
            vm.markerLevels[i].rowClass = "high";
            vm.markerLevels[i].desc = "High";
          }
          else if (height >= 11) {
            vm.markerLevels[i].rowClass = "mid-high";
            vm.markerLevels[i].desc = "Mid High";
          }
          else if (height >= 10) {
            vm.markerLevels[i].rowClass = "medium";
            vm.markerLevels[i].desc = "Medium";
          }
          else {
            vm.markerLevels[i].rowClass = "none";
            vm.markerLevels[i].desc = "Normal";
          }
        }
        else if (mtype == "Flood") {
          if (height >= 1.25) {
            vm.markerLevels[i].rowClass = "critical";
            vm.markerLevels[i].desc = "Critical";
          } 
          else if (height >= 0.64) {
            vm.markerLevels[i].rowClass = "high";
            vm.markerLevels[i].desc = "High";
          }
          else if (height >= 0.34) {
            vm.markerLevels[i].rowClass = "mid-high";
            vm.markerLevels[i].desc = "Mid High";
          }
          else if (height >= 0.1) {
            vm.markerLevels[i].rowClass = "medium";
            vm.markerLevels[i].desc = "Medium";
          }
          else {
            vm.markerLevels[i].rowClass = "none";
            vm.markerLevels[i].desc = "Normal";
          }
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

    // Collate twitter messages
    function getMessagesTwitter(targetDate) {
      $log.debug("getMessagesTwitter function: target date = ", targetDate);

      let api_url = '/messages/twitter/1/' + targetDate;
      $log.debug("api value: ", api_url);

      $http.get(api_url).then(function(resp) {
        $log.debug("Get Twitter Messages API", resp.data);
        vm.messagesTwitter = resp.data;
      });
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
