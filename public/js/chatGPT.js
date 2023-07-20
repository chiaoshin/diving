/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************!*\
  !*** ./resources/js/chatGPT.js ***!
  \*********************************/
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
function _regeneratorRuntime() { "use strict"; /*! regenerator-runtime -- Copyright (c) 2014-present, Facebook, Inc. -- license (MIT): https://github.com/facebook/regenerator/blob/main/LICENSE */ _regeneratorRuntime = function _regeneratorRuntime() { return exports; }; var exports = {}, Op = Object.prototype, hasOwn = Op.hasOwnProperty, defineProperty = Object.defineProperty || function (obj, key, desc) { obj[key] = desc.value; }, $Symbol = "function" == typeof Symbol ? Symbol : {}, iteratorSymbol = $Symbol.iterator || "@@iterator", asyncIteratorSymbol = $Symbol.asyncIterator || "@@asyncIterator", toStringTagSymbol = $Symbol.toStringTag || "@@toStringTag"; function define(obj, key, value) { return Object.defineProperty(obj, key, { value: value, enumerable: !0, configurable: !0, writable: !0 }), obj[key]; } try { define({}, ""); } catch (err) { define = function define(obj, key, value) { return obj[key] = value; }; } function wrap(innerFn, outerFn, self, tryLocsList) { var protoGenerator = outerFn && outerFn.prototype instanceof Generator ? outerFn : Generator, generator = Object.create(protoGenerator.prototype), context = new Context(tryLocsList || []); return defineProperty(generator, "_invoke", { value: makeInvokeMethod(innerFn, self, context) }), generator; } function tryCatch(fn, obj, arg) { try { return { type: "normal", arg: fn.call(obj, arg) }; } catch (err) { return { type: "throw", arg: err }; } } exports.wrap = wrap; var ContinueSentinel = {}; function Generator() {} function GeneratorFunction() {} function GeneratorFunctionPrototype() {} var IteratorPrototype = {}; define(IteratorPrototype, iteratorSymbol, function () { return this; }); var getProto = Object.getPrototypeOf, NativeIteratorPrototype = getProto && getProto(getProto(values([]))); NativeIteratorPrototype && NativeIteratorPrototype !== Op && hasOwn.call(NativeIteratorPrototype, iteratorSymbol) && (IteratorPrototype = NativeIteratorPrototype); var Gp = GeneratorFunctionPrototype.prototype = Generator.prototype = Object.create(IteratorPrototype); function defineIteratorMethods(prototype) { ["next", "throw", "return"].forEach(function (method) { define(prototype, method, function (arg) { return this._invoke(method, arg); }); }); } function AsyncIterator(generator, PromiseImpl) { function invoke(method, arg, resolve, reject) { var record = tryCatch(generator[method], generator, arg); if ("throw" !== record.type) { var result = record.arg, value = result.value; return value && "object" == _typeof(value) && hasOwn.call(value, "__await") ? PromiseImpl.resolve(value.__await).then(function (value) { invoke("next", value, resolve, reject); }, function (err) { invoke("throw", err, resolve, reject); }) : PromiseImpl.resolve(value).then(function (unwrapped) { result.value = unwrapped, resolve(result); }, function (error) { return invoke("throw", error, resolve, reject); }); } reject(record.arg); } var previousPromise; defineProperty(this, "_invoke", { value: function value(method, arg) { function callInvokeWithMethodAndArg() { return new PromiseImpl(function (resolve, reject) { invoke(method, arg, resolve, reject); }); } return previousPromise = previousPromise ? previousPromise.then(callInvokeWithMethodAndArg, callInvokeWithMethodAndArg) : callInvokeWithMethodAndArg(); } }); } function makeInvokeMethod(innerFn, self, context) { var state = "suspendedStart"; return function (method, arg) { if ("executing" === state) throw new Error("Generator is already running"); if ("completed" === state) { if ("throw" === method) throw arg; return doneResult(); } for (context.method = method, context.arg = arg;;) { var delegate = context.delegate; if (delegate) { var delegateResult = maybeInvokeDelegate(delegate, context); if (delegateResult) { if (delegateResult === ContinueSentinel) continue; return delegateResult; } } if ("next" === context.method) context.sent = context._sent = context.arg;else if ("throw" === context.method) { if ("suspendedStart" === state) throw state = "completed", context.arg; context.dispatchException(context.arg); } else "return" === context.method && context.abrupt("return", context.arg); state = "executing"; var record = tryCatch(innerFn, self, context); if ("normal" === record.type) { if (state = context.done ? "completed" : "suspendedYield", record.arg === ContinueSentinel) continue; return { value: record.arg, done: context.done }; } "throw" === record.type && (state = "completed", context.method = "throw", context.arg = record.arg); } }; } function maybeInvokeDelegate(delegate, context) { var methodName = context.method, method = delegate.iterator[methodName]; if (undefined === method) return context.delegate = null, "throw" === methodName && delegate.iterator["return"] && (context.method = "return", context.arg = undefined, maybeInvokeDelegate(delegate, context), "throw" === context.method) || "return" !== methodName && (context.method = "throw", context.arg = new TypeError("The iterator does not provide a '" + methodName + "' method")), ContinueSentinel; var record = tryCatch(method, delegate.iterator, context.arg); if ("throw" === record.type) return context.method = "throw", context.arg = record.arg, context.delegate = null, ContinueSentinel; var info = record.arg; return info ? info.done ? (context[delegate.resultName] = info.value, context.next = delegate.nextLoc, "return" !== context.method && (context.method = "next", context.arg = undefined), context.delegate = null, ContinueSentinel) : info : (context.method = "throw", context.arg = new TypeError("iterator result is not an object"), context.delegate = null, ContinueSentinel); } function pushTryEntry(locs) { var entry = { tryLoc: locs[0] }; 1 in locs && (entry.catchLoc = locs[1]), 2 in locs && (entry.finallyLoc = locs[2], entry.afterLoc = locs[3]), this.tryEntries.push(entry); } function resetTryEntry(entry) { var record = entry.completion || {}; record.type = "normal", delete record.arg, entry.completion = record; } function Context(tryLocsList) { this.tryEntries = [{ tryLoc: "root" }], tryLocsList.forEach(pushTryEntry, this), this.reset(!0); } function values(iterable) { if (iterable) { var iteratorMethod = iterable[iteratorSymbol]; if (iteratorMethod) return iteratorMethod.call(iterable); if ("function" == typeof iterable.next) return iterable; if (!isNaN(iterable.length)) { var i = -1, next = function next() { for (; ++i < iterable.length;) if (hasOwn.call(iterable, i)) return next.value = iterable[i], next.done = !1, next; return next.value = undefined, next.done = !0, next; }; return next.next = next; } } return { next: doneResult }; } function doneResult() { return { value: undefined, done: !0 }; } return GeneratorFunction.prototype = GeneratorFunctionPrototype, defineProperty(Gp, "constructor", { value: GeneratorFunctionPrototype, configurable: !0 }), defineProperty(GeneratorFunctionPrototype, "constructor", { value: GeneratorFunction, configurable: !0 }), GeneratorFunction.displayName = define(GeneratorFunctionPrototype, toStringTagSymbol, "GeneratorFunction"), exports.isGeneratorFunction = function (genFun) { var ctor = "function" == typeof genFun && genFun.constructor; return !!ctor && (ctor === GeneratorFunction || "GeneratorFunction" === (ctor.displayName || ctor.name)); }, exports.mark = function (genFun) { return Object.setPrototypeOf ? Object.setPrototypeOf(genFun, GeneratorFunctionPrototype) : (genFun.__proto__ = GeneratorFunctionPrototype, define(genFun, toStringTagSymbol, "GeneratorFunction")), genFun.prototype = Object.create(Gp), genFun; }, exports.awrap = function (arg) { return { __await: arg }; }, defineIteratorMethods(AsyncIterator.prototype), define(AsyncIterator.prototype, asyncIteratorSymbol, function () { return this; }), exports.AsyncIterator = AsyncIterator, exports.async = function (innerFn, outerFn, self, tryLocsList, PromiseImpl) { void 0 === PromiseImpl && (PromiseImpl = Promise); var iter = new AsyncIterator(wrap(innerFn, outerFn, self, tryLocsList), PromiseImpl); return exports.isGeneratorFunction(outerFn) ? iter : iter.next().then(function (result) { return result.done ? result.value : iter.next(); }); }, defineIteratorMethods(Gp), define(Gp, toStringTagSymbol, "Generator"), define(Gp, iteratorSymbol, function () { return this; }), define(Gp, "toString", function () { return "[object Generator]"; }), exports.keys = function (val) { var object = Object(val), keys = []; for (var key in object) keys.push(key); return keys.reverse(), function next() { for (; keys.length;) { var key = keys.pop(); if (key in object) return next.value = key, next.done = !1, next; } return next.done = !0, next; }; }, exports.values = values, Context.prototype = { constructor: Context, reset: function reset(skipTempReset) { if (this.prev = 0, this.next = 0, this.sent = this._sent = undefined, this.done = !1, this.delegate = null, this.method = "next", this.arg = undefined, this.tryEntries.forEach(resetTryEntry), !skipTempReset) for (var name in this) "t" === name.charAt(0) && hasOwn.call(this, name) && !isNaN(+name.slice(1)) && (this[name] = undefined); }, stop: function stop() { this.done = !0; var rootRecord = this.tryEntries[0].completion; if ("throw" === rootRecord.type) throw rootRecord.arg; return this.rval; }, dispatchException: function dispatchException(exception) { if (this.done) throw exception; var context = this; function handle(loc, caught) { return record.type = "throw", record.arg = exception, context.next = loc, caught && (context.method = "next", context.arg = undefined), !!caught; } for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i], record = entry.completion; if ("root" === entry.tryLoc) return handle("end"); if (entry.tryLoc <= this.prev) { var hasCatch = hasOwn.call(entry, "catchLoc"), hasFinally = hasOwn.call(entry, "finallyLoc"); if (hasCatch && hasFinally) { if (this.prev < entry.catchLoc) return handle(entry.catchLoc, !0); if (this.prev < entry.finallyLoc) return handle(entry.finallyLoc); } else if (hasCatch) { if (this.prev < entry.catchLoc) return handle(entry.catchLoc, !0); } else { if (!hasFinally) throw new Error("try statement without catch or finally"); if (this.prev < entry.finallyLoc) return handle(entry.finallyLoc); } } } }, abrupt: function abrupt(type, arg) { for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i]; if (entry.tryLoc <= this.prev && hasOwn.call(entry, "finallyLoc") && this.prev < entry.finallyLoc) { var finallyEntry = entry; break; } } finallyEntry && ("break" === type || "continue" === type) && finallyEntry.tryLoc <= arg && arg <= finallyEntry.finallyLoc && (finallyEntry = null); var record = finallyEntry ? finallyEntry.completion : {}; return record.type = type, record.arg = arg, finallyEntry ? (this.method = "next", this.next = finallyEntry.finallyLoc, ContinueSentinel) : this.complete(record); }, complete: function complete(record, afterLoc) { if ("throw" === record.type) throw record.arg; return "break" === record.type || "continue" === record.type ? this.next = record.arg : "return" === record.type ? (this.rval = this.arg = record.arg, this.method = "return", this.next = "end") : "normal" === record.type && afterLoc && (this.next = afterLoc), ContinueSentinel; }, finish: function finish(finallyLoc) { for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i]; if (entry.finallyLoc === finallyLoc) return this.complete(entry.completion, entry.afterLoc), resetTryEntry(entry), ContinueSentinel; } }, "catch": function _catch(tryLoc) { for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i]; if (entry.tryLoc === tryLoc) { var record = entry.completion; if ("throw" === record.type) { var thrown = record.arg; resetTryEntry(entry); } return thrown; } } throw new Error("illegal catch attempt"); }, delegateYield: function delegateYield(iterable, resultName, nextLoc) { return this.delegate = { iterator: values(iterable), resultName: resultName, nextLoc: nextLoc }, "next" === this.method && (this.arg = undefined), ContinueSentinel; } }, exports; }
function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }
function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }
var chatLog = document.getElementById('chat-log'),
  userInput = document.getElementById('user-input'),
  sendButton = document.getElementById('send-button'),
  buttonIcon = document.getElementById('button-icon'),
  info = document.querySelector('.info');
sendButton.addEventListener('click', sendMessage);
userInput.addEventListener('keydown', function (event) {
  if (event.key === 'Enter') {
    sendMessage();
  }
});
var messageText = '你該小心@@@';
window.test_2_sendMessage = function (message, dictData) {
  if (message in dictData) {
    userInput.value = '';
    // append message as user - we will code it's function
    appendMessage('user', message);
    // sets a fake timeout that showing loading on send button
    setTimeout(function () {
      // send our message as bot(sender : bot)
      appendMessage('bot', dictData[message].replaceAll('\\n', '\n'));
      // change button icon to default
      buttonIcon.classList.add('fa-solid', 'fa-paper-plane');
      buttonIcon.classList.remove('fas', 'fa-spinner', 'fa-pulse');
    }, 2000);
    return;
  } else {
    appendMessage('user', message);
    userInput.value = '';
    var _options = {
      method: 'POST',
      headers: {
        'content-type': 'application/json',
        'X-RapidAPI-Key': 'a20e947e7fmshdda6e7ef8f8269fp1c6b93jsn4bb98aa24e21',
        'X-RapidAPI-Host': 'chatgpt53.p.rapidapi.com'
      },
      body: "{\"messages\":[{\"role\":\"user\",\"content\":\"".concat(message, "\"}]}")
    };
    fetch('https://chatgpt53.p.rapidapi.com/', _options).then(function (response) {
      return response.json();
    }).then(function (response) {
      appendMessage('bot', response.choices[0].message.content);
      buttonIcon.classList.add('fa-solid', 'fa-paper-plane');
      buttonIcon.classList.remove('fas', 'fa-spinner', 'fa-pulse');
    })["catch"](function (err) {
      if (err.name === 'TypeError') {
        appendMessage('bot', 'Error : Check Your Api Key!');
        buttonIcon.classList.add('fa-solid', 'fa-paper-plane');
        buttonIcon.classList.remove('fas', 'fa-spinner', 'fa-pulse');
      }
    });
  }
};

/* 修改成這樣, 因為webpack打包後這些程式碼都會被包起來 變成閉包中的一個方法
 無法從最外部直接呼叫, 因此需要將這個方法指派到 window 這個瀏覽器上 這樣才能在模板中呼叫 */
window.test_sendMessage = function (message) {
  // if message = empty do nothing
  if (message === '') {
    return;
  }
  // if message = developer - show our message
  else if (message === 'developer') {
    // clear input value
    userInput.value = '';
    // append message as user - we will code it's function
    appendMessage('user', message);
    // sets a fake timeout that showing loading on send button
    setTimeout(function () {
      // send our message as bot(sender : bot)
      appendMessage('bot', 'This Source Coded By Reza Mehdikhanlou \nYoutube : @AsmrProg');
      // change button icon to default
      buttonIcon.classList.add('fa-solid', 'fa-paper-plane');
      buttonIcon.classList.remove('fas', 'fa-spinner', 'fa-pulse');
    }, 2000);
    return;
  }
  // if message = 潛水訊息 - show our message
  else if (message === '潛水注意事項') {
    // clear input value
    userInput.value = '';
    // append message as user - we will code it's function
    appendMessage('user', message);
    // sets a fake timeout that showing loading on send button
    setTimeout(function () {
      // send our message as bot(sender : bot)
      appendMessage('bot', '潛水注意事項： \n你該小心!!!' + messageText);
      // change button icon to default
      buttonIcon.classList.add('fa-solid', 'fa-paper-plane');
      buttonIcon.classList.remove('fas', 'fa-spinner', 'fa-pulse');
    }, 2000);
    return;
  }
  // if message = 潛水訊息 - show our message
  else if (message === '小琉球龍蝦洞') {
    // clear input value
    userInput.value = '';
    // append message as user - we will code it's function
    appendMessage('user', message);
    // sets a fake timeout that showing loading on send button
    setTimeout(function () {
      // send our message as bot(sender : bot)
      appendMessage('bot', '潛水注意事項： \n當地擁有一片美麗的珊瑚礁海岸，海底更有著名的軟珊瑚地毯，可以說是非常值得探索的潛點！ \n 雖然潮間帶還算平緩好走，但有時浪比較大，務必要先評估是否適合下水。\n對了，龍蝦洞海底的流也比較強，建議一定要找當地的潛導以確保自身安全！');
      // change button icon to default
      buttonIcon.classList.add('fa-solid', 'fa-paper-plane');
      buttonIcon.classList.remove('fas', 'fa-spinner', 'fa-pulse');
    }, 2000);
    return;
  }

  // else if none of above
  // appends users message to screen
  appendMessage('user', message);
  userInput.value = '';
  var options = {
    method: 'POST',
    headers: {
      'content-type': 'application/json',
      'X-RapidAPI-Key': 'a20e947e7fmshdda6e7ef8f8269fp1c6b93jsn4bb98aa24e21',
      'X-RapidAPI-Host': 'chatgpt53.p.rapidapi.com'
      // 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
      // if you want use official api
      /*
      'content-type': 'application/json',
      'X-RapidAPI-Key': 'cf7bf6f5a5msh21bb0dfb81662c1p131879jsnd3dcc0ac8295',
      'X-RapidAPI-Host': 'openai80.p.rapidapi.com'
      */
    },

    body: "{\"messages\":[{\"role\":\"user\",\"content\":\"".concat(message, "\"}]}")
    // if you want use official api you need have this body
    // `{"model":"gpt-3.5-turbo","messages":[{"role":"user","content":"${message}"}]}`
  };
  // official api : 'https://openai80.p.rapidapi.com/chat/completions';
  fetch('https://chatgpt53.p.rapidapi.com/', options).then(function (response) {
    return response.json();
  }).then(function (response) {
    appendMessage('bot', response.choices[0].message.content);
    buttonIcon.classList.add('fa-solid', 'fa-paper-plane');
    buttonIcon.classList.remove('fas', 'fa-spinner', 'fa-pulse');
  })["catch"](function (err) {
    if (err.name === 'TypeError') {
      appendMessage('bot', 'Error : Check Your Api Key!');
      buttonIcon.classList.add('fa-solid', 'fa-paper-plane');
      buttonIcon.classList.remove('fas', 'fa-spinner', 'fa-pulse');
    }
  });
};
function sendMessage() {
  var message = userInput.value.trim();
  // if message = empty do nothing
  if (message === '') {
    return;
  }
  // if message = developer - show our message
  else if (message === 'developer') {
    // clear input value
    userInput.value = '';
    // append message as user - we will code it's function
    appendMessage('user', message);
    // sets a fake timeout that showing loading on send button
    setTimeout(function () {
      // send our message as bot(sender : bot)
      appendMessage('bot', 'This Source Coded By Reza Mehdikhanlou \nYoutube : @AsmrProg');
      // change button icon to default
      buttonIcon.classList.add('fa-solid', 'fa-paper-plane');
      buttonIcon.classList.remove('fas', 'fa-spinner', 'fa-pulse');
    }, 2000);
    return;
  }
  // if message = 潛水訊息 - show our message
  else if (message === '潛水注意事項') {
    // clear input value
    userInput.value = '';
    // append message as user - we will code it's function
    appendMessage('user', message);
    // sets a fake timeout that showing loading on send button
    setTimeout(function () {
      // send our message as bot(sender : bot)
      appendMessage('bot', '潛水注意事項： \n你該小心!!!' + messageText);
      // change button icon to default
      buttonIcon.classList.add('fa-solid', 'fa-paper-plane');
      buttonIcon.classList.remove('fas', 'fa-spinner', 'fa-pulse');
    }, 2000);
    return;
  }
  // if message = 潛水訊息 - show our message
  else if (message === '小琉球龍蝦洞') {
    // clear input value
    userInput.value = '';
    // append message as user - we will code it's function
    appendMessage('user', message);
    // sets a fake timeout that showing loading on send button
    setTimeout(function () {
      // send our message as bot(sender : bot)
      appendMessage('bot', '潛水注意事項： \n當地擁有一片美麗的珊瑚礁海岸，海底更有著名的軟珊瑚地毯，可以說是非常值得探索的潛點！ \n 雖然潮間帶還算平緩好走，但有時浪比較大，務必要先評估是否適合下水。\n對了，龍蝦洞海底的流也比較強，建議一定要找當地的潛導以確保自身安全！');
      // change button icon to default
      buttonIcon.classList.add('fa-solid', 'fa-paper-plane');
      buttonIcon.classList.remove('fas', 'fa-spinner', 'fa-pulse');
    }, 2000);
    return;
  }

  // else if none of above
  // appends users message to screen
  appendMessage('user', message);
  userInput.value = '';
  var options = {
    method: 'POST',
    headers: {
      'content-type': 'application/json',
      'X-RapidAPI-Key': 'a20e947e7fmshdda6e7ef8f8269fp1c6b93jsn4bb98aa24e21',
      'X-RapidAPI-Host': 'chatgpt53.p.rapidapi.com'
    },
    body: "{\"messages\":[{\"role\":\"user\",\"content\":\"".concat(message, "\"}]}")
  };
  fetch('https://chatgpt53.p.rapidapi.com/', options).then(function (response) {
    return response.json();
  }).then(function (response) {
    appendMessage('bot', response.choices[0].message.content);
    buttonIcon.classList.add('fa-solid', 'fa-paper-plane');
    buttonIcon.classList.remove('fas', 'fa-spinner', 'fa-pulse');
  })["catch"](function (err) {
    if (err.name === 'TypeError') {
      appendMessage('bot', 'Error : Check Your Api Key!');
      buttonIcon.classList.add('fa-solid', 'fa-paper-plane');
      buttonIcon.classList.remove('fas', 'fa-spinner', 'fa-pulse');
    }
  });
}
function appendMessage(sender, message) {
  info.style.display = "none";
  // change send button icon to loading using fontawesome
  buttonIcon.classList.remove('fa-solid', 'fa-paper-plane');
  buttonIcon.classList.add('fas', 'fa-spinner', 'fa-pulse');
  var messageElement = document.createElement('div');
  var iconElement = document.createElement('div');
  var chatElement = document.createElement('div');
  var icon = document.createElement('i');
  chatElement.classList.add("chat-box");
  iconElement.classList.add("icon");
  messageElement.classList.add(sender);
  messageElement.innerText = message;

  // add icons depending on who send message bot or user
  if (sender === 'user') {
    icon.classList.add('fa-regular', 'fa-user');
    iconElement.setAttribute('id', 'user-icon');
  } else {
    icon.classList.add('fa-solid', 'fa-robot');
    iconElement.setAttribute('id', 'bot-icon');
  }
  iconElement.appendChild(icon);
  chatElement.appendChild(iconElement);
  chatElement.appendChild(messageElement);
  chatLog.appendChild(chatElement);
  chatLog.scrollTo = chatLog.scrollHeight;
}

// chatgpt api
// Endpoint URL
var endpointUrl = "https://api.openai.com/v1/models";

// Header Parameters
var headerParameters = {
  "Authorization": "Bearer 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"
};

// Setting API call options
var options = {
  method: "GET",
  headers: headerParameters
};

// Function to make API call
function getModels() {
  return _getModels.apply(this, arguments);
} // Calling function to make API call
function _getModels() {
  _getModels = _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee() {
    var response;
    return _regeneratorRuntime().wrap(function _callee$(_context) {
      while (1) switch (_context.prev = _context.next) {
        case 0:
          _context.prev = 0;
          _context.next = 3;
          return fetch(endpointUrl, options);
        case 3:
          response = _context.sent;
          // Printing response
          printResponse(response);
          _context.next = 10;
          break;
        case 7:
          _context.prev = 7;
          _context.t0 = _context["catch"](0);
          // Printing error message
          printError(_context.t0);
        case 10:
        case "end":
          return _context.stop();
      }
    }, _callee, null, [[0, 7]]);
  }));
  return _getModels.apply(this, arguments);
}
getModels();
/******/ })()
;