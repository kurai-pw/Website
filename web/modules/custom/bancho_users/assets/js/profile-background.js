/**
 * @file
 * Set profile background.
 */

/**
 * Set profile background.
 */
(function ($, Drupal, drupalSettings) {
  /**
   * Attaches the behavior to set the profile background.
   *
   * @type {Drupal~behavior}
   */
  Drupal.behaviors.profileBackground = {
    attach(context, settings) {
      $(once('profileBackground', 'body', context)).each(function () {
        if (drupalSettings?.bancho_users?.background) {
          $('main.py-5').css({
            'background': `url(${drupalSettings.bancho_users.background}) no-repeat center center fixed`,
            'background-size': 'cover',
          });
        }
      });
    },
  };
})(jQuery, Drupal, drupalSettings);
