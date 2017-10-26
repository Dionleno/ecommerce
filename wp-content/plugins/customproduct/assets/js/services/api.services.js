/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
'use strict';
clima.service('ApiService', ['$http','$q','$window','$rootScope',function($http,$q,$window,$rootScope){
   
     this.getListApi = function($urlApi){
        var deferred = $q.defer();
         
           $http({
                method: 'GET',
                url: $rootScope.api + $urlApi,                
                headers : {
                    'Content-Type' : 'application/json'                                         
                }
            }).then(function successCallback(response) {
                console.log(response);
                deferred.resolve(response);
                
              }, function errorCallback(error) {

                deferred.reject(error);
               
              });

        return deferred.promise;
        }
}]);

///wp-json/cb/v1/gravacoes/show