"use strict";

function _typeof(obj) { if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

!function (e, o) {
  "object" == (typeof exports === "undefined" ? "undefined" : _typeof(exports)) && "object" == (typeof module === "undefined" ? "undefined" : _typeof(module)) ? module.exports = o(require("moment"), require("fullcalendar")) : "function" == typeof define && define.amd ? define(["moment", "fullcalendar"], o) : "object" == (typeof exports === "undefined" ? "undefined" : _typeof(exports)) ? o(require("moment"), require("fullcalendar")) : o(e.moment, e.FullCalendar);
}("undefined" != typeof self ? self : void 0, function (e, o) {
  return function (e) {
    function o(n) {
      if (t[n]) return t[n].exports;
      var r = t[n] = {
        i: n,
        l: !1,
        exports: {}
      };
      return e[n].call(r.exports, r, r.exports, o), r.l = !0, r.exports;
    }

    var t = {};
    return o.m = e, o.c = t, o.d = function (e, t, n) {
      o.o(e, t) || Object.defineProperty(e, t, {
        configurable: !1,
        enumerable: !0,
        get: n
      });
    }, o.n = function (e) {
      var t = e && e.__esModule ? function () {
        return e["default"];
      } : function () {
        return e;
      };
      return o.d(t, "a", t), t;
    }, o.o = function (e, o) {
      return Object.prototype.hasOwnProperty.call(e, o);
    }, o.p = "", o(o.s = 137);
  }({
    0: function _(o, t) {
      o.exports = e;
    },
    1: function _(e, t) {
      e.exports = o;
    },
    137: function _(e, o, t) {
      Object.defineProperty(o, "__esModule", {
        value: !0
      }), t(138);
      var n = t(1);
      n.datepickerLocale("gl", "gl", {
        closeText: "Pechar",
        prevText: "&#x3C;Ant",
        nextText: "Seg&#x3E;",
        currentText: "Hoxe",
        monthNames: ["Xaneiro", "Febreiro", "Marzo", "Abril", "Maio", "Xu??o", "Xullo", "Agosto", "Setembro", "Outubro", "Novembro", "Decembro"],
        monthNamesShort: ["Xan", "Feb", "Mar", "Abr", "Mai", "Xu??", "Xul", "Ago", "Set", "Out", "Nov", "Dec"],
        dayNames: ["Domingo", "Luns", "Martes", "M??rcores", "Xoves", "Venres", "S??bado"],
        dayNamesShort: ["Dom", "Lun", "Mar", "M??r", "Xov", "Ven", "S??b"],
        dayNamesMin: ["Do", "Lu", "Ma", "M??", "Xo", "Ve", "S??"],
        weekHeader: "Sm",
        dateFormat: "dd/mm/yy",
        firstDay: 1,
        isRTL: !1,
        showMonthAfterYear: !1,
        yearSuffix: ""
      }), n.locale("gl", {
        buttonText: {
          month: "Mes",
          week: "Semana",
          day: "D??a",
          list: "Axenda"
        },
        allDayHtml: "Todo<br/>o d??a",
        eventLimitText: "m??is",
        noEventsMessage: "Non hai eventos para amosar"
      });
    },
    138: function _(e, o, t) {
      !function (e, o) {
        o(t(0));
      }(0, function (e) {
        return e.defineLocale("gl", {
          months: "xaneiro_febreiro_marzo_abril_maio_xu??o_xullo_agosto_setembro_outubro_novembro_decembro".split("_"),
          monthsShort: "xan._feb._mar._abr._mai._xu??._xul._ago._set._out._nov._dec.".split("_"),
          monthsParseExact: !0,
          weekdays: "domingo_luns_martes_m??rcores_xoves_venres_s??bado".split("_"),
          weekdaysShort: "dom._lun._mar._m??r._xov._ven._s??b.".split("_"),
          weekdaysMin: "do_lu_ma_m??_xo_ve_s??".split("_"),
          weekdaysParseExact: !0,
          longDateFormat: {
            LT: "H:mm",
            LTS: "H:mm:ss",
            L: "DD/MM/YYYY",
            LL: "D [de] MMMM [de] YYYY",
            LLL: "D [de] MMMM [de] YYYY H:mm",
            LLLL: "dddd, D [de] MMMM [de] YYYY H:mm"
          },
          calendar: {
            sameDay: function sameDay() {
              return "[hoxe " + (1 !== this.hours() ? "??s" : "??") + "] LT";
            },
            nextDay: function nextDay() {
              return "[ma???? " + (1 !== this.hours() ? "??s" : "??") + "] LT";
            },
            nextWeek: function nextWeek() {
              return "dddd [" + (1 !== this.hours() ? "??s" : "a") + "] LT";
            },
            lastDay: function lastDay() {
              return "[onte " + (1 !== this.hours() ? "??" : "a") + "] LT";
            },
            lastWeek: function lastWeek() {
              return "[o] dddd [pasado " + (1 !== this.hours() ? "??s" : "a") + "] LT";
            },
            sameElse: "L"
          },
          relativeTime: {
            future: function future(e) {
              return 0 === e.indexOf("un") ? "n" + e : "en " + e;
            },
            past: "hai %s",
            s: "uns segundos",
            ss: "%d segundos",
            m: "un minuto",
            mm: "%d minutos",
            h: "unha hora",
            hh: "%d horas",
            d: "un d??a",
            dd: "%d d??as",
            M: "un mes",
            MM: "%d meses",
            y: "un ano",
            yy: "%d anos"
          },
          dayOfMonthOrdinalParse: /\d{1,2}??/,
          ordinal: "%d??",
          week: {
            dow: 1,
            doy: 4
          }
        });
      });
    }
  });
});