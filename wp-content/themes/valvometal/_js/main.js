import 'bootstrap';

import './_navbar';
import './_backgrounds';
import './_maps';

Modernizr.addTest('safari', function() {
  return navigator.userAgent.indexOf('Safari') !== -1 && navigator.userAgent.indexOf('Chrome') === -1;
});
