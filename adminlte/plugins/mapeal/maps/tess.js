/*!
 *
 * Jquery Mapael - Dynamic maps jQuery plugin (based on raphael.js)
 * Requires jQuery and Mapael >=2.0.0
 *
 * Map of tess
 * 
 * @author Rico
 */
(function (factory) {
    if (typeof exports === 'object') {
        // CommonJS
        module.exports = factory(require('jquery'), require('jquery-mapael'));
    } else if (typeof define === 'function' && define.amd) {
        // AMD. Register as an anonymous module.
        define(['jquery', 'mapael'], factory);
    } else {
        // Browser globals
        factory(jQuery, jQuery.mapael);
    }
}(function ($, Mapael) {

    "use strict";
    
    $.extend(true, Mapael,
        {
            maps :  {
                tess : {
                    width : 210,
                    height : 297,
                    getCoords : function (lat, lon) {
                        // todo
                        return {"x" : lon, "y" : lat};
                    },
                    'elems': {
                        "A2" : "m 24.54,37.41 h 14.32 v 10.69 h -14.33 z",
                        "A1" : "m 24.54,50.14 h 14.32 v 10.69 h -14.33 z",
                        "A3" : "m 24.54,24.68 h 14.32 v 10.69 h -14.33 z",
                        "A4" : "m 24.54,62.87 h 14.32 v 10.69 h -14.33 z",
                        "A4-7" : "m 24.54,75.6 h 14.32 v 10.69 h -14.33 z",
                        "A4-7-9" : "m 24.54,88.33 h 14.32 v 10.69 h -14.33 z",
                        "A4-7-0" : "m 47.1,88.68 h 14.32 v 10.69 h -14.33 z",
                        "A4-9" : "m 47.1,24.08 h 14.32 v 10.69 h -14.33 z",
                        "A4-3" : "m 47.1,37 h 14.32 v 10.69 h -14.33 z",
                        "A4-8" : "m 47.1,49.92 h 14.32 v 10.69 h -14.33 z",
                        "A4-0" : "m 47.1,62.84 h 14.32 v 10.69 h -14.33 z",
                        "A4-2" : "m 47.1,75.76 h 14.32 v 10.69 h -14.33 z",
                        "A4-7-0-2" : "M 63.82,88.86 H 78.14 V 99.55 H 63.81 Z",
                        "A4-9-3" : "m 63.82,24.26 h 14.32 v 10.69 H 63.81 Z",
                        "A4-3-9" : "M 63.82,37.18 H 78.14 V 47.87 H 63.81 Z",
                        "A4-8-9" : "M 63.82,50.1 H 78.14 V 60.79 H 63.81 Z",
                        "A4-0-7" : "M 63.82,63.02 H 78.14 V 73.71 H 63.81 Z",
                        "A4-2-0" : "M 63.82,75.94 H 78.14 V 86.63 H 63.81 Z",
                        "A4-9-3-9" : "m 63.67,101.54 h 14.32 v 10.69 H 63.66 Z",
                        "A4-3-9-8" : "m 63.67,114.46 h 14.32 v 10.69 H 63.66 Z",
                        "A4-8-9-6" : "m 63.67,127.38 h 14.32 v 10.69 H 63.66 Z",
                        "A4-0-7-5" : "m 63.67,140.3 h 14.32 v 10.69 H 63.66 Z",
                        "A4-2-0-7" : "m 63.67,153.22 h 14.32 v 10.69 H 63.66 Z",
                        "A4-7-0-2-7" : "M 86.46,88.76 H 100.78 V 99.45 H 86.45 Z",
                        "A4-9-3-0" : "m 86.46,24.17 h 14.32 v 10.69 H 86.45 Z",
                        "A4-3-9-3" : "M 86.46,37.09 H 100.78 V 47.78 H 86.45 Z",
                        "A4-8-9-9" : "M 86.46,50.01 H 100.78 V 60.7 H 86.45 Z",
                        "A4-0-7-9" : "M 86.46,62.92 H 100.78 V 73.61 H 86.45 Z",
                        "A4-2-0-9" : "M 86.46,75.84 H 100.78 V 86.53 H 86.45 Z",
                        "A4-9-3-9-1" : "m 86.46,101.68 h 14.32 v 10.69 H 86.45 Z",
                        "A4-3-9-8-7" : "m 86.46,114.59 h 14.32 v 10.69 H 86.45 Z",
                        "A4-8-9-6-2" : "m 86.46,127.51 h 14.32 v 10.69 H 86.45 Z",
                        "A4-0-7-5-3" : "m 86.46,140.43 h 14.32 v 10.69 H 86.45 Z",
                        "A4-2-0-7-6" : "m 86.46,153.35 h 14.32 v 10.69 H 86.45 Z",
                        "A4-2-0-7-6-1" : "m 86.46,166.26 h 14.32 v 10.69 H 86.45 Z",
                        "A4-2-0-7-6-3" : "m 86.46,179.18 h 14.32 v 10.69 H 86.45 Z",
                        "A4-7-0-2-7-8" : "M 102.78,89.04 H 117.1 V 99.73 H 102.77 Z",
                        "A4-9-3-0-4" : "M 102.78,24.45 H 117.1 V 35.14 H 102.77 Z",
                        "A4-9-3-0-4-4" : "m 125.47,5.76 h 14.32 V 16.45 h -14.33 z",
                        "A4-3-9-3-8" : "M 102.78,37.37 H 117.1 V 48.06 H 102.77 Z",
                        "A4-8-9-9-0" : "M 102.78,50.28 H 117.1 V 60.97 H 102.77 Z",
                        "A4-0-7-9-4" : "M 102.78,63.2 H 117.1 V 73.89 H 102.77 Z",
                        "A4-2-0-9-6" : "M 102.78,76.12 H 117.1 V 86.81 H 102.77 Z",
                        "A4-9-3-9-1-0" : "m 102.78,101.96 h 14.32 v 10.69 h -14.33 z",
                        "A4-3-9-8-7-3" : "m 102.78,114.87 h 14.32 v 10.69 h -14.33 z",
                        "A4-8-9-6-2-2" : "m 102.78,127.79 h 14.32 v 10.69 h -14.33 z",
                        "A4-0-7-5-3-6" : "m 102.78,140.71 h 14.32 v 10.69 h -14.33 z",
                        "A4-2-0-7-6-9" : "M 102.78,153.63 H 117.1 V 164.32 H 102.77 Z",
                        "A4-2-0-7-6-1-4" : "M 102.78,166.54 H 117.1 V 177.23 H 102.77 Z",
                        "A4-2-0-7-6-3-1" : "m 102.78,179.46 h 14.32 v 10.69 h -14.33 z",
                        "A4-7-0-2-7-3" : "m 125.46,89.04 h 14.32 v 10.69 h -14.33 z",
                        "A4-9-3-0-7" : "m 125.46,24.45 h 14.32 v 10.69 h -14.33 z",
                        "A4-3-9-3-88" : "m 125.46,37.37 h 14.32 v 10.69 h -14.33 z",
                        "A4-8-9-9-3" : "m 125.46,50.29 h 14.32 v 10.69 h -14.33 z",
                        "A4-0-7-9-8" : "m 125.46,63.2 h 14.32 v 10.69 h -14.33 z",
                        "A4-2-0-9-1" : "m 125.46,76.12 h 14.32 v 10.69 h -14.33 z",
                        "A4-9-3-9-1-5" : "m 125.46,101.96 h 14.32 v 10.69 h -14.33 z",
                        "A4-3-9-8-7-35" : "m 125.46,114.87 h 14.32 v 10.69 h -14.33 z",
                        "A4-8-9-6-2-4" : "m 125.46,127.79 h 14.32 v 10.69 h -14.33 z",
                        "A4-0-7-5-3-3" : "m 125.46,140.71 h 14.32 v 10.69 h -14.33 z",
                        "A4-2-0-7-6-6" : "m 125.46,153.63 h 14.32 v 10.69 h -14.33 z",
                        "A4-2-0-7-6-1-5" : "M 125.46,166.54 H 139.78 V 177.23 H 125.45 Z",
                        "A4-2-0-7-6-3-9" : "m 125.46,179.46 h 14.32 v 10.69 h -14.33 z"
                    }
                }
            }
        }
    );

    return Mapael;

}));