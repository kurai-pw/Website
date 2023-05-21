/**
 * @file
 * Leaderboard.
 */

/**
 * Leaderboard.
 */
(function ($, Drupal, drupalSettings) {
  /**
   * Attaches the behavior to scrap data from API and render it.
   *
   * @type {Drupal~behavior}
   */
  Drupal.behaviors.leaderboard = {
    attach(context, settings) {
      $(once('leaderboard', 'body', context)).each(function () {
        const params = new URLSearchParams(window.location.search);
        let layout = $('#leaderboard-tbody'),
            template = $('#leaderboard-template'),
            page_param = params.get('page') ?? 1,
            mode_param = params.get('mode') ?? 'std',
            mods_param = params.get('mods') ?? 'vn',
            sort_param = params.get('sort') ?? 'pp',
            mode = 0;

        switch (mode_param + "|" + mods_param) {
          case 'std|vn': mode = 0;
          break;
          case 'taiko|vn': mode = 1;
          break;
          case 'catch|vn': mode = 2;
          break;
          case 'mania|vn': mode = 3;
          break;
          case 'std|rx': mode = 4;
          break;
          case 'taiko|rx': mode = 5;
          break;
          case 'catch|rx': mode = 6;
          break;
          case 'std|ap': mode = 8;
          break;
          default: mode = -1;
          break;
        }

        function renderElement(data, index) {
          let player = template.clone();

          player.children('.leaderboard-column-player-rank')
            .html(`#${(50 * (page_param - 1)) + index + 1}`);
          player.children('.leaderboard-column-player-rank')
            .html(`#${(50 * (page_param - 1)) + index + 1}`);
          player.children('.leaderboard-column-player-name').children('a.player-name')
            .html(data.clan_tag ? `[${data.clan_tag}] ${data.name}` : data.name)
            .attr('href', `/user/${data.player_id}`);
          player.children('.leaderboard-column-player-name').children('.player-flag')
            .css({
              'background-image': `url("/themes/custom/bancho/build/assets/images/${data.country.toUpperCase()}.png")`
            });
          player.children('.leaderboard-column-pp')
            .html(`${data.pp}pp`);
          player.children('.leaderboard-column-accuracy')
            .html(`${data.acc.toFixed(2)}%`);
          player.children('.leaderboard-column-playcount')
            .html(data.plays);
          player.removeAttr('id');

          layout.append(player);
        }

        $.ajax({
          // @TODO HARDCODED DOMAIN!!!!!!!
          url: 'https://api.kurai.pw/v1/get_leaderboard',
          method: 'GET',
          dataType: 'json',
          data: {
            'mode': mode,
            'sort': sort_param,
            'offset':  (parseInt(page_param) - 1) * 50,
            'limit': 50,
          },
          success: function(data){
            data = data.leaderboard;
            data.forEach(renderElement);
            template.remove();
          }
        });

        // $('.leaderboard-column-playcount').click(function () {
        //   alert('dfdsfds');
        // });
      });
    },
  };
})(jQuery, Drupal, drupalSettings);
