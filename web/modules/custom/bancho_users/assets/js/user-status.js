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
  Drupal.behaviors.userStatus = {
    attach(context, settings) {
      $(once('userStatus', 'body', context)).each(function () {
        let uid = window.location.pathname.split("/user/").pop();
        // @TODO Remove later.
        uid = uid === '1' ? '3' : uid;
        $.ajax({
          // @TODO HARDCODED DOMAIN!!!!!!!
          url: 'https://api.kurai.pw/v1/get_player_status',
          method: 'GET',
          dataType: 'json',
          data: {
            'id': uid,
          },
          success: function(data){
            let action = data.player_status.status.action;
            switch (action) {
              case 0:
                action = 'Idle: 🔍 Song Select';
                break;
              case 1:
                action = '🌙 AFK';
                break;
              case 2:
                action = `Playing: 🎶 ${data.player_status.status.info_text}`;
                break;
              case 3:
                action = `Editing: 🔨 ${data.player_status.status.info_text}`;
                break;
              case 4:
                action = `Modding: 🔨 ${data.player_status.status.info_text}`;
                break;
              case 5:
                action = 'In Multiplayer: Song Select';
                break;
              case 6:
                action = `Watching: 👓 ${data.player_status.status.info_text}`;
                break;
              // 7 not used
              case 8:
                action = `Testing: 🎾 ${data.player_status.status.info_text}`;
                break;
              case 9:
                action = `Submitting: 🧼 ${data.player_status.status.info_text}`;
                break;
              // 10 paused, never used
              case 11:
                action = 'Idle: 🏢 In multiplayer lobby';
                break;
              case 12:
                action = `In Multiplayer: Playing 🌍 ${data.player_status.status.info_text} 🎶`;
                break;
              case 13:
                action = 'Idle: 🔍 Searching for beatmaps in osu!direct';
                break;
              default:
                action = 'Unknown: 🚔 not yet implemented!';
                break;
            }
            $('#user-status').html(action);
          }
        });
      });
    },
  };
})(jQuery, Drupal, drupalSettings);
