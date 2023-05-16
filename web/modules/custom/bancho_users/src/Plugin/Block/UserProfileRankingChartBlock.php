<?php

namespace Drupal\bancho_users\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a user ranking chart block.
 *
 * @Block(
 *   id = "bancho_user_ranking_chart",
 *   admin_label = @Translation("User Ranking Chart"),
 *   category = @Translation("Custom")
 * )
 */
class UserProfileRankingChartBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [

    ];
  }

}
