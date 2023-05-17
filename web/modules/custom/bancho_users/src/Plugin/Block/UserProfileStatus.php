<?php

namespace Drupal\bancho_users\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Cache\Cache;

/**
 * Provides a block with current user status.
 *
 * @Block(
 *   id = "bancho_user_status",
 *   admin_label = @Translation("User Status"),
 *   category = @Translation("Custom")
 * )
 */
class UserProfileStatus extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#theme' => 'bancho__user_status',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getCacheMaxAge() {
    return Cache::PERMANENT;
  }

}
