<?php

namespace Drupal\bonnie\Controller;

/**
 * Provides route responses for the bonnie module.
 */
class BonnieController {

  /**
   * Returns a page.
   *
   * @return array
   *   A renderable array.
   */
  public function content() {
    return [
      '#type' => 'html_tag',
      '#tag' => 'h1',
      '#value' => 'Hello! You can add here a photo of your cat.',
      '#attributes' => [
        'class' => ['bonnie-title'],
      ],

    ];
  }

}
