

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

var _AllSubmissions = require('../components/AllSubmissions.jsx');

var _AllSubmissions2 = _interopRequireDefault(_AllSubmissions);

function _interopRequireDefault(obj) {
  return obj && obj.__esModule ? obj : { default: obj };
}

function _toConsumableArray(arr) {
  if (Array.isArray(arr)) {
    for (var i = 0, arr2 = Array(arr.length); i < arr.length; i++) {
      arr2[i] = arr[i];
    }return arr2;
  } else {
    return Array.from(arr);
  }
}

function _classCallCheck(instance, Constructor) {
  if (!(instance instanceof Constructor)) {
    throw new TypeError("Cannot call a class as a function");
  }
}

var InfiniteScroll = function () {
  function InfiniteScroll() {
    var vars = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {
      selector: '',
      customClass: ''
    };

    _classCallCheck(this, InfiniteScroll);

    this.selector = vars.selector;
    this.container = document.querySelector(this.selector);
    this.currentSubmissions = [].concat(_toConsumableArray(this.container.querySelectorAll('article')));
    this.count = this.currentSubmissions.lenght;

    this.submissions = [];
  }

  _createClass(InfiniteScroll, [{
    key: 'existingElementsToObj',
    value: function existingElementsToObj(elem) {
      var title = elem.querySelector('h3').textContent;
      var artist = elem.querySelector('p').textContent;
      var imgUrl = elem.querySelector('img').getAttribute('src');

      return { title: title, artist: artist, url: imgUrl };
    }
  }, {
    key: 'init',
    value: function init() {
      var _this = this;

      this.submissions = this.currentSubmissions.map(function (elem) {
        var result = _this.existingElementsToObj(elem);

        elem.outerHTML = '';

        return result;
      });

      _reactDom2.default.render(_react2.default.createElement(_AllSubmissions2.default, { submissions: this.submissions, container: this.container }), this.container);
    }
  }]);

  return InfiniteScroll;
}();

exports.default = InfiniteScroll;