<?php

namespace Drupal\bancho_users\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Cache\Cache;

/**
 * Provides a block with a mode switch button and other things.
 *
 * @Block(
 *   id = "bancho_user_header",
 *   admin_label = @Translation("User Header"),
 *   category = @Translation("Custom")
 * )
 */
class UserHeaderBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#theme' => 'bancho__header',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getCacheMaxAge() {
    return Cache::PERMANENT;
  }

}
