

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

var CustomDropDown = function () {
  function CustomDropDown() {
    var _this = this;

    var param = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {
      selector: "",
      customClass: "",
      customOpenClass: "",
      customSelectedClass: ""
    };

    _classCallCheck(this, CustomDropDown);

    this.inputs = [].concat(_toConsumableArray(document.querySelectorAll(param.selector)));
    this.customClass = param.customClass;
    this.customOpenClass = param.customOpenClass;
    this.customSelectedClass = param.customSelectedClass;

    //listeners
    this.clickOptionListener = function (e) {
      return _this.handleClickOption(e);
    };
    this.clickWindow = function (e) {
      return _this.handleClickWindow(e);
    };
  }

  _createClass(CustomDropDown, [{
    key: "createOptionsList",
    value: function createOptionsList($input) {
      var $list = document.createElement("ul");

      //add list items
      this.addElemsToElem(this.createOptions($input), $list);

      return $list;
    }
  }, {
    key: "createOptions",
    value: function createOptions($input) {
      var _this2 = this;

      var results = [];
      var options = this.getOptions($input);

      options.forEach(function ($option) {
        var $li = document.createElement("li");
        var $a = _this2.createEmptyLink($option.textContent);

        //set value data
        $a.dataset.value = $option.value;

        //add listener
        $a.addEventListener("click", _this2.clickOptionListener);

        //add link to list item
        _this2.addElemToElem($a, $li);

        results.push($li);
      });

      return results;
    }
  }, {
    key: "createEmptyLink",
    value: function createEmptyLink(textContent) {
      var $a = document.createElement("a");

      $a.setAttribute("href", "#");

      $a.textContent = textContent;

      return $a;
    }
  }, {
    key: "setContentToContent",
    value: function setContentToContent($elem1, $elem2) {
      $elem1.textContent = $elem2.textContent;
    }
  }, {
    key: "toggleOpenDropDown",
    value: function toggleOpenDropDown($customDropDown) {
      $customDropDown.classList.toggle(this.customOpenClass);
    }
  }, {
    key: "closeDropDown",
    value: function closeDropDown($customDropDown) {
      $customDropDown.classList.remove(this.customOpenClass);
    }
  }, {
    key: "addElemsToElem",
    value: function addElemsToElem(elems, $parent) {
      var _this3 = this;

      elems.forEach(function ($elem) {
        return _this3.addElemToElem($elem, $parent);
      });
    }
  }, {
    key: "addElemToElem",
    value: function addElemToElem($elem, $parent) {
      $parent.append($elem);
    }
  }]);

  return CustomDropDown;
}();

exports.default = CustomDropDown;