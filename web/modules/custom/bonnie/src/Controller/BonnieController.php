<?php

namespace Drupal\Bonnie\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Controller for BonnieForm.
 */
class BonnieController extends ControllerBase {

  /**
   * Returns the add bonnie form.
   */
  public function content() {
    $form = $this->formBuilder()->getForm('Drupal\bonnie\Form\BonnieForm');
    return [
      '#theme' => 'cats_templates',
      '#title' => 'Hello! You can add here a photo of your cat.',
      $form,
    ];
  }

}
