<?php

namespace Drupal\bancho_content\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a copyright block.
 *
 * @Block(
 *   id = "bancho_support_us",
 *   admin_label = @Translation("Support Us"),
 *   category = @Translation("Custom")
 * )
 */
class SupportUs extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      'theme' => '',
    ];
  }

}
