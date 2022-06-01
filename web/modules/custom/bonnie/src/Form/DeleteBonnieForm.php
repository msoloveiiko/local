<?php

namespace Drupal\bonnie\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class DeleteBonnieForm.
 *
 * @package Drupal\Bonnie\Form
 */
class DeleteBonnieForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'delete_bonnie_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['#attributes']['class'][] = 'form-delete';

    $form['title'] = [
      '#type' => 'html_tag',
      '#tag' => 'h2',
      '#value' => $this->t('Do you want delete cat?'),
    ];
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('DELETE'),
      '#attributes' => [
        'class' => [
          'form-submit-delete',
        ],
      ],
    ];
    $form['cancel'] = [
      '#type' => 'button',
      '#value' => $this->t('CANCEL'),
      '#attributes' => [
        'class' => [
          'form-cancel',
        ],
      ],
    ];
    $form['id-item'] = [
      '#type' => 'hidden',
      '#attributes' => [
        'class' => [
          'form-id-item',
        ],
      ],
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $query = \Drupal::database()->delete('bonnie');
    $idValue = $form_state->getValue('id-item');
    $query->condition('id', $idValue);
    $query->execute();
    \Drupal::messenger()->addStatus($this->t('Cat deleted.'));
  }

}
