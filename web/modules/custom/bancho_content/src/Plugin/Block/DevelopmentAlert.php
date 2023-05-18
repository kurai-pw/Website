<?php

namespace Drupal\bancho_content\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Cache\Cache;

/**
 * Provides a block with development alert.
 *
 * @Block(
 *   id = "bancho_content_development_alert",
 *   admin_label = @Translation("Development Alert"),
 *   category = @Translation("Custom")
 * )
 */
class DevelopmentAlert extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#theme' => 'bancho__content_development_alert',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getCacheMaxAge() {
    return Cache::PERMANENT;
  }

}
