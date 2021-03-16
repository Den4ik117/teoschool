/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/lesson.js ***!
  \********************************/
var toolbarOptions = [['bold', 'italic', 'underline', 'strike'], // toggled buttons
['blockquote', 'code-block'], [{
  'header': 1
}, {
  'header': 2
}], // custom button values
[{
  'list': 'ordered'
}, {
  'list': 'bullet'
}], [{
  'indent': '-1'
}, {
  'indent': '+1'
}], // outdent/indent
[{
  'direction': 'rtl'
}], // text direction
[{
  'header': [1, 2, 3, false]
}], [{
  'color': []
}, {
  'background': []
}], // dropdown with defaults from theme
[{
  'font': []
}], [{
  'align': []
}], ['clean'] // remove formatting button
];
var editor = new Quill('#editor', {
  modules: {
    toolbar: toolbarOptions
  },
  placeholder: 'Содержание урока...',
  theme: 'snow'
});
setTimeout(function () {
  console.log(editor.getContents());
  console.log(editor.getText());
}, 10000);
/******/ })()
;