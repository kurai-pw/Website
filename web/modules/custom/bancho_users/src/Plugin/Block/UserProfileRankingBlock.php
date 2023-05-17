<?php

namespace Drupal\bancho_users\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Cache\Cache;

/**
 * Provides a block with global and country rank.
 *
 * @Block(
 *   id = "bancho_user_ranking",
 *   admin_label = @Translation("User Ranking"),
 *   category = @Translation("Custom")
 * )
 */
class UserProfileRankingBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#theme' => 'bancho__user_ranking',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getCacheMaxAge() {
    return Cache::PERMANENT;
  }

}
