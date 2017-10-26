'use strict';
clima.service('SistemaServices', ['$http', '$q', '$window', '$rootScope', function ($http, $q, $window, $rootScope) {
 
           this.OptionGet = function (data) {
                    var deferred = $q.defer();
                    console.log(data);


                    $http({
                        method: 'GET',
                        url: $rootScope.url,
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        params: data,
                    }).then(function successCallback(response) {
                        console.log(response);
                        deferred.resolve(response);

                    }, function errorCallback(error) {

                        deferred.reject(error);

                    });

                    return deferred.promise;
                },
                this.OptionPost = function (data) {
                    var deferred = $q.defer();
                    console.log(data);


                    $http({
                        method: 'POST',
                        url: $rootScope.url,
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        params: data,
                    }).then(function successCallback(response) {
                        console.log(response);
                        deferred.resolve(response);

                    }, function errorCallback(error) {

                        deferred.reject(error);

                    });

                    return deferred.promise;
                }

    }]);