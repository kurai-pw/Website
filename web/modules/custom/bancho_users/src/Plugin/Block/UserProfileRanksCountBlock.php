<?php

namespace Drupal\bancho_users\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Cache\Cache;

/**
 * Provides a block with a user ranks count (SS, A, etc. ranks).
 *
 * @Block(
 *   id = "bancho_user_ranks_count",
 *   admin_label = @Translation("User Ranks Count"),
 *   category = @Translation("Custom")
 * )
 */
class UserProfileRanksCountBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#theme' => 'bancho__user_ranks_count',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getCacheMaxAge() {
    return Cache::PERMANENT;
  }

}
