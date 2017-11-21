import 'bootstrap';
import 'lightgallery';
import 'slick-carousel';
import 'jquery-sticky';

import './_navbar';
import './_backgrounds';
import './_maps';
import './_scroll';
import './_certifications';
import './_product';
import './_news';

Modernizr.addTest('safari', function() {
  return navigator.userAgent.indexOf('Safari') !== -1 && navigator.userAgent.indexOf('Chrome') === -1;
});
