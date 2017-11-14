import 'bootstrap';
import 'lity';
import 'slick-carousel';

import './_navbar';
import './_backgrounds';
import './_maps';
import './_scroll';
import './_certifications';

Modernizr.addTest('safari', function() {
  return navigator.userAgent.indexOf('Safari') !== -1 && navigator.userAgent.indexOf('Chrome') === -1;
});
