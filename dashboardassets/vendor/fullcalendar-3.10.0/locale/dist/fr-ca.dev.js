"use strict";

function _typeof(obj) { if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

!function (e, r) {
  "object" == (typeof exports === "undefined" ? "undefined" : _typeof(exports)) && "object" == (typeof module === "undefined" ? "undefined" : _typeof(module)) ? module.exports = r(require("moment"), require("fullcalendar")) : "function" == typeof define && define.amd ? define(["moment", "fullcalendar"], r) : "object" == (typeof exports === "undefined" ? "undefined" : _typeof(exports)) ? r(require("moment"), require("fullcalendar")) : r(e.moment, e.FullCalendar);
}("undefined" != typeof self ? self : void 0, function (e, r) {
  return function (e) {
    function r(t) {
      if (n[t]) return n[t].exports;
      var a = n[t] = {
        i: t,
        l: !1,
        exports: {}
      };
      return e[t].call(a.exports, a, a.exports, r), a.l = !0, a.exports;
    }

    var n = {};
    return r.m = e, r.c = n, r.d = function (e, n, t) {
      r.o(e, n) || Object.defineProperty(e, n, {
        configurable: !1,
        enumerable: !0,
        get: t
      });
    }, r.n = function (e) {
      var n = e && e.__esModule ? function () {
        return e["default"];
      } : function () {
        return e;
      };
      return r.d(n, "a", n), n;
    }, r.o = function (e, r) {
      return Object.prototype.hasOwnProperty.call(e, r);
    }, r.p = "", r(r.s = 131);
  }({
    0: function _(r, n) {
      r.exports = e;
    },
    1: function _(e, n) {
      e.exports = r;
    },
    131: function _(e, r, n) {
      Object.defineProperty(r, "__esModule", {
        value: !0
      }), n(132);
      var t = n(1);
      t.datepickerLocale("fr-ca", "fr-CA", {
        closeText: "Fermer",
        prevText: "Précédent",
        nextText: "Suivant",
        currentText: "Aujourd'hui",
        monthNames: ["janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre"],
        monthNamesShort: ["janv.", "févr.", "mars", "avril", "mai", "juin", "juil.", "août", "sept.", "oct.", "nov.", "déc."],
        dayNames: ["dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi"],
        dayNamesShort: ["dim.", "lun.", "mar.", "mer.", "jeu.", "ven.", "sam."],
        dayNamesMin: ["D", "L", "M", "M", "J", "V", "S"],
        weekHeader: "Sem.",
        dateFormat: "yy-mm-dd",
        firstDay: 0,
        isRTL: !1,
        showMonthAfterYear: !1,
        yearSuffix: ""
      }), t.locale("fr-ca", {
        buttonText: {
          year: "Année",
          month: "Mois",
          week: "Semaine",
          day: "Jour",
          list: "Mon planning"
        },
        allDayHtml: "Toute la<br/>journée",
        eventLimitText: "en plus",
        noEventsMessage: "Aucun événement à afficher"
      });
    },
    132: function _(e, r, n) {
      !function (e, r) {
        r(n(0));
      }(0, function (e) {
        return e.defineLocale("fr-ca", {
          months: "janvier_février_mars_avril_mai_juin_juillet_août_septembre_octobre_novembre_décembre".split("_"),
          monthsShort: "janv._févr._mars_avr._mai_juin_juil._août_sept._oct._nov._déc.".split("_"),
          monthsParseExact: !0,
          weekdays: "dimanche_lundi_mardi_mercredi_jeudi_vendredi_samedi".split("_"),
          weekdaysShort: "dim._lun._mar._mer._jeu._ven._sam.".split("_"),
          weekdaysMin: "di_lu_ma_me_je_ve_sa".split("_"),
          weekdaysParseExact: !0,
          longDateFormat: {
            LT: "HH:mm",
            LTS: "HH:mm:ss",
            L: "YYYY-MM-DD",
            LL: "D MMMM YYYY",
            LLL: "D MMMM YYYY HH:mm",
            LLLL: "dddd D MMMM YYYY HH:mm"
          },
          calendar: {
            sameDay: "[Aujourd’hui à] LT",
            nextDay: "[Demain à] LT",
            nextWeek: "dddd [à] LT",
            lastDay: "[Hier à] LT",
            lastWeek: "dddd [dernier à] LT",
            sameElse: "L"
          },
          relativeTime: {
            future: "dans %s",
            past: "il y a %s",
            s: "quelques secondes",
            ss: "%d secondes",
            m: "une minute",
            mm: "%d minutes",
            h: "une heure",
            hh: "%d heures",
            d: "un jour",
            dd: "%d jours",
            M: "un mois",
            MM: "%d mois",
            y: "un an",
            yy: "%d ans"
          },
          dayOfMonthOrdinalParse: /\d{1,2}(er|e)/,
          ordinal: function ordinal(e, r) {
            switch (r) {
              default:
              case "M":
              case "Q":
              case "D":
              case "DDD":
              case "d":
                return e + (1 === e ? "er" : "e");

              case "w":
              case "W":
                return e + (1 === e ? "re" : "e");
            }
          }
        });
      });
    }
  });
});