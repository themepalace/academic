( function( $ ) {
  $(window).load(function() {
    $(function() {
        $('.os-animation').css('opacity', 0).waypoint(function(direction) {
            if (direction === 'down') {
              $(this.element).animate({ opacity: 1 })
            }
            else {
              $(this.element).animate({ opacity: 1 })
            }
          }, {
            offset: '100%'
        });
    });
  });
} )( jQuery );
