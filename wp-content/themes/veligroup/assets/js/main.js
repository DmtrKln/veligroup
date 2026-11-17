(() => {
  var e = {
      42(e) {
        e.exports = (function (e) {
          function t(o) {
            if (n[o]) return n[o].exports;
            var r = (n[o] = { exports: {}, id: o, loaded: !1 });
            return (
              e[o].call(r.exports, r, r.exports, t),
              (r.loaded = !0),
              r.exports
            );
          }
          var n = {};
          return ((t.m = e), (t.c = n), (t.p = "dist/"), t(0));
        })([
          function (e, t, n) {
            "use strict";
            function o(e) {
              return e && e.__esModule ? e : { default: e };
            }
            var r =
                Object.assign ||
                function (e) {
                  for (var t = 1; t < arguments.length; t++) {
                    var n = arguments[t];
                    for (var o in n)
                      Object.prototype.hasOwnProperty.call(n, o) &&
                        (e[o] = n[o]);
                  }
                  return e;
                },
              a = (o(n(1)), n(6)),
              i = o(a),
              s = o(n(7)),
              c = o(n(8)),
              d = o(n(9)),
              l = o(n(10)),
              u = o(n(11)),
              p = o(n(14)),
              m = [],
              f = !1,
              h = {
                offset: 120,
                delay: 0,
                easing: "ease",
                duration: 400,
                disable: !1,
                once: !1,
                startEvent: "DOMContentLoaded",
                throttleDelay: 99,
                debounceDelay: 50,
                disableMutationObserver: !1,
              },
              v = function () {
                if (
                  (arguments.length > 0 &&
                    void 0 !== arguments[0] &&
                    arguments[0] &&
                    (f = !0),
                  f)
                )
                  return (
                    (m = (0, u.default)(m, h)),
                    (0, l.default)(m, h.once),
                    m
                  );
              },
              y = function () {
                ((m = (0, p.default)()), v());
              };
            e.exports = {
              init: function (e) {
                ((h = r(h, e)), (m = (0, p.default)()));
                var t = document.all && !window.atob;
                return (function (e) {
                  return (
                    !0 === e ||
                    ("mobile" === e && d.default.mobile()) ||
                    ("phone" === e && d.default.phone()) ||
                    ("tablet" === e && d.default.tablet()) ||
                    ("function" == typeof e && !0 === e())
                  );
                })(h.disable) || t
                  ? void m.forEach(function (e, t) {
                      (e.node.removeAttribute("data-aos"),
                        e.node.removeAttribute("data-aos-easing"),
                        e.node.removeAttribute("data-aos-duration"),
                        e.node.removeAttribute("data-aos-delay"));
                    })
                  : (h.disableMutationObserver ||
                      c.default.isSupported() ||
                      (console.info(
                        '\n      aos: MutationObserver is not supported on this browser,\n      code mutations observing has been disabled.\n      You may have to call "refreshHard()" by yourself.\n    ',
                      ),
                      (h.disableMutationObserver = !0)),
                    document
                      .querySelector("body")
                      .setAttribute("data-aos-easing", h.easing),
                    document
                      .querySelector("body")
                      .setAttribute("data-aos-duration", h.duration),
                    document
                      .querySelector("body")
                      .setAttribute("data-aos-delay", h.delay),
                    "DOMContentLoaded" === h.startEvent &&
                    ["complete", "interactive"].indexOf(document.readyState) >
                      -1
                      ? v(!0)
                      : "load" === h.startEvent
                        ? window.addEventListener(h.startEvent, function () {
                            v(!0);
                          })
                        : document.addEventListener(h.startEvent, function () {
                            v(!0);
                          }),
                    window.addEventListener(
                      "resize",
                      (0, s.default)(v, h.debounceDelay, !0),
                    ),
                    window.addEventListener(
                      "orientationchange",
                      (0, s.default)(v, h.debounceDelay, !0),
                    ),
                    window.addEventListener(
                      "scroll",
                      (0, i.default)(function () {
                        (0, l.default)(m, h.once);
                      }, h.throttleDelay),
                    ),
                    h.disableMutationObserver ||
                      c.default.ready("[data-aos]", y),
                    m);
              },
              refresh: v,
              refreshHard: y,
            };
          },
          function (e, t) {},
          ,
          ,
          ,
          ,
          function (e, t) {
            (function (t) {
              "use strict";
              function n(e, t, n) {
                function r(t) {
                  var n = u,
                    o = p;
                  return ((u = p = void 0), (y = t), (f = e.apply(o, n)));
                }
                function i(e) {
                  var n = e - v;
                  return void 0 === v || n >= t || n < 0 || (S && e - y >= m);
                }
                function c() {
                  var e = E();
                  return i(e)
                    ? d(e)
                    : void (h = setTimeout(
                        c,
                        (function (e) {
                          var n = t - (e - v);
                          return S ? w(n, m - (e - y)) : n;
                        })(e),
                      ));
                }
                function d(e) {
                  return ((h = void 0), x && u ? r(e) : ((u = p = void 0), f));
                }
                function l() {
                  var e = E(),
                    n = i(e);
                  if (((u = arguments), (p = this), (v = e), n)) {
                    if (void 0 === h)
                      return (function (e) {
                        return ((y = e), (h = setTimeout(c, t)), b ? r(e) : f);
                      })(v);
                    if (S) return ((h = setTimeout(c, t)), r(v));
                  }
                  return (void 0 === h && (h = setTimeout(c, t)), f);
                }
                var u,
                  p,
                  m,
                  f,
                  h,
                  v,
                  y = 0,
                  b = !1,
                  S = !1,
                  x = !0;
                if ("function" != typeof e) throw new TypeError(s);
                return (
                  (t = a(t) || 0),
                  o(n) &&
                    ((b = !!n.leading),
                    (m = (S = "maxWait" in n) ? g(a(n.maxWait) || 0, t) : m),
                    (x = "trailing" in n ? !!n.trailing : x)),
                  (l.cancel = function () {
                    (void 0 !== h && clearTimeout(h),
                      (y = 0),
                      (u = v = p = h = void 0));
                  }),
                  (l.flush = function () {
                    return void 0 === h ? f : d(E());
                  }),
                  l
                );
              }
              function o(e) {
                var t = void 0 === e ? "undefined" : i(e);
                return !!e && ("object" == t || "function" == t);
              }
              function r(e) {
                return (
                  "symbol" == (void 0 === e ? "undefined" : i(e)) ||
                  ((function (e) {
                    return (
                      !!e && "object" == (void 0 === e ? "undefined" : i(e))
                    );
                  })(e) &&
                    b.call(e) == d)
                );
              }
              function a(e) {
                if ("number" == typeof e) return e;
                if (r(e)) return c;
                if (o(e)) {
                  var t = "function" == typeof e.valueOf ? e.valueOf() : e;
                  e = o(t) ? t + "" : t;
                }
                if ("string" != typeof e) return 0 === e ? e : +e;
                e = e.replace(l, "");
                var n = p.test(e);
                return n || m.test(e)
                  ? f(e.slice(2), n ? 2 : 8)
                  : u.test(e)
                    ? c
                    : +e;
              }
              var i =
                  "function" == typeof Symbol &&
                  "symbol" == typeof Symbol.iterator
                    ? function (e) {
                        return typeof e;
                      }
                    : function (e) {
                        return e &&
                          "function" == typeof Symbol &&
                          e.constructor === Symbol &&
                          e !== Symbol.prototype
                          ? "symbol"
                          : typeof e;
                      },
                s = "Expected a function",
                c = NaN,
                d = "[object Symbol]",
                l = /^\s+|\s+$/g,
                u = /^[-+]0x[0-9a-f]+$/i,
                p = /^0b[01]+$/i,
                m = /^0o[0-7]+$/i,
                f = parseInt,
                h =
                  "object" == (void 0 === t ? "undefined" : i(t)) &&
                  t &&
                  t.Object === Object &&
                  t,
                v =
                  "object" ==
                    ("undefined" == typeof self ? "undefined" : i(self)) &&
                  self &&
                  self.Object === Object &&
                  self,
                y = h || v || Function("return this")(),
                b = Object.prototype.toString,
                g = Math.max,
                w = Math.min,
                E = function () {
                  return y.Date.now();
                };
              e.exports = function (e, t, r) {
                var a = !0,
                  i = !0;
                if ("function" != typeof e) throw new TypeError(s);
                return (
                  o(r) &&
                    ((a = "leading" in r ? !!r.leading : a),
                    (i = "trailing" in r ? !!r.trailing : i)),
                  n(e, t, { leading: a, maxWait: t, trailing: i })
                );
              };
            }).call(
              t,
              (function () {
                return this;
              })(),
            );
          },
          function (e, t) {
            (function (t) {
              "use strict";
              function n(e) {
                var t = void 0 === e ? "undefined" : a(e);
                return !!e && ("object" == t || "function" == t);
              }
              function o(e) {
                return (
                  "symbol" == (void 0 === e ? "undefined" : a(e)) ||
                  ((function (e) {
                    return (
                      !!e && "object" == (void 0 === e ? "undefined" : a(e))
                    );
                  })(e) &&
                    y.call(e) == c)
                );
              }
              function r(e) {
                if ("number" == typeof e) return e;
                if (o(e)) return s;
                if (n(e)) {
                  var t = "function" == typeof e.valueOf ? e.valueOf() : e;
                  e = n(t) ? t + "" : t;
                }
                if ("string" != typeof e) return 0 === e ? e : +e;
                e = e.replace(d, "");
                var r = u.test(e);
                return r || p.test(e)
                  ? m(e.slice(2), r ? 2 : 8)
                  : l.test(e)
                    ? s
                    : +e;
              }
              var a =
                  "function" == typeof Symbol &&
                  "symbol" == typeof Symbol.iterator
                    ? function (e) {
                        return typeof e;
                      }
                    : function (e) {
                        return e &&
                          "function" == typeof Symbol &&
                          e.constructor === Symbol &&
                          e !== Symbol.prototype
                          ? "symbol"
                          : typeof e;
                      },
                i = "Expected a function",
                s = NaN,
                c = "[object Symbol]",
                d = /^\s+|\s+$/g,
                l = /^[-+]0x[0-9a-f]+$/i,
                u = /^0b[01]+$/i,
                p = /^0o[0-7]+$/i,
                m = parseInt,
                f =
                  "object" == (void 0 === t ? "undefined" : a(t)) &&
                  t &&
                  t.Object === Object &&
                  t,
                h =
                  "object" ==
                    ("undefined" == typeof self ? "undefined" : a(self)) &&
                  self &&
                  self.Object === Object &&
                  self,
                v = f || h || Function("return this")(),
                y = Object.prototype.toString,
                b = Math.max,
                g = Math.min,
                w = function () {
                  return v.Date.now();
                };
              e.exports = function (e, t, o) {
                function a(t) {
                  var n = u,
                    o = p;
                  return ((u = p = void 0), (y = t), (f = e.apply(o, n)));
                }
                function s(e) {
                  var n = e - v;
                  return void 0 === v || n >= t || n < 0 || (S && e - y >= m);
                }
                function c() {
                  var e = w();
                  return s(e)
                    ? d(e)
                    : void (h = setTimeout(
                        c,
                        (function (e) {
                          var n = t - (e - v);
                          return S ? g(n, m - (e - y)) : n;
                        })(e),
                      ));
                }
                function d(e) {
                  return ((h = void 0), x && u ? a(e) : ((u = p = void 0), f));
                }
                function l() {
                  var e = w(),
                    n = s(e);
                  if (((u = arguments), (p = this), (v = e), n)) {
                    if (void 0 === h)
                      return (function (e) {
                        return ((y = e), (h = setTimeout(c, t)), E ? a(e) : f);
                      })(v);
                    if (S) return ((h = setTimeout(c, t)), a(v));
                  }
                  return (void 0 === h && (h = setTimeout(c, t)), f);
                }
                var u,
                  p,
                  m,
                  f,
                  h,
                  v,
                  y = 0,
                  E = !1,
                  S = !1,
                  x = !0;
                if ("function" != typeof e) throw new TypeError(i);
                return (
                  (t = r(t) || 0),
                  n(o) &&
                    ((E = !!o.leading),
                    (m = (S = "maxWait" in o) ? b(r(o.maxWait) || 0, t) : m),
                    (x = "trailing" in o ? !!o.trailing : x)),
                  (l.cancel = function () {
                    (void 0 !== h && clearTimeout(h),
                      (y = 0),
                      (u = v = p = h = void 0));
                  }),
                  (l.flush = function () {
                    return void 0 === h ? f : d(w());
                  }),
                  l
                );
              };
            }).call(
              t,
              (function () {
                return this;
              })(),
            );
          },
          function (e, t) {
            "use strict";
            function n(e) {
              var t = void 0,
                o = void 0;
              for (t = 0; t < e.length; t += 1) {
                if ((o = e[t]).dataset && o.dataset.aos) return !0;
                if (o.children && n(o.children)) return !0;
              }
              return !1;
            }
            function o() {
              return (
                window.MutationObserver ||
                window.WebKitMutationObserver ||
                window.MozMutationObserver
              );
            }
            function r(e) {
              e &&
                e.forEach(function (e) {
                  var t = Array.prototype.slice.call(e.addedNodes),
                    o = Array.prototype.slice.call(e.removedNodes);
                  if (n(t.concat(o))) return a();
                });
            }
            Object.defineProperty(t, "__esModule", { value: !0 });
            var a = function () {};
            t.default = {
              isSupported: function () {
                return !!o();
              },
              ready: function (e, t) {
                var n = window.document,
                  i = new (o())(r);
                ((a = t),
                  i.observe(n.documentElement, {
                    childList: !0,
                    subtree: !0,
                    removedNodes: !0,
                  }));
              },
            };
          },
          function (e, t) {
            "use strict";
            function n() {
              return (
                navigator.userAgent || navigator.vendor || window.opera || ""
              );
            }
            Object.defineProperty(t, "__esModule", { value: !0 });
            var o = (function () {
                function e(e, t) {
                  for (var n = 0; n < t.length; n++) {
                    var o = t[n];
                    ((o.enumerable = o.enumerable || !1),
                      (o.configurable = !0),
                      "value" in o && (o.writable = !0),
                      Object.defineProperty(e, o.key, o));
                  }
                }
                return function (t, n, o) {
                  return (n && e(t.prototype, n), o && e(t, o), t);
                };
              })(),
              r =
                /(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i,
              a =
                /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i,
              i =
                /(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i,
              s =
                /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i,
              c = (function () {
                function e() {
                  !(function (e, t) {
                    if (!(e instanceof t))
                      throw new TypeError("Cannot call a class as a function");
                  })(this, e);
                }
                return (
                  o(e, [
                    {
                      key: "phone",
                      value: function () {
                        var e = n();
                        return !(!r.test(e) && !a.test(e.substr(0, 4)));
                      },
                    },
                    {
                      key: "mobile",
                      value: function () {
                        var e = n();
                        return !(!i.test(e) && !s.test(e.substr(0, 4)));
                      },
                    },
                    {
                      key: "tablet",
                      value: function () {
                        return this.mobile() && !this.phone();
                      },
                    },
                  ]),
                  e
                );
              })();
            t.default = new c();
          },
          function (e, t) {
            "use strict";
            Object.defineProperty(t, "__esModule", { value: !0 });
            t.default = function (e, t) {
              var n = window.pageYOffset,
                o = window.innerHeight;
              e.forEach(function (e, r) {
                !(function (e, t, n) {
                  var o = e.node.getAttribute("data-aos-once");
                  t > e.position
                    ? e.node.classList.add("aos-animate")
                    : void 0 !== o &&
                      ("false" === o || (!n && "true" !== o)) &&
                      e.node.classList.remove("aos-animate");
                })(e, o + n, t);
              });
            };
          },
          function (e, t, n) {
            "use strict";
            Object.defineProperty(t, "__esModule", { value: !0 });
            var o = (function (e) {
              return e && e.__esModule ? e : { default: e };
            })(n(12));
            t.default = function (e, t) {
              return (
                e.forEach(function (e, n) {
                  (e.node.classList.add("aos-init"),
                    (e.position = (0, o.default)(e.node, t.offset)));
                }),
                e
              );
            };
          },
          function (e, t, n) {
            "use strict";
            Object.defineProperty(t, "__esModule", { value: !0 });
            var o = (function (e) {
              return e && e.__esModule ? e : { default: e };
            })(n(13));
            t.default = function (e, t) {
              var n = 0,
                r = 0,
                a = window.innerHeight,
                i = {
                  offset: e.getAttribute("data-aos-offset"),
                  anchor: e.getAttribute("data-aos-anchor"),
                  anchorPlacement: e.getAttribute("data-aos-anchor-placement"),
                };
              switch (
                (i.offset && !isNaN(i.offset) && (r = parseInt(i.offset)),
                i.anchor &&
                  document.querySelectorAll(i.anchor) &&
                  (e = document.querySelectorAll(i.anchor)[0]),
                (n = (0, o.default)(e).top),
                i.anchorPlacement)
              ) {
                case "top-bottom":
                  break;
                case "center-bottom":
                  n += e.offsetHeight / 2;
                  break;
                case "bottom-bottom":
                  n += e.offsetHeight;
                  break;
                case "top-center":
                  n += a / 2;
                  break;
                case "bottom-center":
                  n += a / 2 + e.offsetHeight;
                  break;
                case "center-center":
                  n += a / 2 + e.offsetHeight / 2;
                  break;
                case "top-top":
                  n += a;
                  break;
                case "bottom-top":
                  n += e.offsetHeight + a;
                  break;
                case "center-top":
                  n += e.offsetHeight / 2 + a;
              }
              return (
                i.anchorPlacement || i.offset || isNaN(t) || (r = t),
                n + r
              );
            };
          },
          function (e, t) {
            "use strict";
            Object.defineProperty(t, "__esModule", { value: !0 });
            t.default = function (e) {
              for (
                var t = 0, n = 0;
                e && !isNaN(e.offsetLeft) && !isNaN(e.offsetTop);
              )
                ((t += e.offsetLeft - ("BODY" != e.tagName ? e.scrollLeft : 0)),
                  (n += e.offsetTop - ("BODY" != e.tagName ? e.scrollTop : 0)),
                  (e = e.offsetParent));
              return { top: n, left: t };
            };
          },
          function (e, t) {
            "use strict";
            Object.defineProperty(t, "__esModule", { value: !0 });
            t.default = function (e) {
              return (
                (e = e || document.querySelectorAll("[data-aos]")),
                Array.prototype.map.call(e, function (e) {
                  return { node: e };
                })
              );
            };
          },
        ]);
      },
      474() {
        const e = "cookiesAccepted",
          t = document.getElementById("cookie");
        if (t) {
          let n = null;
          try {
            n = localStorage.getItem(e);
          } catch (e) {
            n = null;
          }
          (n || (t.hidden = !1),
            t.addEventListener("click", (n) => {
              const o = n.target.closest("[data-cookie]");
              if (o) {
                if ("settings" === o.dataset.cookie) {
                  let e = t.parentElement.querySelector(".cookie__settings");
                  (e ||
                    ((e = document.createElement("p")),
                    (e.className = "cookie__settings"),
                    (e.textContent =
                      "Используются только необходимые настройки сайта. Аналитические и рекламные cookie не подключены."),
                    t.insertAdjacentElement("afterend", e),
                    (() => {
                      const positionSettings = () => {
                        const bounds = t.getBoundingClientRect();
                        e.style.left = `${bounds.left}px`;
                        e.style.width = `${bounds.width}px`;
                        e.style.bottom = `${window.innerHeight - bounds.top + 8}px`;
                      };
                      positionSettings();
                      new ResizeObserver(positionSettings).observe(t);
                      window.addEventListener("resize", positionSettings);
                    })()),
                    (e.hidden =
                      !e.hidden && "true" === o.getAttribute("aria-expanded")),
                    o.setAttribute("aria-expanded", String(!e.hidden)));
                }
                if ("accept" === o.dataset.cookie) {
                  try {
                    localStorage.setItem(e, "true");
                  } catch (e) {}
                  t.hidden = !0;
                  const settings = t.parentElement.querySelector(".cookie__settings");
                  if (settings) settings.hidden = !0;
                }
              }
            }));
        }
      },
      113() {
        const e = window.matchMedia("(prefers-reduced-motion: reduce)");
        document.querySelectorAll("[data-landing-slider]").forEach((t) => {
          if (!window.Swiper) return;
          const n = t.querySelectorAll(
              ".swiper-wrapper > .swiper-slide",
            ).length,
            o = Number(t.dataset.autoplayDelay),
            r = Number.isFinite(o) && o > 0 ? o : 4500,
            a = new window.Swiper(t, {
              slidesPerView: 1,
              effect: "fade",
              fadeEffect: { crossFade: !0 },
              speed: 800,
              loop: n > 1,
              watchOverflow: !0,
              autoplay: n > 1 && { delay: r, disableOnInteraction: !1 },
              a11y: { enabled: !1 },
            }),
            i = () => {
              n < 2 ||
                (e.matches || document.hidden
                  ? a.autoplay.stop()
                  : a.autoplay.start());
            };
          (i(),
            document.addEventListener("visibilitychange", i),
            e.addEventListener("change", i));
        });
      },
      292() {
        document.querySelectorAll("[data-interactive-map]").forEach((e) => {
          const t = e.querySelector(".contacts__overlay"),
            n = e.querySelector("iframe");
          if (!t || !n) return;
          const o = () => {
            (e.classList.remove("is-active"),
              t.classList.remove("hidden"),
              (n.tabIndex = -1));
          };
          (t.addEventListener("click", (o) => {
            (e.classList.add("is-active"),
              t.classList.add("hidden"),
              (n.tabIndex = 0),
              0 === o.detail && n.focus());
          }),
            document.addEventListener("click", (t) => {
              e.contains(t.target) || o();
            }),
            e.addEventListener("mouseleave", () => {
              window.matchMedia("(min-width: 768px)").matches && o();
            }),
            document.addEventListener("keydown", (n) => {
              "Escape" === n.key &&
                e.classList.contains("is-active") &&
                (o(), t.focus());
            }));
        });
      },
      143() {
        document.querySelectorAll(".mask").forEach((e) =>
          (function (e) {
            e &&
              (e.addEventListener("input", (e) => {
                let t = e.target.value.replace(/\D/g, "");
                ((t.startsWith("8") || t.startsWith("7")) && (t = t.slice(1)),
                  (t = t.slice(0, 10)));
                let n = "+7";
                (t.length >= 1 && (n += " (" + t.slice(0, 3)),
                  t.length >= 4 && (n += ") " + t.slice(3, 6)),
                  t.length >= 7 && (n += "-" + t.slice(6, 8)),
                  t.length >= 9 && (n += "-" + t.slice(8, 10)),
                  (e.target.value = n));
              }),
              e.addEventListener("focus", () => {
                e.value || (e.value = "+7");
              }),
              e.addEventListener("blur", () => {
                "+7" === e.value && (e.value = "");
              }),
              e.addEventListener("keydown", (t) => {
                "Backspace" === t.key &&
                  e.value.replace(/\D/g, "").length <= 1 &&
                  (t.preventDefault(), (e.value = ""));
              }));
          })(e),
        );
      },
      486() {
        const e = window.Swiper;
        if (e) {
          const t = document.querySelector(".hd-projects__slider");
          if (t) {
            const n = t.closest(".hd-projects__panel");
            if (n) {
              const o = Array.from(t.querySelectorAll(".hd-projects__slide")),
                r = n.querySelector(".hd-projects__counter"),
                a = n.querySelector(".hd-projects__thumbs"),
                i = n.querySelector(
                  ".hd-projects__arrow--prev, .hd-projects__arrow-prev",
                ),
                s = n.querySelector(
                  ".hd-projects__arrow--next, .hd-projects__arrow-next",
                );
              let c = null;
              const d = () => {
                if (!c) return;
                const e = c.activeIndex;
                if (
                  (r &&
                    (r.style.setProperty(
                      "--project-current",
                      o.length ? e + 1 : 0,
                    ),
                    r.style.setProperty("--project-total", o.length),
                    r.setAttribute(
                      "aria-label",
                      o.length
                        ? `Проект ${e + 1} из ${o.length}`
                        : "Проектов нет",
                    )),
                  i && (i.disabled = 0 === e),
                  s && (s.disabled = e === o.length - 1),
                  a)
                ) {
                  a.replaceChildren();
                  for (let t = 1; t <= Math.min(2, o.length - 1); t++) {
                    const n = (e + t) % o.length,
                      r = o[n].querySelector("img");
                    if (!r) continue;
                    const i = document.createElement("button"),
                      s = document.createElement("img"),
                      d = document.createElement("p");
                    ((i.className = "hd-projects__thumb btn-reset"),
                      (i.type = "button"),
                      (i.title = `Показать проект ${n + 1}`),
                      (s.src = r.currentSrc || r.src),
                      (s.alt = ""),
                      (d.className = "hd-projects__thumb-label"),
                      (d.textContent = "СЛЕДУЮЩИЙ ПРОЕКТ"),
                      i.append(s, d),
                      i.addEventListener("click", () => c.slideTo(n)),
                      a.append(i));
                  }
                }
              };
              ((c = new e(t, {
                slidesPerView: 1,
                spaceBetween: 0,
                navigation: { prevEl: i, nextEl: s },
                a11y: { enabled: !1 },
                on: { slideChange: d, resize: d },
              })),
                d());
            }
          }
        }
      },
      615() {
        const e = window.matchMedia("(prefers-reduced-motion: reduce)"),
          t = Boolean(window.Highlight && window.CSS?.highlights),
          n = (e, t, n) => {
            const o = Number(e.dataset[t]);
            return Number.isFinite(o) && o >= 0 ? o : n;
          };
        if (
          (document.querySelectorAll('[data-typing="rotate"]').forEach((o) => {
            let r;
            try {
              r = JSON.parse(o.dataset.typingStrings);
            } catch {
              r = [];
            }
            if (
              ((r = Array.isArray(r)
                ? r.filter((e) => "string" == typeof e && e.trim())
                : []),
              r.length || (r = [o.textContent.trim()]),
              !r[0] || !window.Typed || e.matches)
            )
              return;
            const a = o.closest("h1, h2, h3, h4, h5, h6"),
              i = document.createElement("em");
            ((i.className = "bunnert__typing-reserve"),
              i.setAttribute("aria-hidden", "true"));
            const s = document.createElement("em");
            ((s.className = "bunnert__typing-text"),
              s.setAttribute("aria-hidden", "true"),
              o.replaceChildren(i, s));
            const c = () => {
              i.style.minHeight = "";
              let e = 0;
              (r.forEach((t) => {
                ((i.textContent = t),
                  (e = Math.max(e, i.getBoundingClientRect().height)));
              }),
                (i.textContent = r[0]),
                (i.style.minHeight = `${e}px`));
            };
            let d;
            (c(),
              new ResizeObserver(c).observe(o),
              document.fonts.ready.then(c));
            const l = () => {
              e.matches ||
                d ||
                (d = new window.Typed(s, {
                  strings: r,
                  typeSpeed: n(o, "typeSpeed", 100),
                  backSpeed: n(o, "backSpeed", 30),
                  backDelay: n(o, "backDelay", 2200),
                  loop: "false" !== o.dataset.typingLoop,
                  showCursor: !1,
                  contentType: "null",
                }));
            };
            (t && a && "off" !== a.dataset.typing
              ? a.addEventListener("veliy:heading-typed", l, { once: !0 })
              : l(),
              document.addEventListener("visibilitychange", () => {
                document.hidden ? d?.stop() : e.matches || d?.start();
              }),
              e.addEventListener("change", () => {
                e.matches
                  ? (d?.stop(), (s.textContent = r[0]))
                  : d
                    ? d.start()
                    : l();
              }));
          }),
          t && !e.matches)
        ) {
          const t = new Highlight();
          CSS.highlights.set("heading-typing", t);

          document.querySelectorAll("[data-stages-sequence]").forEach((sequence, sequenceIndex) => {
            const section = sequence.closest(".hd-stages"),
              track = section?.querySelector(".hd-stages__track"),
              line = track?.querySelector(".hd-stages__line"),
              columns = Array.from(sequence.querySelectorAll(".hd-stages__column"));
            if (!track || !line || !columns.length) return;

            const glow = document.createElement("div"),
              copy = line.cloneNode(true),
              namespace = "http://www.w3.org/2000/svg",
              viewWidth = Number(line.getAttribute("viewBox").split(/\s+/)[2]),
              feather = 140 / viewWidth,
              gradientId = `stages-reveal-gradient-${sequenceIndex}`,
              maskId = `stages-reveal-mask-${sequenceIndex}`;
            const svgElement = (name, attributes) => {
              const element = document.createElementNS(namespace, name);
              Object.entries(attributes).forEach(([key, value]) => element.setAttribute(key, value));
              return element;
            };
            glow.className = "hd-stages__glow";
            copy.querySelector("defs")?.remove();
            const definitions = svgElement("defs", {}),
              gradient = svgElement("linearGradient", {
                id: gradientId, gradientUnits: "userSpaceOnUse",
                x1: "0", y1: "0", x2: String(viewWidth), y2: "0",
              }),
              solid = svgElement("stop", { offset: "0", "stop-color": "white" }),
              fade = svgElement("stop", { offset: "0", "stop-color": "white", "stop-opacity": "0" }),
              mask = svgElement("mask", {
                id: maskId, maskUnits: "userSpaceOnUse",
                x: "-180", y: "-180", width: String(viewWidth + 360), height: "372",
              });
            gradient.append(
              svgElement("stop", { offset: "0", "stop-color": "white" }),
              solid, fade,
              svgElement("stop", { offset: "1", "stop-color": "white", "stop-opacity": "0" })
            );
            mask.append(svgElement("rect", {
              x: "-180", y: "-180", width: String(viewWidth + 360), height: "372",
              fill: `url(#${gradientId})`,
            }));
            definitions.append(gradient, mask);
            copy.prepend(definitions);
            const shape = copy.querySelector("g"),
              halo = svgElement("g", { class: "hd-stages__glow-filter" });
            shape.setAttribute("mask", `url(#${maskId})`);
            halo.append(shape);
            copy.append(halo);
            glow.append(copy);
            track.append(glow);

            const items = columns.map((column) => Array.from(column.querySelectorAll('h3, [data-typing="static"]'))),
              lengths = items.map((group) => group.map((item) => item.textContent.replace(/\s/g, "").length));
            let segments = [], target = -feather / 2, progress = target, frame = null, lastTime = null;
            const drawGlow = (time) => {
              const elapsed = lastTime === null ? 16 : Math.min(64, time - lastTime);
              lastTime = time;
              progress += (target - progress) * (1 - Math.exp(-elapsed / 60));
              if (Math.abs(target - progress) < 0.0001) progress = target;
              solid.setAttribute("offset", String(Math.max(0, Math.min(1, progress - feather / 2))));
              fade.setAttribute("offset", String(Math.max(0, Math.min(1, progress + feather / 2))));
              if (progress !== target) frame = requestAnimationFrame(drawGlow);
              else { frame = null; lastTime = null; }
            };
            const illuminateTo = (value) => {
              target = Math.max(target, value);
              if (frame === null) frame = requestAnimationFrame(drawGlow);
            };
            const positionGlows = () => {
              const bounds = track.getBoundingClientRect();
              if (!bounds.width) return;
              const gap = parseFloat(getComputedStyle(sequence).columnGap) || 0;
              segments = columns.map((column) => {
                const rect = column.getBoundingClientRect(),
                  start = Math.max(0, rect.left - bounds.left - gap / 2),
                  end = Math.min(bounds.width, rect.right - bounds.left + gap / 2);
                return { start: start / bounds.width, end: end / bounds.width };
              });
            };
            sequence.classList.add("is-typing-sequence");
            sequence.dataset.stagesState = "waiting";
            positionGlows();
            const observer = new ResizeObserver(positionGlows);
            observer.observe(sequence);
            columns.forEach((column) => observer.observe(column));

            sequence.addEventListener("veliy:typing-start", (event) => {
              const column = event.target.closest(".hd-stages__column"),
                index = columns.indexOf(column);
              if (index < 0) return;
              sequence.dataset.stagesState = "typing";
              column.classList.add("is-started");
              column.dataset.stageState = "typing";
              glow.classList.add("is-active");
            });
            sequence.addEventListener("veliy:typing-progress", (event) => {
              const index = columns.indexOf(event.target.closest(".hd-stages__column"));
              if (index < 0 || !segments[index]) return;
              const itemIndex = items[index].indexOf(event.target);
              if (itemIndex < 0) return;
              const total = lengths[index].reduce((sum, length) => sum + length, 0) || 1,
                before = lengths[index].slice(0, itemIndex).reduce((sum, length) => sum + length, 0),
                typed = (before + lengths[index][itemIndex] * event.detail.progress) / total,
                segment = segments[index];
              illuminateTo(segment.start + (segment.end - segment.start) * typed);
            });
            sequence.addEventListener("veliy:typing-complete", (event) => {
              const column = event.target.closest(".hd-stages__column"),
                index = columns.indexOf(column);
              if (index < 0) return;
              const items = column.querySelectorAll('h3, [data-typing="static"]');
              if (event.target !== items[items.length - 1]) return;
              column.dataset.stageState = "complete";
              if (segments[index]) illuminateTo(segments[index].end);
              if (index === columns.length - 1) {
                sequence.dataset.stagesState = "complete";
                illuminateTo(1 + feather / 2);
              }
            });
            e.addEventListener("change", () => {
              if (!e.matches) return;
              sequence.classList.remove("is-typing-sequence");
              sequence.dataset.stagesState = "complete";
              glow.classList.add("is-active");
              illuminateTo(1 + feather / 2);
            });
          });

          const o = new Map(),
            r = new Map(),
            a = (e) => {
              (e.parts.forEach((e) => t.delete(e.range)),
                (e.element.dataset.typingState = "complete"),
                e.element.dispatchEvent(new Event("veliy:heading-typed")),
                e.element.dispatchEvent(new CustomEvent("veliy:typing-complete", { bubbles: true })),
                e.onComplete?.());
            },
            i = (n) => {
              ((n.started = !0), (n.element.dataset.typingState = "typing"));
              n.element.dispatchEvent(new CustomEvent("veliy:typing-start", { bubbles: true }));
              let o = 0, revealed = 0;
              const r = () => {
                if (e.matches) return;
                let i = 0;
                for (; n.parts[o] && i < n.batchSize; ) {
                  const e = n.parts[o],
                    r = e.node.data.codePointAt(e.range.startOffset);
                  if (!/\s/.test(String.fromCodePoint(r))) {
                    i += 1;
                    revealed += String.fromCodePoint(r).length;
                  }
                  const a = e.range.startOffset + (r > 65535 ? 2 : 1);
                  (e.range.setStart(e.node, Math.min(a, e.node.length)),
                    e.range.collapsed && (t.delete(e.range), (o += 1)));
                }
                n.element.dispatchEvent(new CustomEvent("veliy:typing-progress", {
                  bubbles: true,
                  detail: { progress: n.length ? Math.min(1, revealed / n.length) : 1 },
                }));
                n.parts[o] ? (n.timer = window.setTimeout(r, n.speed)) : a(n);
              };
              r();
            },
            s = (e) => {
              for (; e.items[e.index]; ) {
                const t = e.items[e.index];
                if (t.element.getClientRects().length)
                  return (
                    (t.onComplete = () => {
                      ((e.index += 1), s(e));
                    }),
                    void i(t)
                  );
                (a(t), (e.index += 1));
              }
            },
            c = new IntersectionObserver(
              (e) => {
                e.forEach((e) => {
                  if (!e.isIntersecting) return;
                  const t = r.get(e.target) || o.get(e.target);
                  t &&
                    !t.started &&
                    ((t.started = !0),
                    c.unobserve(e.target),
                    r.has(e.target)
                      ? t.parallel
                        ? t.items.forEach((item) => item.element.getClientRects().length ? i(item) : a(item))
                        : s(t)
                      : i(t));
                });
              },
              { threshold: 0.1 },
            ),
            d = (e) => {
              if ("off" === e.dataset.typing) return null;
              ((e.dataset.typing ||= "static"),
                (e.dataset.typingState = "waiting"));
              const r = document.createTreeWalker(e, NodeFilter.SHOW_TEXT, {
                  acceptNode: (e) =>
                    e.data.trim() &&
                    !e.parentElement.closest(
                      '[aria-hidden="true"], svg, [data-typing="off"], [data-typing="rotate"]',
                    )
                      ? NodeFilter.FILTER_ACCEPT
                      : NodeFilter.FILTER_REJECT,
                }),
                a = [];
              for (; r.nextNode(); ) {
                const e = r.currentNode,
                  n = document.createRange();
                (n.selectNodeContents(e),
                  a.push({ node: e, range: n }),
                  t.add(n));
              }
              const i = e.closest("[data-typing-sequence]"),
                s = {
                  element: e,
                  parts: a,
                  length: a.reduce((sum, part) => sum + part.node.data.replace(/\s/g, "").length, 0),
                  batchSize: i?.hasAttribute("data-stages-sequence") ? 2 : 1,
                  speed:
                    n(e, "typeSpeed", i ? n(i, "typeSpeed", 35) : 35) /
                    (i ? 6 : 1),
                  started: !1,
                };
              return (o.set(e, s), s);
            },
            l = 'h1, h2, h3, h4, h5, h6, [data-typing="static"]';
          (document.querySelectorAll("[data-typing-sequence]").forEach((e) => {
            const t = Array.from(e.querySelectorAll(l))
              .filter((t) => t.closest("[data-typing-sequence]") === e)
              .map(d)
              .filter(Boolean);
            t.length &&
              (r.set(e, { items: t, index: 0, started: !1, parallel: e.dataset.typingSequence === "parallel" }), c.observe(e));
          }),
            document.querySelectorAll(l).forEach((e) => {
              e.closest("[data-typing-sequence]") || (d(e) && c.observe(e));
            }),
            e.addEventListener("change", () => {
              e.matches &&
                (c.disconnect(),
                t.clear(),
                o.forEach((e, t) => {
                  (clearTimeout(e.timer),
                    (e.onComplete = null),
                    (t.dataset.typingState = "complete"));
                }));
            }));
        }
      },
    },
    t = {};
  function n(o) {
    var r = t[o];
    if (void 0 !== r) return r.exports;
    var a = (t[o] = { exports: {} });
    return (e[o].call(a.exports, a, a.exports, n), a.exports);
  }
  ((n.n = (e) => {
    var t = e && e.__esModule ? () => e.default : () => e;
    return (n.d(t, { a: t }), t);
  }),
    (n.d = (e, t) => {
      for (var o in t)
        n.o(t, o) &&
          !n.o(e, o) &&
          Object.defineProperty(e, o, { enumerable: !0, get: t[o] });
    }),
    (n.o = (e, t) => Object.prototype.hasOwnProperty.call(e, t)),
    (() => {
      "use strict";
      var e = n(42),
        t = n.n(e);
      let o = 0,
        r = 0,
        a = [];
      const i = () => {
          if (document.body.classList.contains("overflow")) return;
          o = window.scrollY;
          const e = document.body.getBoundingClientRect(),
            t = e.width;
          ((r = Math.max(0, window.innerWidth - t)),
            (a = ["top", "width"].map((e) => ({
              property: e,
              value: document.body.style.getPropertyValue(e),
              priority: document.body.style.getPropertyPriority(e),
            }))),
            (document.body.style.width = `${t}px`),
            (document.body.style.top = `${e.top}px`),
            document.body.classList.add("overflow"),
            document.documentElement.classList.add("overflow"));
        },
        s = () => {
          if (
            document.querySelector(
              ".header__mobile.active, .modal.is-open, dialog[open]",
            )
          )
            return;
          if (!document.body.classList.contains("overflow")) return;
          (document.body.classList.remove("overflow"),
            document.documentElement.classList.remove("overflow"),
            a.forEach(({ property: e, value: t, priority: n }) => {
              t
                ? document.body.style.setProperty(e, t, n)
                : document.body.style.removeProperty(e);
            }),
            (a = []));
          const e = document.documentElement.style,
            t = e.getPropertyValue("scroll-behavior"),
            n = e.getPropertyPriority("scroll-behavior");
          (e.setProperty("scroll-behavior", "auto", "important"),
            window.scrollTo(0, o),
            t
              ? e.setProperty("scroll-behavior", t, n)
              : e.removeProperty("scroll-behavior"));
        };
      window.addEventListener("resize", () => {
        document.body.classList.contains("overflow") &&
          (document.body.style.width = `${Math.max(0, window.innerWidth - r)}px`);
      });
      const c = document.querySelector(".header"),
        d = document.querySelector(".header__burger"),
        l = document.querySelector(".header__mobile"),
        u = document.querySelector(".header__mobile-close"),
        p = () => {
          (l?.classList.remove("active"),
            l?.setAttribute("inert", ""),
            d?.classList.remove("active"),
            d?.setAttribute("aria-expanded", "false"),
            s());
        };
      (d?.addEventListener("click", () => {
        l.classList.contains("active")
          ? p()
          : (l.removeAttribute("inert"),
            l.classList.add("active"),
            d.classList.add("active"),
            d.setAttribute("aria-expanded", "true"),
            i(),
            u?.focus({ preventScroll: !0 }));
      }),
        u?.addEventListener("click", () => {
          (p(), d?.focus({ preventScroll: !0 }));
        }),
        l?.querySelectorAll("a").forEach((e) => e.addEventListener("click", p)),
        document.addEventListener("keydown", (e) => {
          if (!l?.classList.contains("active")) return;
          if (
            ("Escape" === e.key && (p(), d?.focus({ preventScroll: !0 })),
            "Tab" !== e.key)
          )
            return;
          const t = [...l.querySelectorAll("a[href],button")].filter(
              (e) => null !== e.offsetParent,
            ),
            n = t[0],
            o = t[t.length - 1];
          (e.shiftKey &&
            document.activeElement === n &&
            (e.preventDefault(), o.focus({ preventScroll: !0 })),
            e.shiftKey ||
              document.activeElement !== o ||
              (e.preventDefault(), n.focus({ preventScroll: !0 })));
        }),
        window
          .matchMedia("(min-width: 1201px)")
          .addEventListener("change", (e) => {
            e.matches && p();
          }),
        window.addEventListener(
          "scroll",
          () => c?.classList.toggle("scrolled", window.scrollY > 10),
          { passive: !0 },
        ));
      const m = location.pathname.split("/").pop() || "index.html";
      document
        .querySelectorAll(".header__nav a,.header__mobile-link,.footer__link")
        .forEach((e) => {
          e.getAttribute("href") === m &&
            (e.setAttribute("aria-current", "page"),
            e.classList.contains("header__mobile-link") &&
              e.classList.add("is-active"));
        });
      let f = null;
      const h = (e) => {
          if (!e) return;
          (e.classList.add("is-open"),
            e.setAttribute("aria-hidden", "false"),
            p(),
            i());
          const t = () => {
            e.classList.contains("is-open") &&
              e
                .querySelector("input:not([type=checkbox]),button")
                ?.focus({ preventScroll: !0 });
          };
          (requestAnimationFrame(t),
            e.addEventListener("transitionend", t, { once: !0 }));
        },
        v = (e) => {
          (e.classList.remove("is-open"),
            e.setAttribute("aria-hidden", "true"),
            s(),
            f?.focus({ preventScroll: !0 }));
        };
      (document.addEventListener("click", (e) => {
        const t = e.target.closest("[data-modal-open]");
        t &&
          (e.preventDefault(),
          (f = t),
          h(document.querySelector('[data-modal="request"]')));
        const n = e.target.closest("[data-modal-close]");
        (n && v(n.closest(".modal")),
          e.target.matches(".modal.is-open") && v(e.target));
      }),
        document.addEventListener("keydown", (e) => {
          const t = document.querySelector(".modal.is-open");
          if (!t) return;
          if (("Escape" === e.key && v(t), "Tab" !== e.key)) return;
          const n = [
              ...t.querySelectorAll("a[href],button,input,textarea"),
            ].filter((e) => !e.disabled && null !== e.offsetParent),
            o = n[0],
            r = n[n.length - 1];
          if (!t.contains(document.activeElement))
            return (e.preventDefault(), void o?.focus());
          (e.shiftKey &&
            document.activeElement === o &&
            (e.preventDefault(), r.focus()),
            e.shiftKey ||
              document.activeElement !== r ||
              (e.preventDefault(), o.focus()));
        }),
        n(474),
        n(143),
        n(486));
      const heroSliderElement = document.querySelector(".bunnert__slider"),
        heroModal = document.querySelector('[data-modal="hero-project"]'),
        heroDesktop = window.matchMedia("(min-width: 1201px)");
      if (heroSliderElement && heroModal && window.Swiper) {
        const wrapper = heroSliderElement.querySelector(".swiper-wrapper");
        if (wrapper.children.length === 1) {
          for (let index = 1; index < 3; index++) {
            wrapper.append(wrapper.firstElementChild.cloneNode(true));
          }
        }
        const slides = Array.from(wrapper.children),
          mobileDepth = Math.min(2, slides.length - 1),
          pagination = heroModal.querySelector(".hero-project-modal__pagination"),
          previous = heroModal.querySelector(".hero-project-modal__back"),
          next = heroModal.querySelector(".hero-project-modal__next"),
          deckPrevious = document.querySelector(".bunnert__deck-control--prev"),
          deckNext = document.querySelector(".bunnert__deck-control--next"),
          reducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)");
        let heroSwiper = null,
          departure = null;

        const clearDeparture = () => {
          if (!departure) return;
          const current = departure;
          departure = null;
          current.animations.forEach((animation) => animation.cancel());
          current.element.remove();
        };
        const changeHeroSlide = (direction) => {
          if (!heroSwiper) return;
          if (heroDesktop.matches) {
            if (direction === "previous") heroSwiper.slidePrev();
            else heroSwiper.slideNext();
            return;
          }
          if (heroSwiper.animating || departure) return;
          if (heroSwiper.params.loop) heroSwiper.loopFix();
          if (reducedMotion.matches || heroModal.classList.contains("is-open")) {
            if (direction === "previous") heroSwiper.slidePrev(0);
            else heroSwiper.slideNext(0);
            return;
          }

          const outgoing = heroSwiper.slides[heroSwiper.activeIndex];
          const positions = new Map();
          heroSwiper.slides.forEach((slide) => {
            positions.set(slide, {
              transform: slide.style.transform,
              opacity: Number(slide.style.opacity),
            });
          });
          if (direction === "previous") {
            const incoming = heroSwiper.slides[heroSwiper.activeIndex - 1];
            if (incoming) positions.set(incoming, {
              transform: `translate3d(0, ${-incoming.swiperSlideOffset - 110}px, -100px) rotateZ(1.5deg)`,
              opacity: 1,
            });
          }

          const element = document.createElement("div");
          const card = outgoing.querySelector("[data-hero-project-open]").cloneNode(true);
          element.className = "bunnert__departure";
          element.setAttribute("aria-hidden", "true");
          element.setAttribute("inert", "");
          card.removeAttribute("data-hero-project-open");
          card.tabIndex = -1;
          element.append(card);
          heroSliderElement.append(element);
          const bounds = heroSliderElement.getBoundingClientRect();
          const timing = {
            duration: heroSwiper.params.speed,
            easing: "cubic-bezier(0.4, 0, 0.2, 1)",
            fill: "both",
          };
          const animations = [element.animate([
            { transform: "translate3d(0, 0, 0) rotate(0deg)" },
            { transform: `translate3d(${-bounds.right - bounds.width / 4 - 40}px, -24px, 0) rotate(-8deg)` },
          ], timing)];
          if (direction === "previous") heroSwiper.slidePrev(0);
          else heroSwiper.slideNext(0);
          heroSwiper.slides.forEach((slide) => {
            const from = positions.get(slide);
            const to = {
              transform: slide.style.transform,
              opacity: Number(slide.style.opacity),
            };
            if (slide === outgoing) {
              animations.push(slide.animate([
                { ...to, opacity: 0, offset: 0 },
                { ...to, opacity: 0, offset: 0.7 },
                { ...to, offset: 1 },
              ], timing));
            } else if (from.opacity > 0 || to.opacity > 0) {
              animations.push(slide.animate([from, to], timing));
            }
          });
          const current = { element, animations };
          departure = current;
          const finish = () => { if (departure === current) clearDeparture(); };
          Promise.all(animations.map((animation) => animation.finished)).then(finish, finish);
        };

        const resizeHeroCards = () => {
          if (heroDesktop.matches) {
            heroSliderElement.style.removeProperty("height");
            return;
          }
          const height = Math.max(...slides.map((slide) =>
            slide.querySelector("[data-hero-project-open]").offsetHeight));
          if (height > 0 && heroSliderElement.style.height !== `${height}px`) {
            clearDeparture();
            heroSliderElement.style.height = `${height}px`;
            heroSwiper?.update();
          }
        };

        const syncModalContent = (swiper) => {
          const card = swiper.slides[swiper.activeIndex]?.querySelector("[data-hero-project-open]");
          const source = card?.querySelector(".hero-project-modal__content"),
            dialog = heroModal.querySelector(".hero-project-modal__dialog");
          if (!source || !dialog) return;

          const content = source.cloneNode(true),
            title = content.querySelector("h2"),
            currentContent = dialog.querySelector(".hero-project-modal__content");
          if (title) title.id = "hero-project-title";

          if (currentContent) {
            currentContent.replaceWith(content);
          } else {
            dialog.insertBefore(content, dialog.querySelector(".hero-project-modal__footer"));
          }
        };
        const syncHeroControls = (swiper) => {
          if (!swiper || swiper.destroyed) return;
          swiper.slides.forEach((slide, index) => {
            slide.querySelector("[data-hero-project-open]").tabIndex =
              index === swiper.activeIndex ? 0 : -1;
          });
          previous.disabled = !swiper.params.loop && swiper.isBeginning;
          next.disabled = !swiper.params.loop && swiper.isEnd;
          if (deckPrevious) deckPrevious.disabled = previous.disabled;
          if (deckNext) deckNext.disabled = next.disabled;
          pagination.querySelectorAll(".hero-project-modal__dot").forEach((dot, index) => {
            dot.classList.toggle("is-active", index === swiper.realIndex);
            dot.setAttribute("aria-current", index === swiper.realIndex ? "true" : "false");
          });
          if (heroModal.classList.contains("is-open")) syncModalContent(swiper);
        };
        const updateHeroAutoplay = () => {
          if (!heroSwiper?.autoplay) return;
          if (!heroDesktop.matches || reducedMotion.matches || document.hidden ||
              heroModal.classList.contains("is-open") || heroSliderElement.matches(":hover, :focus-within")) {
            heroSwiper.autoplay.stop();
          } else if (!heroSwiper.autoplay.running) {
            heroSwiper.autoplay.start();
          }
        };
        const positionHeroCards = (swiper) => {
          swiper.slides.forEach((slide) => {
            const progress = slide.progress || 0,
              distance = Math.abs(progress),
              depth = Math.min(distance, 2);
            if (!heroDesktop.matches) {
              const opacity = progress > 0 ? 0 : Math.max(0, Math.min(1, mobileDepth + 1 - distance)),
                rotation = depth <= 1 ? 1.5 * depth : 1.5 - 4.5 * (depth - 1);
              slide.style.transform = `translate3d(0, ${-slide.swiperSlideOffset - 110 * depth}px, ${-100 * depth}px) rotateZ(${rotation}deg)`;
              slide.style.zIndex = String(swiper.slides.length - Math.round(distance));
              slide.style.opacity = String(opacity);
              slide.style.pointerEvents = opacity === 0 ? "none" : "";
              return;
            }
            const scale = 1 - 0.06 * depth,
              passed = progress > 0,
              offset = passed ? 50 : 55,
              x = offset * Math.min(depth, 1) + (140 - offset) * Math.max(0, depth - 1),
              y = passed ? -120 * depth : 115 * depth,
              rotation = passed ? 9 * depth : -9 * depth,
              opacity = Math.max(0, Math.min(1, 3 - distance));
            slide.style.opacity = String(opacity);
            slide.style.pointerEvents = opacity === 0 ? "none" : "";
            slide.style.transform += ` translate3d(${x}px, ${y}px, 0) rotateZ(${rotation}deg) scale(${scale})`;
          });
        };

        // Pagination is rendered only inside the open project dialog.
        pagination.replaceChildren();
        slides.forEach((slide, index) => {
          const dot = document.createElement("button");
          dot.type = "button";
          dot.className = "hero-project-modal__dot";
          dot.title = `Проект ${index + 1}`;
          dot.addEventListener("click", () => heroSwiper?.slideToLoop(index, heroDesktop.matches ? heroSwiper.params.speed : 0));
          pagination.append(dot);
        });
        const initializeHeroSlider = () => {
          const activeIndex = heroSwiper?.realIndex ?? Math.min(2, slides.length - 1);
          const previousSwiper = heroSwiper;
          heroSwiper = null;
          clearDeparture();
          previousSwiper?.destroy(true, true);
          resizeHeroCards();
          heroSliderElement.style.setProperty("--deck-offset", `${42 + 110 * Math.min(slides.length - 1, 2)}px`);
          heroSwiper = new window.Swiper(heroSliderElement, {
            direction: "vertical",
            effect: heroDesktop.matches ? "cards" : "slide",
            virtualTranslate: !heroDesktop.matches,
            watchSlidesProgress: true,
            slidesPerView: 1,
            spaceBetween: 0,
            initialSlide: activeIndex,
            speed: reducedMotion.matches ? 0 : 600,
            loop: slides.length > 1,
            loopedSlides: Math.min(3, slides.length),
            autoplay: heroDesktop.matches && { delay: 3000, disableOnInteraction: false },
            a11y: { enabled: false },
            grabCursor: heroDesktop.matches,
            allowTouchMove: heroDesktop.matches,
            simulateTouch: heroDesktop.matches,
            cardsEffect: { slideShadows: true, rotate: true, perSlideOffset: 8 },
            mousewheel: { enabled: heroDesktop.matches, forceToAxis: true },
            on: {
              slideChange: syncHeroControls,
              setTranslate: positionHeroCards,
            },
          });
          syncHeroControls(heroSwiper);
          updateHeroAutoplay();
        };
        initializeHeroSlider();
        const heroCardObserver = new ResizeObserver(resizeHeroCards);
        slides.forEach((slide) => heroCardObserver.observe(slide.querySelector("[data-hero-project-open]")));
        heroDesktop.addEventListener("change", initializeHeroSlider);
        reducedMotion.addEventListener("change", () => {
          clearDeparture();
          heroSwiper.params.speed = reducedMotion.matches ? 0 : 600;
          updateHeroAutoplay();
        });
        document.addEventListener("visibilitychange", updateHeroAutoplay);
        ["mouseenter", "mouseleave", "focusin", "focusout"].forEach((event) => {
          heroSliderElement.addEventListener(event, updateHeroAutoplay);
        });
        new MutationObserver(updateHeroAutoplay).observe(heroModal, {
          attributes: true,
          attributeFilter: ["class"],
        });
        heroSliderElement.addEventListener("keydown", (event) => {
          const card = event.target.closest("[data-hero-project-open]");
          if (card && (event.key === "Enter" || event.key === " ")) {
            event.preventDefault();
            card.click();
          }
        });
        heroSliderElement.addEventListener("click", (event) => {
          if (!heroSwiper || heroSwiper.allowClick === false || departure) return;
          const card = event.target.closest("[data-hero-project-open]");
          if (!card) return;
          const slide = card.closest(".swiper-slide"),
            index = heroSwiper.slides.indexOf(slide);
          if (index < 0) return;
          if (!slide.classList.contains("swiper-slide-active")) {
            if (heroDesktop.matches) heroSwiper.slideTo(index);
            return;
          }
          syncModalContent(heroSwiper);
          heroModal.querySelector(".hero-project-modal__dialog").scrollTop = 0;
          h(heroModal);
          syncHeroControls(heroSwiper);
          updateHeroAutoplay();
        });
        previous.addEventListener("click", () => changeHeroSlide("previous"));
        next.addEventListener("click", () => changeHeroSlide("next"));
        deckPrevious?.addEventListener("click", () => changeHeroSlide("previous"));
        deckNext?.addEventListener("click", () => changeHeroSlide("next"));
        const returnHeroFocus = () => requestAnimationFrame(() => {
          heroSwiper?.slides[heroSwiper.activeIndex]
            ?.querySelector("[data-hero-project-open]")?.focus({ preventScroll: true });
        });
        heroModal.addEventListener("click", (event) => {
          if (event.target.closest("[data-modal-close]") || event.target === heroModal) returnHeroFocus();
        });
        document.addEventListener("keydown", (event) => {
          if (event.key === "Escape" && heroModal.classList.contains("is-open")) returnHeroFocus();
        }, true);
      }
      (document.querySelectorAll("[data-filter]").forEach((e) => {
        e.addEventListener("click", () => {
          (document.querySelectorAll("[data-filter]").forEach((t) => {
            const n = t === e;
            (t.classList.toggle("is-active", n),
              t.setAttribute("aria-pressed", String(n)));
          }),
            document.querySelectorAll("[data-category]").forEach((t) => {
              const n = e.dataset.filter;
              t.hidden =
                "all" !== n && t.dataset.category !== n && t.dataset.plan !== n;
            }));
        });
      }),
        document.querySelectorAll("[data-request-form]").forEach((e) => {
          e.addEventListener("submit", async (t) => {
            if ((t.preventDefault(), !e.reportValidity())) return;
            const n = e.querySelector(".form-status"),
              o = e.dataset.endpoint || e.getAttribute("action"),
              r = e.querySelector('[type="submit"]'),
              a = new FormData(e),
              i = new CustomEvent("veliy:form-submit", {
                bubbles: !0,
                cancelable: !0,
                detail: { form: e, data: a },
              });
            if (e.dispatchEvent(i)) {
              if (!o || "#" === o)
                return (
                  (n.textContent = `Не удалось отправить заявку. Позвоните нам: ${e.dataset.requestPhone || "+7 913 979 30 62"}.`),
                  void (n.hidden = !1)
                );
              ((r.disabled = !0),
                (n.hidden = !1),
                (n.textContent = "Отправляем заявку…"));
              try {
                const t = await fetch(o, {
                  method: "POST",
                  body: a,
                  headers: { Accept: "application/json" },
                });
                if (!t.ok) throw new Error("Request failed");
                if (!0 !== (await t.json()).success)
                  throw new Error("Request was not accepted");
                ((n.textContent =
                  "Заявка успешно отправлена. Спасибо! Мы свяжемся с вами."),
                  e.reset());
              } catch {
                n.textContent = `Не удалось отправить заявку. Попробуйте ещё раз или позвоните: ${e.dataset.requestPhone || "+7 913 979 30 62"}.`;
              } finally {
                r.disabled = !1;
              }
            }
          });
        }));
      const w = document.querySelectorAll("[data-lightbox]");
      if (w.length) {
        const e = document.createElement("dialog");
        ((e.className = "lightbox"),
          (e.innerHTML =
            '<button class="lightbox__close" type="button" title="Закрыть документ"><svg width="16" height="16" viewBox="0 0 16 16" aria-hidden="true"><path d="m3 3 10 10M3 13 13 3" stroke="currentColor" stroke-width="2"/></svg></button><img alt=""><p></p>'),
          document.body.append(e));
        let t = null;
        (w.forEach((n) =>
          n.addEventListener("click", (o) => {
            (o.preventDefault(),
              (t = n),
              (e.querySelector("img").src = n.href),
              (e.querySelector("img").alt = n.querySelector("img").alt),
              (e.querySelector("p").textContent = n.dataset.caption || ""),
              i(),
              e.showModal(),
              p());
          }),
        ),
          e.addEventListener("close", () => {
            (s(), t?.focus({ preventScroll: !0 }));
          }),
          e.querySelector("button").addEventListener("click", () => e.close()),
          e.addEventListener("click", (t) => {
            t.target === e && e.close();
          }));
      }
      const E = document.querySelector('[data-modal="service"]');
      if (E) {
        const e = document.querySelector('[data-modal="request"]'),
          t = e.querySelector("[data-request-form]"),
          n = document.createElement("input");
        ((n.type = "hidden"), (n.name = "service"));
        const o = document.createElement("input");
        ((o.type = "hidden"), (o.name = "service_request"), t.append(n, o));
        let r = null,
          a = !1;
        (document.querySelectorAll("[data-service-open]").forEach((e) => {
          e.addEventListener("click", () => {
            ((r = e), (a = !1));
            const t = e.querySelector("[data-service-content]");
            if (t) {
              const e = t.content;
              [
                ".service-modal__title",
                ".service-modal__description",
                ".service-modal__timing .service-modal__value",
                ".service-modal__cost .service-modal__value",
                ".service-modal__button--order",
              ].forEach((t) => {
                const n = e.querySelector(t),
                  o = E.querySelector(t);
                n && o && (o.textContent = n.textContent.trim());
              });
              const n = e.querySelector(".service-modal__list"),
                o = E.querySelector(".service-modal__list");
              n && o && o.replaceChildren(...n.cloneNode(!0).childNodes);
            }
            ((E.querySelector(".service-modal__dialog").scrollTop = 0), h(E));
          });
        }),
          E.querySelectorAll("[data-service-request]").forEach((t) => {
            t.addEventListener("click", () => {
              ((a = !0),
                (n.value = E.querySelector(
                  ".service-modal__title",
                ).textContent.trim()),
                (o.value = t.dataset.serviceRequest),
                h(e),
                v(E));
            });
          }),
          document.addEventListener("click", (t) => {
            const i =
              t.target.closest("[data-modal-close]")?.closest(".modal") ||
              (t.target.matches(".modal") ? t.target : null);
            ((i === E || (a && i === e)) && r?.focus({ preventScroll: !0 }),
              t.target.closest("[data-modal-open]") &&
                ((a = !1), (n.value = ""), (o.value = "")));
          }),
          document.addEventListener(
            "keydown",
            (t) => {
              "Escape" === t.key &&
                (E.classList.contains("is-open") ||
                  (a && e.classList.contains("is-open"))) &&
                queueMicrotask(() => r?.focus({ preventScroll: !0 }));
            },
            !0,
          ));
      }
      if ((n(113), n(615), document.body.classList.contains("page--start"))) {
        document
          .querySelectorAll(".start-inclusions__cards, .start-audience__cards")
          .forEach((e) => {
            const t = [...e.children];
            t.forEach((e) => {
              const n = () => {
                t.forEach((t) => {
                  t !== e &&
                    (t.classList.remove("active"),
                    t.hasAttribute("aria-pressed") &&
                      t.setAttribute("aria-pressed", "false"));
                });
              };
              (e.addEventListener("mouseenter", n),
                e.addEventListener("focusin", n));
            });
          });
        const e = [...document.querySelectorAll(".start-inclusions__card")];
        (e.forEach((t) => {
          (t.setAttribute("role", "button"),
            (t.tabIndex = 0),
            t.setAttribute(
              "aria-pressed",
              String(t.classList.contains("active")),
            ));
          const n = () => {
            const n = !t.classList.contains("active");
            e.forEach((e) => {
              const o = e === t && n;
              (e.classList.toggle("active", o),
                e.setAttribute("aria-pressed", String(o)));
            });
          };
          (t.addEventListener("click", n),
            t.addEventListener("keydown", (e) => {
              ("Enter" !== e.key && " " !== e.key) || (e.preventDefault(), n());
            }));
        }),
          document.querySelectorAll(".footer__btns button").forEach((e, t) => {
            (e.removeAttribute("data-modal-open"),
              (e.dataset.startModal = 0 === t ? "connect" : "consult"));
          }));
        let t = null;
        (document.querySelectorAll("[data-start-modal]").forEach((e) => {
          e.addEventListener("click", () => {
            t = e;
            const n = document.querySelector(
              `[data-modal="start-${e.dataset.startModal}"]`,
            );
            if ("connect" === e.dataset.startModal) {
              const t = n.querySelector('input[name="service"][data-service-default]');
              t &&
                ((t.checked = !0),
                t.dispatchEvent(new Event("change", { bubbles: !0 })));
            }
            h(n);
          });
        }),
          document.addEventListener("click", (e) => {
            (e.target.closest(".start-modal [data-modal-close]") ||
              e.target.matches(".start-modal")) &&
              t?.focus({ preventScroll: !0 });
          }),
          document.addEventListener("keydown", (e) => {
            "Escape" !== e.key ||
              document.querySelector(".start-modal.is-open") ||
              t?.focus({ preventScroll: !0 });
          }));
        const n = document.querySelector("#start-service-options"),
          o = document.querySelector(".start-modal__select"),
          r = o.closest(".start-modal__service"),
          a = window.matchMedia("(prefers-reduced-motion: reduce)");
        let i = "true" === o.getAttribute("aria-expanded"),
          s = null;
        const c = (e) => {
            if (e === i) return;
            i = e;
            const t = n.hidden ? 0 : n.getBoundingClientRect().height,
              r = n.hidden ? 0 : Number(getComputedStyle(n).opacity);
            (s?.cancel(),
              o.setAttribute("aria-expanded", String(e)),
              n.setAttribute("aria-hidden", String(!e)),
              (n.inert = !e),
              (n.hidden = !1));
            const c = n.animate(
              [
                { height: `${t}px`, opacity: r },
                {
                  height: e ? `${n.scrollHeight}px` : "0px",
                  opacity: e ? 1 : 0,
                },
              ],
              {
                duration: a.matches ? 0 : 280,
                easing: "ease-in-out",
                fill: "forwards",
              },
            );
            ((s = c),
              (c.onfinish = () => {
                ((n.hidden = !e), c.cancel(), (s = null));
              }));
          },
          d = (e) => {
            ((o.querySelector("[data-selected-service]").textContent = e.value),
              o.closest(".modal").classList.contains("is-open") &&
                (o.focus({ preventScroll: !0 }), c(!1)));
          };
        (o.addEventListener("click", () => {
          c(!i);
        }),
          n.addEventListener("change", (e) => {
            e.target.matches('input[type="radio"]') && d(e.target);
          }),
          n.addEventListener("click", (e) => {
            e.target.matches('input[type="radio"]') &&
              e.target.checked &&
              d(e.target);
          }),
          r.addEventListener("keydown", (e) => {
            "Escape" === e.key &&
              i &&
              (e.stopPropagation(),
              e.preventDefault(),
              o.focus({ preventScroll: !0 }),
              c(!1));
          }));
        const l = [...document.querySelectorAll(".start-faq__question")],
          u = new WeakMap(),
          p = window.matchMedia("(prefers-reduced-motion: reduce)"),
          m = (e, t) => {
            const n = document.getElementById(e.getAttribute("aria-controls")),
              o = n.hidden ? 0 : n.getBoundingClientRect().height,
              r = n.hidden ? 0 : Number(getComputedStyle(n).opacity);
            if (
              (u.get(n)?.cancel(),
              e.setAttribute("aria-expanded", String(t)),
              n.setAttribute("aria-hidden", String(!t)),
              !t && n.hidden)
            )
              return;
            n.hidden = !1;
            const a = n.animate(
              [
                { height: `${o}px`, opacity: r },
                {
                  height: t ? `${n.scrollHeight}px` : "0px",
                  opacity: t ? 1 : 0,
                },
              ],
              {
                duration: p.matches ? 0 : 320,
                easing: "ease-in-out",
                fill: "forwards",
              },
            );
            (u.set(n, a),
              (a.onfinish = () => {
                ((n.hidden = !t), a.cancel(), u.delete(n));
              }));
          };
        l.forEach((e) => {
          e.addEventListener("click", () => {
            const t = "true" !== e.getAttribute("aria-expanded");
            l.forEach((n) => {
              (n !== e && "true" !== n.getAttribute("aria-expanded")) ||
                m(n, n === e && t);
            });
          });
        });
        const f = document.querySelector(".start-examples__cards"),
          v = [...f.querySelectorAll(".start-examples__card")],
          y = f.querySelector(".start-examples__main"),
          b = f.querySelector(".start-examples__side");
        let g = 0,
          w = 0;
        const E = () => {
            const e = f.getBoundingClientRect().width;
            if (!e) return;
            const t = f.cloneNode(!0);
            (t.setAttribute("aria-hidden", "true"),
              (t.style.cssText = `position: absolute; visibility: hidden; pointer-events: none; width: ${e}px; margin: 0; --examples-height: 0px;`));
            const n = t.querySelector(".start-examples__main"),
              o = t.querySelector(".start-examples__side"),
              r = v.map((e) => {
                const t = e.cloneNode(!0);
                return (
                  t
                    .querySelectorAll("[id]")
                    .forEach((e) => e.removeAttribute("id")),
                  t
                );
              });
            (t.querySelectorAll("[id]").forEach((e) => e.removeAttribute("id")),
              f.parentElement.append(t));
            let a = 0;
            (v.forEach((e, i) => {
              (n.replaceChildren(),
                o.replaceChildren(),
                r.forEach((e, t) => {
                  const a = r[(i + t) % v.length];
                  (0 === t ? n : o).append(a);
                }),
                (a = Math.max(a, t.getBoundingClientRect().height)));
            }),
              t.remove(),
              f.style.setProperty("--examples-height", `${Math.ceil(a)}px`),
              (g = e));
          },
          S = () => {
            (cancelAnimationFrame(w), (w = requestAnimationFrame(E)));
          };
        (E(),
          new ResizeObserver(() => {
            f.getBoundingClientRect().width !== g && S();
          }).observe(f),
          new MutationObserver(S).observe(f, {
            childList: !0,
            characterData: !0,
            subtree: !0,
          }),
          document.fonts.ready.then(S),
          document.fonts.addEventListener("loadingdone", S));
        let x = 0;
        const k = (e) => {
          ((x = (x + e + v.length) % v.length),
            v.forEach((e, t) => {
              const n = (x + t) % v.length,
                o = v[n];
              (0 === t ? y : b).append(o);
            }));
        };
        (document
          .querySelector("[data-example-prev]")
          .addEventListener("click", () => k(-1)),
          document
            .querySelector("[data-example-next]")
            .addEventListener("click", () => k(1)));
      }
      (n(292),
        t().init({
          once: !0,
          duration: 800,
          disable: () =>
            window.matchMedia("(prefers-reduced-motion: reduce)").matches,
        }));
    })());
})();
