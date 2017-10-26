/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

'use strict';
app.controller('produtoCtrl', function ($scope, $window, $rootScope) {
    $scope.faixas = ffaixa == undefined || ffaixa == '' ? [] : ffaixa;
    $scope.faixa = {};
    $scope.gravacoes = f_gravacoes == undefined || f_gravacoes == '' ? [] : f_gravacoes;;
    $scope.gb = {};
    
         
         
         $scope.addGravacao = function(){
             console.log('teste');
             $scope.gravacoes.push($scope.gb);
             $scope.gb = {};
         };
         
         
         $scope.DeleteGravacao = function(i){
            var index = $scope.gravacoes.indexOf(i);
            $scope.gravacoes.splice(index, 1);
        };
         //FAIXA DE PREÇO
        $scope.addFaixa = function(){
            console.log($scope.faixa);
             $scope.faixas.push($scope.faixa);
             $scope.faixa = {};
        };
     
        $scope.DeleteFaixa = function(i){
            var index = $scope.faixas.indexOf(i);
            $scope.faixas.splice(index, 1);
        };
});

