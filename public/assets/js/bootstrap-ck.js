/* ============================================================
 * bootstrap-dropdown.js v1.4.0
 * http://twitter.github.com/bootstrap/javascript.html#dropdown
 * ============================================================
 * Copyright 2011 Twitter, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ============================================================ */!function(e){"use strict";function n(){e(t).parent("li").removeClass("open")}e.fn.dropdown=function(r){return this.each(function(){e(this).delegate(r||t,"click",function(t){var r=e(this).parent("li"),i=r.hasClass("open");n();!i&&r.toggleClass("open");return!1})})};var t="a.menu, .dropdown-toggle";e(function(){e("html").bind("click",n);e("body").dropdown("[data-dropdown] a.menu, [data-dropdown] .dropdown-toggle")})}(window.jQuery||window.ender);