import 'jquery';
import 'bootstrap';
import 'lightgallery';
import 'slick-carousel';
import 'jquery-sticky';
import 'waypoints/lib/jquery.waypoints.js';

import './_navbar';
import './_backgrounds';
import './_maps';
import './_scroll';
import './_certifications';
import './_references';
import './_product';
import './_news';
import './_testing';
import './_waypoints';

Modernizr.addTest('safari', function() {
  return navigator.userAgent.indexOf('Safari') !== -1 && navigator.userAgent.indexOf('Chrome') === -1;
});
