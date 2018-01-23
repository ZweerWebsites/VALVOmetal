import $ from 'jquery';

const zoom = 4;
const center = {
  lat: 45.916536,
  lng: 8.332341,
};
const styles = [{"elementType":"geometry","stylers":[{"color":"#f5f5f5"}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"elementType":"labels.text.fill","stylers":[{"color":"#616161"}]},{"elementType":"labels.text.stroke","stylers":[{"color":"#f5f5f5"}]},{"featureType":"administrative.land_parcel","elementType":"labels.text.fill","stylers":[{"color":"#bdbdbd"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#eeeeee"}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"color":"#757575"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#e5e5e5"}]},{"featureType":"poi.park","elementType":"labels.text.fill","stylers":[{"color":"#9e9e9e"}]},{"featureType":"road","elementType":"geometry","stylers":[{"color":"#ffffff"}]},{"featureType":"road.arterial","elementType":"labels.text.fill","stylers":[{"color":"#757575"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#dadada"}]},{"featureType":"road.highway","elementType":"labels.text.fill","stylers":[{"color":"#616161"}]},{"featureType":"road.local","elementType":"labels.text.fill","stylers":[{"color":"#9e9e9e"}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"color":"#e5e5e5"}]},{"featureType":"transit.station","elementType":"geometry","stylers":[{"color":"#eeeeee"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#c9c9c9"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"color":"#9e9e9e"}]}];
const icon = {
  url: `${baseUrl}/img/marker.svg`,
};


function initReferencesMap() {
  const $map = $('#map');

  if ($map.length > 0) {
    const height = $(window).height();

    $map.css('height', height);

    const map = new google.maps.Map($map.get(0), {
      zoom,
      center,
      styles,
    });

    const markers = {};
    const infoWindow = new google.maps.InfoWindow;
    const $infoBaseContent = $('<div class="marker row"><div class="col"><h3></h3><ul class="list-unstyled"><li class="marker-site_name">NOME IMPIANTO: <strong></strong></li><li class="marker-build_year">ANNO DI COSTRUZIONE: <strong></strong></li><li class="marker-nation">PAESE: <strong></strong></li></ul></div><div class="col"><div class="marker-image-container"><img class="marker-image"></div></div></div>');

    customers.forEach((customer) => {
      const marker = new google.maps.Marker({
        icon,
        map,
        position: {
          lat: customer.lat,
          lng: customer.lng,
        },
      });

      marker.customerInfo = customer;

      const infoContent = $infoBaseContent.clone();
      infoContent.find('h3').text(customer.name);
      infoContent.find('.marker-site_name strong').text(customer.site_name);
      infoContent.find('.marker-build_year strong').text(customer.build_year);
      infoContent.find('.marker-nation strong').text(customer.nation);
      infoContent.find('.marker-image').attr('src', customer.image);

      marker.addListener('click', () => {
        infoWindow.setContent(infoContent.get(0).outerHTML);
        infoWindow.open(map, marker);
      });

      markers[customer.index] = marker;
    });

    const markerCluster = new window.MarkerClusterer(map, Object.values(markers), {
      imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m',
    });

    const $filterCustomer = $('#map_filter_customer');
    const $filterSite = $('#map_filter_site');
    const $filterNation = $('#map_filter_nation');
    const $filterApply = $('.map_filter_apply');

    $filterApply.click(() => {
      const filterCustomer = $filterCustomer.val();
      const filterSite = $filterSite.val();
      const filterNation = $filterNation.val();

      Object.values(markers).forEach((marker) => {
        const {
          name,
          site_name,
          nation,
        } = marker.customerInfo;

        marker.setVisible((filterCustomer === '' || filterCustomer === name) && (filterSite === '' || filterSite === site_name) && (filterNation === '' || filterNation === nation));
      });
    });

    if (false) {
      $('.customer_logo').click((event) => {
        const $customerLogo = $(event.currentTarget);
        const index = $customerLogo.data('marker-index');

        google.maps.event.trigger(markers[index], 'click');
      });
    }
  }
}

function initContactsMaps() {
  const $maps = $('.contacts-page-container .map');

  $maps.each((_, $$map) => {
    const $map = $($$map);

    $map.height($map.width() / 2);

    const lat = $map.data('lat');
    const lng = $map.data('lng');

    const map = new google.maps.Map($map.get(0), {
      zoom,
      center,
      styles,
    });

    const marker = new google.maps.Marker({
      icon,
      map,
      position: {
        lat,
        lng,
      },
    });
  });
}

window.initMaps = function initMaps() {
  initReferencesMap();
  initContactsMaps();
};
