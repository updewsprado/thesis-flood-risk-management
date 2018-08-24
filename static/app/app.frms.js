(function() {
  'use strict';

  var app = angular.module('frmsApp', ['ui.router', 'moment-picker']);

  app.filter('capitalizeWord', function() {
    return function(text) {
      return (!!text) ? text.charAt(0).toUpperCase() + text.substr(1).toLowerCase() : '';
    }
  });

  app.controller('mainCtrl', function($log, $scope, $http, $window, $q) {

    var vm = $scope;
    this.$onInit = onInit;

    // Function Declarations
    vm.clickedBarangayMoreInfo = clickedBarangayMoreInfo;
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
    vm.momentDate;

    // Function Definitions

    function onInit() {
      let initDate = "2014-09-19 3:00";
      vm.momentDate = moment(initDate);
      vm.targetDate = vm.momentDate.format("YYYY-MM-DD HH:mm");

      $log.debug("mainController has been initiated!", vm.targetDate, vm.momentDate, vm.testDate);
      recalculateData(vm.targetDate);
    }

    function clickedBarangayMoreInfo(barangay) {
      $log.debug("clickedBarangayMoreInfo", barangay);
      vm.params = barangay;

      // actionBoardComposition(barangay);
    }

    function actionBoardComposition(barangay) {
      $log.debug("actionBoardComposition", barangay);
      // Compute for risk factor
      barangay.risk = computeRiskFactor(barangay);

      // Compute affected population
      barangay.basic_info.affected = computeAffectedPopulation(barangay);

      // Action Board

      // Evacuate Now
      actionEvacuateNow(barangay);

      // Continuous Monitoring
      actionContinuousMonitoring(barangay);

      // Coordinate with shelters
      actionCoordinateWithShelters(barangay);

      // Ask LGU for Rescuers
      actionAskForRescuers(barangay);

      // Normal Operations
      actionNormalOperations(barangay);

      // Start Recovery
      actionStartRecovery(barangay);

      // TODO:
      // isStartRecovery: false,
    }

    function actionEvacuateNow(barangay) {
      let flood_score = barangay.flood_status.score;
      let risk_score = barangay.risk_score;

      $log.debug("actionEvacuateNow", flood_score, risk_score);
      barangay.action_board.isEvacuateNow = ((flood_score >= 10) && (risk_score >= 4.5));
    }

      // Continuous Monitoring
    function actionContinuousMonitoring(barangay) {
      $log.debug("actionContinuousMonitoring", barangay);
      let alert_level = barangay.alert.level;

      barangay.action_board.isContinuousMonitoring = (alert_level >= 2);
    }

      // Coordinate with shelters
    function actionCoordinateWithShelters(barangay) {
      $log.debug("actionCoordinateWithShelters", barangay);
      let alert_score = barangay.alert.score;
      let flood_score = barangay.flood_status.score;

      barangay.action_board.isCoordinateWithShelters = ((flood_score >= 8) && (alert_score >= 8));
    }

      // Ask LGU for Rescuers
    function actionAskForRescuers(barangay) {
      $log.debug("actionAskForRescuers", barangay);
      let flood_score = barangay.flood_status.score;

      barangay.action_board.isAskLGUForRecuers = (flood_score >= 10);
    }

      // Normal Operations
    function actionNormalOperations(barangay) {
      $log.debug("actionNormalOperations", barangay);
      let flood_score = barangay.flood_status.score;
      let risk_score = barangay.risk_score;

      barangay.action_board.isNormalOperations = ((flood_score <= 2) && (risk_score <= 2));
    }

      // Start Recovery
    function actionStartRecovery(barangay) {
      $log.debug("actionStartRecovery", barangay);
      let bgy_id = barangay.basic_info.id;

      let api_bgy_recovery = '/barangay/is_recovering/' + bgy_id +'/' + vm.targetDate;
      $log.debug("api value: ", api_bgy_recovery);

      $http.get(api_bgy_recovery).then(function(resp) {
        $log.debug("Get Municipality Start Recovery API", resp.data);
        barangay.action_board.isStartRecovery = (resp.data == "true");
      });
    }

    function computeRiskFactor(barangay) {
      $log.debug("computeRiskFactor", barangay);

      let hazard = barangay.alert.hscore;
      let exposure = barangay.basic_info.exposure;
      let vulnerability = barangay.basic_info.vulnerability;
      let capacity = barangay.basic_info.capacity;
      let flood_score = parseInt(barangay.flood_status.score);
      let risk = parseInt((hazard * exposure * vulnerability) / capacity);
      barangay.risk_score = risk;
      barangay.alert.score = barangay.risk_score + flood_score;

      if (risk < 1.6) {
        return "low";
      } 
      else if (risk < 3.5) {
        return "moderate";
      }
      else if (risk < 5) {
        return "mid-high";
      }
      else if (risk < 7) {
        return "high";
      }
      else {
        return "very high";
      }
    }

    function computeAffectedPopulation(barangay) {
      $log.debug("computeAffectedPopulation", barangay);

      let alevel = barangay.alert.level;
      let population = barangay.basic_info.population;

      if (alevel == 1) {
        return 0;
      } 
      else if (alevel == 2) {
        return Math.round(population / 1.75);
      }
      else if (alevel == 3) {
        return Math.round(population / 1.5);
      }
      else if (alevel == 4) {
        return Math.round(population / 1.35);
      }
      else {
        return Math.round(population / 1.2);
      }
    }

    // Get the Alert Levels of the Barangays
    function getAlertBarangays(targetDate) {
      $log.debug("getAlertBarangays function: target date = ", targetDate);

      // getBarangayBasicInfo
      let api_barangays_all = '/municipality/all_barangays/1/';
      $log.debug("api value: ", api_barangays_all);

      $http.get(api_barangays_all).then(function(resp) {
        $log.debug("Get Municipality Barangays All API", resp.data);

        var i = 0;
        for (i = 0; i < resp.data.length; i++) {
          vm.allBarangays[i] = {};
          vm.allBarangays[i].basic_info = resp.data[i];
          vm.allBarangays[i].action_board = {
            isEvacuateNow: false,
            isContinuousMonitoring: false,
            isCoordinateWithShelters: false,
            isAskLGUForRecuers: false,
            isStartRecovery: false,
            isNormalOperations: false
          };

          let ctr = i;

          $q.all([
            getBarangayAlert(vm.allBarangays[ctr].basic_info.id, targetDate),
            getBarangayFloodStatus(vm.allBarangays[ctr].basic_info.id, targetDate),
            getBarangayShelters(vm.allBarangays[ctr].basic_info.id)
          ]).then(function(data) {
            vm.allBarangays[ctr].alert = data[0];
            vm.allBarangays[ctr].flood_status = data[1];
            vm.allBarangays[ctr].shelters = data[2];

            actionBoardComposition(vm.allBarangays[ctr]);

            // Municipality Action Board Composition
            actionsMunCompositionFromBarangay(vm.allBarangays[ctr])
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
        balert.hscore = resp.data.hscore;

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
        // name: "Marilao, Bulacan",
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
        vm.municipalityInfo.name = resp.data.full_address;
        vm.municipalityInfo.alert = {};
        vm.municipalityInfo.alert.level = resp.data.level;
        vm.municipalityInfo.alert.desc = resp.data.adesc;
        vm.municipalityInfo.action_board = {
          isStateOfCalamity: false,
          isEvacuateNow: false,
          isCoordinateWithDSWD: false,
          isContinuousMonitoring: false,
          isSheltersReadyReminder: false,
          isRescuersOnAlert: false,
          isSendWarningsToBarangay: false,
          isStartRecovery: false,
          listEvacuation: [],
          listContinuousMonitoring: [],
          listNeedRescuers: [],
        };

        actionMunStateOfCalamity();
        actionMunStartRecovery();
      });

      let api_weather = '/municipality/weather/1/' + targetDate;
      $log.debug("api value: ", api_weather);

      $http.get(api_weather).then(function(resp) {
        $log.debug("Get Weather API", resp.data);
        vm.municipalityInfo.weather = resp.data;
      });
    }

    // TODO: Get the Municipality Action Board
    function actionsMunCompositionFromBarangay(barangay) {
      actionMunEvacuateNow(barangay);
      actionMunContinuousMonitoring(barangay);

      $log.debug("municipalityInfo:", vm.municipalityInfo);
    }

    function actionMunStateOfCalamity() {
      $log.debug("getActionBoardMunicipality function");

      // State of calamity flag
      vm.municipalityInfo.action_board.isStateOfCalamity = (vm.municipalityInfo.alert.level >= 5);
    }

    function actionMunStartRecovery() {
      $log.debug("actionMunStartRecovery function");

      // find out if municipality came from severe/critical for the past 12 hours
      // vm.municipalityInfo.action_board.isStartRecovery = (vm.municipalityInfo.alert.level <= 2);

      let api_mun_recovery = '/municipality/is_recovering/1/' + vm.targetDate;
      $log.debug("api value: ", api_mun_recovery);

      $http.get(api_mun_recovery).then(function(resp) {
        $log.debug("Get Municipality Start Recovery API", resp.data);
        vm.municipalityInfo.action_board.isStartRecovery = (resp.data == "true");
      });
    }

    function actionMunEvacuateNow(barangay) {
      $log.debug("actionMunEvacuateNow function");
      // subActionMunCoordinateWithDSWD(barangay);

      if (barangay.action_board.isEvacuateNow) {
        vm.municipalityInfo.action_board.listEvacuation.push(barangay);
        vm.municipalityInfo.action_board.isEvacuateNow = true;
      }
    }

    function actionMunContinuousMonitoring(barangay) {
      $log.debug("actionMunContinuousMonitoring function");
      // subActionMunReadyShelters();
      // subActionMunRescuerAlert();
      // subActionMunSendBarangayWarnings();

      if (barangay.action_board.isContinuousMonitoring) {
        vm.municipalityInfo.action_board.listContinuousMonitoring.push(barangay);
        vm.municipalityInfo.action_board.isContinuousMonitoring = true;
      }
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
