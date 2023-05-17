<?php

namespace Drupal\bancho_users\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Cache\Cache;

/**
 * Provides a user stats block with Ranked Score, etc.
 *
 * @Block(
 *   id = "bancho_user_stats",
 *   admin_label = @Translation("User Statistics"),
 *   category = @Translation("Custom")
 * )
 */
class UserProfileStatsBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#theme' => 'bancho__user_stats',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getCacheMaxAge() {
    return Cache::PERMANENT;
  }

}
