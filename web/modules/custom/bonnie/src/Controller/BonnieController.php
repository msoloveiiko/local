<?php

namespace Drupal\Bonnie\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Controller for BonnieForm.
 */
class BonnieController extends ControllerBase {

  /**
   * Returns a page.
   *
   * @return array
   *   A renderable array.
   */
  public function content() {
    $BonnieForm = \Drupal::formBuilder()->getForm('Drupal\bonnie\Form\BonnieForm');
    $DeleteBonnieForm = \Drupal::formBuilder()->getForm('Drupal\bonnie\Form\DeleteBonnieForm');
    $EditForm = \Drupal::formBuilder()->getForm('Drupal\bonnie\Form\EditForm');
    $block_manager = \Drupal::service('plugin.manager.block');
    $config = [];
    $bonnie_items_block = $block_manager->createInstance('bonnie_items', $config);
    return [
      '#theme' => 'bonnie_template',
      '#title' => 'Hello! You can add here a photo of your cat.',
      '#form' => $BonnieForm,
      '#bonnie' => $bonnie_items_block->build(),
      '#DeleteBonnieForm' => $DeleteBonnieForm,
      '#EditForm' => $EditForm,
    ];
  }

}
