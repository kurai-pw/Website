<?php

namespace Drupal\bancho_users\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a user info block, contains PP and play time data.
 *
 * @Block(
 *   id = "bancho_user_information",
 *   admin_label = @Translation("User Info"),
 *   category = @Translation("Custom")
 * )
 */
class UserProfileInfoBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [

    ];
  }

}
