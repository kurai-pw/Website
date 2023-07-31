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

        $('[data--action="userToggleMenu"]').on('click', function (event) {
          popUp.toggle();
        });
      });
    },
  };
})(jQuery, Drupal);
