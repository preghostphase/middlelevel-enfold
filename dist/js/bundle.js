!function(e){var t={};function n(i){if(t[i])return t[i].exports;var r=t[i]={i:i,l:!1,exports:{}};return e[i].call(r.exports,r,r.exports,n),r.l=!0,r.exports}n.m=e,n.c=t,n.d=function(e,t,i){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:i})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var i=Object.create(null);if(n.r(i),Object.defineProperty(i,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var r in e)n.d(i,r,function(t){return e[t]}.bind(null,r));return i},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=0)}([function(e,t){!function(e){let t,n,i,r,a,o,c;function l(){let i,r;return e(this).hasClass("key-item-link")?(i=e(this).parents(".map-key-item").first(),mapItemID=i.data("map-toggle")):(mapItemID=e(this).attr("id"),i=o.find(".map-key-item[data-map-toggle="+mapItemID+"]")),i.hasClass("active")?(f(),!1):(r=n.find("#"+mapItemID),t.addClass("key-item-selected").find("svg g").attr("class",""),n.find("#"+mapItemID).attr("class","active"),r.appendTo(n.find(".map-svg")),i.addClass("active").siblings().removeClass("active"),!1)}function f(){return t.removeClass("key-item-selected"),i.remove(),i=r.clone().prependTo(n),a=i.find("g"),a.on("click",l),o.find(".map-key-item.active").removeClass("active"),!1}e((function(){t=e(".interactive-map"),n=t.find(".map-container"),i=t.find(".map-svg"),r=i.clone(),a=i.find("g"),o=t.find(".map-key"),c=o.find("a.key-item-link"),c.on("click",l),a.on("click",l),o.find(".clear-selection").on("click",f)}))}(jQuery)}]);