'use strict';

/* Services */

var phonecatServices = angular.module('phonecatServices', ['ngResource']);

phonecatServices.factory('Phone', ['$resource',
  function($resource){
    return $resource('phones/:phoneId.json', {}, {
      query: {method:'GET', params:{phoneId:'phones'}, isArray:true}
    });
  }]);
  

phonecatServices.factory('Test', ['$resource',
  function($resource){
    return $resource('http://kidlr.lotiv.com/api/user/register', {}, {
      query: {method:'POST', params:{}, isArray:false}
    });
  }]);
