<?php

namespace Drupal\bancho_users\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Cache\Cache;

/**
 * Provides a block with user country.
 *
 * @Block(
 *   id = "bancho_user_country",
 *   admin_label = @Translation("User Country"),
 *   category = @Translation("Custom")
 * )
 */
class UserProfileCountryBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#theme' => 'bancho__user_country',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getCacheMaxAge() {
    return Cache::PERMANENT;
  }

}
