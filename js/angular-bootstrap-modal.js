(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
/**
*
* Angular Modal Library v1.0.7
* @author TMJ Web Development Team. 2016
*
* Created a default approach modal using modal bootstrap
* @copyright TMJ Philippines BPO Services Inc.
*/

(function() {
    'use strict';

    var MODAL_CONFIG = require('./constants/modal.constant');
    var BOOTSTRAP_CONFIG = require('./constants/ui-bootstrap.constant');
    var MODAL_INSTANCE_CONFIG = require('./constants/modal-instance.constant');
    var TMJFormData = require('./services/form-data.service');
    var Modal = require('./services/modal.service')
    var DefaultModalInstanceCtrl = require('./controllers/default-modal-instance.controller');

    angular.module('tmjModal', ['ui.bootstrap'])
        .constant('MODAL_CONFIG', MODAL_CONFIG)
        .constant('BOOTSTRAP_CONFIG', BOOTSTRAP_CONFIG)
        .constant('MODAL_INSTANCE_CONFIG', MODAL_INSTANCE_CONFIG)
        .service('TMJFormData', TMJFormData)
        .service('Modal', Modal)
        .controller('DefaultModalInstanceCtrl', DefaultModalInstanceCtrl);
})();

},{"./constants/modal-instance.constant":2,"./constants/modal.constant":3,"./constants/ui-bootstrap.constant":4,"./controllers/default-modal-instance.controller":5,"./services/form-data.service":6,"./services/modal.service":7}],2:[function(require,module,exports){
'use strict';

var modalInstanceConfig = {};

modalInstanceConfig.MSG = 'Successfully saved.';

modalInstanceConfig.ERR = {
    'EMPTY_FDATA': 'Please specify formData to be submitted'
}

module.exports = modalInstanceConfig;

},{}],3:[function(require,module,exports){
/**
*
* TMJ Angular Modal Library
* @author TMJ Engineering.
*
* Default Constant Use In Modal
* @copyright TMJ Philippines BPO Services Inc. 2016
*/

'use strict';

var modalConfig = {};
modalConfig.DEFAULT = {
    'CONTROLLER' : 'DefaultModalInstanceCtrl',
    'CONTROLLERAS' : 'dmic'
};

modalConfig.ERR_MSG = {
    'MISSING': 'Please check your config something is missing',
    'ELEM_NOT_FOUND': 'element not found.'
};

module.exports = modalConfig;

},{}],4:[function(require,module,exports){
/**
*
* TMJ Angular Modal Library
* @author TMJ Engineering.
*
* Bootstrap constants
* @copyright TMJ Philippines BPO Services Inc. 2016
*/

'use strict';

var bootstrapConfig = {};
bootstrapConfig.RESERVED = [
    'size', 'templateUrl', 'controller', 'appendTo', 'animation', 'backdrop',
    'bindToController', 'controllerAs', 'keyboard', 'openedClass'
];

module.exports = bootstrapConfig;

},{}],5:[function(require,module,exports){
/**
*
* TMJ Angular Modal Library
* @author TMJ Engineering.
*
* Created a default approach modal using modal bootstrap
* @copyright TMJ Philippines BPO Services Inc. 2016
*/

'use strict';

DefaultModalInstanceCtrl.$inject = [
    '$uibModalInstance',
    'attr',
    '$injector',
    'MODAL_INSTANCE_CONFIG',
    '$http',
    'TMJFormData'
];

/* @ngInject */
function DefaultModalInstanceCtrl($uibModalInstance, attr, $injector,
    MODAL_INSTANCE_CONFIG, $http, TMJFormData) {

    var vm = this;
    vm.$uibModalInstance = $uibModalInstance;
    vm.save = save;
    vm.saveWithFile = saveWithFile;
    vm.close = close;
    // you can override functions stated above
    Object.assign(vm, attr);


    function save() {
        var formData = getFormData();

        return requestSave(formData);
    }

    function saveWithFile() {
        var formData = getFormData();
        formData = TMJFormData.build(formData);

        var config = {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        };

        return requestSave(formData, config);
    }

    function requestSave(formData, config) {
        if (!formData) return;

        var request = {
            'false': requestHttp,
            'true': requestResource
        };
        var defer = request[!!vm.resource](formData, config);

        return defer.then(function(result) {
            // if not stated to keep open return the result
            if (!vm.keepOpen && !result.error) {
                // pass the result to the client
                $uibModalInstance.close(result);
            }

            showMessage(result.msg, result.status);
            // if keep open specify the data to be returned to the client for them to manipulate
            vm.returnData = result;

            // for instance that from adding you want to change url to update/delete
            vm.url = result.url || vm.url;
            // if for instance need to update the input after the transaction
            vm.input = result.input || vm.input;

            if (!vm.resource) return;

            // for instance that from adding you want to change resource action to update/delete
            vm.resource.action = result.resource_action || vm.resource.action;
            // for instance that from adding you want to change resource function
            vm.resource.func = result.resource_func || vm.resource.func;
            // for instance that from adding you want to change resource service
            vm.resource.service = result.resource_service || vm.resource.service;
        }, function(err) {
            showMessage(err, false);
        });
    }

    function showMessage(msg, status) {
        vm.status = status;
        return vm.message = msg || MODAL_INSTANCE_CONFIG.MSG;
    }

    function requestHttp(formData, config) {
        return $http.post(vm.url, formData, config).then(function(result) {
            result = result.data;
            return result;
        });
    }

    function requestResource(formData, config) {
        //inject service or factory dynamically
        var resource_data = vm.resource;

        var resource = !(resource_data.service) ? formData :
                    $injector.get(resource_data.service);

        // function or attr name
        // if no function name means factory return already a resource
        if (resource_data.func) {
            // use for service
            resource = resource[resource_data.func];
        }

        if (typeof resource[resource_data.action] != 'function') {
            return console.error('specified resource is not a function'); //need change to function
        }
        // to change the config headers of the resource change it on declaration in your factory
        var res = resource[resource_data.action](formData);
        if (resource_data.service)
            res = res.$promise;

        return res;
    }

    function getFormData() {
        var formData = vm.input;
        if (formData)
            return formData;

        showMessage(MODAL_INSTANCE_CONFIG.ERR.EMPTY_FDATA, false);
        return false;
    }

    function close() {
        if (!vm.keepOpen || !vm.returnData) return $uibModalInstance.dismiss('cancel');

        $uibModalInstance.close(vm.returnData);
    }
}

module.exports = DefaultModalInstanceCtrl;

},{}],6:[function(require,module,exports){
/**
 * Converting data to Form Data
 * @author TMJP Engineering
 * @copyright TMJ Philippines BPO Services Inc. 2016
 */

'use strict';

TMJFormData.$inject = [];

/* @ngInject */
function TMJFormData() {

    this.build = build;

    function build(data, formData, otherKey) {
        if (!data)
            return;

        var fd = formData || new FormData();

        for (var key in data)
        {
            // use to prevent prototypes to be included in loop (eg. obj.length)
            if (!data.hasOwnProperty(key))
                continue;

            // if other key exist means multi array
            var field = (!otherKey) ? key : otherKey + '[' + key + ']';

            // if object and instance is not file dig deeper
            if (typeof data[key] == 'object' && !(data[key] instanceof File || data[key] instanceof Blob)) // array or object
            {
                //recursion call itself change the data
                this.build(data[key], fd, field);
                continue;
            }

            fd.append(field, data[key]);
        }

        return fd;
    }
}

module.exports = TMJFormData;

},{}],7:[function(require,module,exports){
/**
*
* TMJ Angular Modal Library
* @author TMJ Engineering.
*
* Created a default approach modal using modal bootstrap
* @copyright TMJ Philippines BPO Services Inc. 2016
*/

'use strict';

Modal.$inject = ['$uibModal', 'BOOTSTRAP_CONFIG', 'MODAL_CONFIG'];

/* @ngInject */
function Modal($uibModal, BOOTSTRAP_CONFIG, MODAL_CONFIG) {
    this.open = open;
    this.checkConfig = checkConfig;

    /**
     * Open the modal
     */
    function open(config) {
        checkConfig(config);

        // DECLARE THE MODEL INSTANCE
        config.controller = config.controller || MODAL_CONFIG.DEFAULT.CONTROLLER;
        // IF NO CONTROLLERAS DEFINED IT WILL BE ALIAS AS DEFAULT AND NEED TO CALL OTHER
        // NON SCOPE FUNCTION LIKE( e.g. default.function_name()/ default.variable)
        config.controllerAs = config.controllerAs || MODAL_CONFIG.DEFAULT.CONTROLLERAS;

        // STATIC VARIABLE HOLDS RESERVE ATTRIBUTE USED BY Bootstrap MODAL
        var staticVar = BOOTSTRAP_CONFIG.RESERVED;

        // WILL HOLD OTHER SPECIFIED ATTRIBUTE NOT DECLARED ABOVE
        var resolveAttr = {};

        // ALL ATTR NOT IN STATIC VAR WILL BE PUT IN RESOLVE
        for (var key in config)
        {
            // IF NOT IN STATIC VAR
            if (staticVar.indexOf(key) < 0)
                resolveAttr[key] = config[key];

        }

        // overwrite resolve
        config.resolve = {
            attr: function() {
                return resolveAttr;
            },
        };

        // OPEN THE MODAL
        var modalInstance = $uibModal.open(config);
        return modalInstance.result;
    }

    function checkConfig(config) {
        if (!config) return console.error(MODAL_CONFIG.ERR_MSG.MISSING);
    }
}

module.exports = Modal;

},{}]},{},[1]);
