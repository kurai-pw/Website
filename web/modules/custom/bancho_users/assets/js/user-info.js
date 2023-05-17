/**
 * @file
 * Set user info.
 */

/**
 * Set user info.
 */
(function ($, Drupal, drupalSettings) {
  /**
   * Attaches the batch behavior to progress bars.
   *
   * @type {Drupal~behavior}
   */
  Drupal.behaviors.profileBackground = {
    attach(context, settings) {
      $(once('profileBackground', 'body', context)).each(function () {
        // @TODO Rework when will be available through localhost.
        // const info = drupalSettings.bancho_users.data.player.info;
        // const stats = drupalSettings.bancho_users.data.player.stats[drupalSettings.bancho_users.mode];

        let info;
        let stats;

        let uid = window.location.pathname.split("/user/").pop();
        uid = uid === '1' ? '3' : uid;
        $.ajax({
          url: 'https://api.kurai.pw/v1/get_player_info',
          method: 'GET',
          dataType: 'json',
          // cors: true,
          // contentType:'application/json',
          // secure: true,
          data: {
            'id': uid,
            'scope': 'all',
          },
          success: function(data){
            info = data.player.info;
            stats = data.player.stats[0];


            // Global rank.
            $('#user-global-rank').html(`#${stats.rank}`);
            // Country rank.
            $('#user-country-rank').html(`#${stats.country_rank}`);

            // User PP.
            $('#user-pp').html(stats.pp);

            // Play time.
            let playTime = $('#user-total-play-time');
            playTime.html(
              `${Math.floor(stats.playtime / (3600 * 24))}d ${Math.floor(stats.playtime % (3600 * 24) / 3600)}h ${Math.floor(stats.playtime % 3600 / 60)}m`
            )
            playTime.data(
              'data--playtime-hours',
              Math.floor(stats.playtime / 3600)
            );

            // Ranked score.
            $('#user-stat-ranked-score').html(stats.rscore);

            // Accuracy.
            $('#user-stat-accuracy').html(stats.acc);

            // Play count.
            $('#user-stat-play-count').html(stats.plays);

            // Total score.
            $('#user-stat-total-score').html(stats.tscore);

            // Total hits.
            $('#user-stat-total-hits').html(stats.total_hits);

            // Maximum combo.
            $('#user-stat-maximum-combo').html(stats.max_combo);

            // Replay watcher by Others.
            $('#user-stat-replays-watched').html(stats.replay_views);
          }
        });
      });
    },
  };
})(jQuery, Drupal, drupalSettings);
