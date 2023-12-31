/*!
FullCalendar Google Calendar Plugin v4.4.2
Docs & License: https://fullcalendar.io/
(c) 2019 Adam Shaw
*/
!(function (e, r) {
    "object" == typeof exports && "undefined" != typeof module
        ? r(exports, require("@fullcalendar/core"))
        : "function" == typeof define && define.amd
        ? define(["exports", "@fullcalendar/core"], r)
        : r(((e = e || self).FullCalendarGoogleCalendar = {}), e.FullCalendar);
})(this, function (e, r) {
    "use strict";
    var n = function () {
            return (n =
                Object.assign ||
                function (e) {
                    for (var r, n = 1, t = arguments.length; n < t; n++) for (var a in (r = arguments[n])) Object.prototype.hasOwnProperty.call(r, a) && (e[a] = r[a]);
                    return e;
                }).apply(this, arguments);
        },
        t = { url: String, googleCalendarApiKey: String, googleCalendarId: String, googleCalendarApiBase: String, data: null },
        a = {
            parseMeta: function (e) {
                if (("string" == typeof e && (e = { url: e }), "object" == typeof e)) {
                    var n = r.refineProps(e, t);
                    if (
                        (!n.googleCalendarId &&
                            n.url &&
                            (n.googleCalendarId = (function (e) {
                                var r;
                                if (/^[^\/]+@([^\/\.]+\.)*(google|googlemail|gmail)\.com$/.test(e)) return e;
                                if ((r = /^https:\/\/www.googleapis.com\/calendar\/v3\/calendars\/([^\/]*)/.exec(e)) || (r = /^https?:\/\/www.google.com\/calendar\/feeds\/([^\/]*)/.exec(e))) return decodeURIComponent(r[1]);
                            })(n.url)),
                        delete n.url,
                        n.googleCalendarId)
                    )
                        return n;
                }
                return null;
            },
            fetch: function (e, t, a) {
                var o = e.calendar,
                    l = e.eventSource.meta,
                    i = l.googleCalendarApiKey || o.opt("googleCalendarApiKey");
                if (i) {
                    var d = (function (e) {
                            var r = e.googleCalendarApiBase;
                            r || (r = "https://www.googleapis.com/calendar/v3/calendars");
                            return r + "/" + encodeURIComponent(e.googleCalendarId) + "/events";
                        })(l),
                        s = (function (e, t, a, o) {
                            var l, i, d;
                            o.canComputeOffset ? ((i = o.formatIso(e.start)), (d = o.formatIso(e.end))) : ((i = r.addDays(e.start, -1).toISOString()), (d = r.addDays(e.end, 1).toISOString()));
                            (l = n({}, a || {}, { key: t, timeMin: i, timeMax: d, singleEvents: !0, maxResults: 9999 })), "local" !== o.timeZone && (l.timeZone = o.timeZone);
                            return l;
                        })(e.range, i, l.data, o.dateEnv);
                    r.requestJson(
                        "GET",
                        d,
                        s,
                        function (e, r) {
                            var n, o;
                            e.error
                                ? a({ message: "Google Calendar API: " + e.error.message, errors: e.error.errors, xhr: r })
                                : t({
                                      rawEvents:
                                          ((n = e.items),
                                          (o = s.timeZone),
                                          n.map(function (e) {
                                              return (function (e, r) {
                                                  var n = e.htmlLink || null;
                                                  n &&
                                                      r &&
                                                      (n = (function (e, r) {
                                                          return e.replace(/(\?.*?)?(#|$)/, function (e, n, t) {
                                                              return (n ? n + "&" : "?") + r + t;
                                                          });
                                                      })(n, "ctz=" + r));
                                                  return { id: e.id, title: e.summary,icon: 'google', start: e.start.dateTime || e.start.date, end: e.end.dateTime || e.end.date, url: n, location: e.location, description: e.description };
                                              })(e, o);
                                          })),
                                      xhr: r,
                                  });
                        },
                        function (e, r) {
                        	var n, o;
                            e.error
                            ? a({ message: "Google Calendar API: " + e.error.message, errors: e.error.errors, xhr: r })
                                : t({
                                      rawEvents:{ id: '', title: '', start: '' || '', end: '' ||'', url: '', location: '', description: '' }                                             
                                });
                        }
                    );
                } else a({ message: "Specify a googleCalendarApiKey. See http://fullcalendar.io/docs/google_calendar/" });
            },
        };
    var o = r.createPlugin({ eventSourceDefs: [a] });
    (e.default = o), Object.defineProperty(e, "__esModule", { value: !0 });
});