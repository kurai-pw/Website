/**
 * @file
 * Set profile background.
 */

/**
 * Set profile background.
 */
(function ($, Drupal) {
  /**
   * Attaches the behavior to set the profile background.
   *
   * @type {Drupal~behavior}
   */
  Drupal.behaviors.toggleUserMenu = {
    attach(context, settings) {
      $(once('toggleUserMenu', '[data--action="userToggleMenu"]', context)).each(function () {
        let popUp = $('.menu--pop-up');
        let overlay;

        function hideMenu() {
          popUp.css({
            'display': 'none',
          });
        }

        $('[data--action="userToggleMenu"]').on('click', function (event) {
          if (popUp.css('display') === 'block') {
            hideMenu();
          }
          else {
            popUp.css({
              'display': 'block',
            });

            overlay = $('<div>', {
              class: 'user-menu-overlay',
            })
            overlay.appendTo('body');
            overlay.on('click', function () {
              overlay.remove();
              overlay = null;
              hideMenu();
            });
          }
        });
      });
    },
  };
})(jQuery, Drupal);
