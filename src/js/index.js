// files
import './parts/test';
//
import test from './parts/test2';
import $ from "jquery";

console.log(test.obj);
$(function() {
  $("body").css("color", "blue");
});
