<?php

namespace Drupal\bancho_leaderboard\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for Bancho leaderboard routes.
 */
class BanchoLeaderboardController extends ControllerBase {

  /**
   * Builds the leaderboard.
   */
  public function build() {
    return [
      '#theme' => 'bancho_leaderboard__leaderboard',
      '#attached' => [
        'library' => ['bancho_leaderboard/leaderboard'],
      ],
    ];
  }

}
