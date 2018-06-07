

Object.defineProperty(exports, "__esModule", {
  value: true
});

var _createClass = function () {
  function defineProperties(target, props) {
    for (var i = 0; i < props.length; i++) {
      var descriptor = props[i];descriptor.enumerable = descriptor.enumerable || false;descriptor.configurable = true;if ("value" in descriptor) descriptor.writable = true;Object.defineProperty(target, descriptor.key, descriptor);
    }
  }return function (Constructor, protoProps, staticProps) {
    if (protoProps) defineProperties(Constructor.prototype, protoProps);if (staticProps) defineProperties(Constructor, staticProps);return Constructor;
  };
}();

var _react = require('react');

var _react2 = _interopRequireDefault(_react);

var _reactDom = require('react-dom');

var _reactDom2 = _interopRequireDefault(_reactDom);

var _SubmissionsOTW = require('../components/SubmissionsOTW.jsx');

var _SubmissionsOTW2 = _interopRequireDefault(_SubmissionsOTW);

function _interopRequireDefault(obj) {
  return obj && obj.__esModule ? obj : { default: obj };
}

function _classCallCheck(instance, Constructor) {
  if (!(instance instanceof Constructor)) {
    throw new TypeError("Cannot call a class as a function");
  }
}

var test = [{
  id: 1,
  title: 'werkNaam',
  artist: 'naam',
  image: 'url'
}, {
  id: 2,
  title: 'werkNaam2',
  artist: 'naam2',
  image: 'url'
}, {
  id: 3,
  title: 'werkNaam3',
  artist: 'naam3',
  image: 'url'
}];

var Submissions = function () {
  function Submissions() {
    var content = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {
      selector: '',
      customClass: ''
    };

    _classCallCheck(this, Submissions);

    this.selector = content.selector;
    this.customClass = content.customClass;
    this.amount = 3;
  }

  _createClass(Submissions, [{
    key: 'init',
    value: function init() {
      _reactDom2.default.render(_react2.default.createElement(_SubmissionsOTW2.default, { data: test, customClass: this.customClass, amount: this.amount }), document.querySelector(this.selector));
    }
  }]);

  return Submissions;
}();

exports.default = Submissions;