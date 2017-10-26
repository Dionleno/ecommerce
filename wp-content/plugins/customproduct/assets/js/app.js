'use strict';

var app = angular.module('app', [])
        .run(function ($rootScope) {
            
            console.log('clima');            
        });

  angular.element(document).ready(function() {
              var myDiv1 = document.getElementById("woocommerce-product-data");
              angular.bootstrap(myDiv1, ["app"]);
 
          });