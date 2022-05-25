<?php

namespace Drupal\bonnie\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\HtmlCommand;

/**
 * Class BonnieForm.
 *
 * @package Drupal\Bonnie\Form
 */
class BonnieForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'bonnie_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['name'] = [
      '#title' => $this->t('Your cat’s name:'),
      '#type' => 'textfield',
      '#placeholder' => $this->t('From 2 to 32 letters'),
      '#required' => TRUE,
    ];
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => ('Add cat'),
      '#button_type' => 'primary',
      '#ajax' => [
        'callback' => '::submitForm',
      ],
      '#suffix' => '<span class="valid-message"></span>',
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $response = new AjaxResponse();
    if (!$form_state->getValue('name')
      || empty($form_state->getValue('name'))
    ) {
      $response->addCommand(new HtmlCommand('.valid-message', $this->t('Enter cat name.')));
    }
    elseif (strlen($form_state->getValue('name')) < 2) {
      $response->addCommand(new HtmlCommand('.valid-message', $this->t('Name is too short.')));
    }
    elseif (strlen($form_state->getValue('name')) > 32) {
      $response->addCommand(new HtmlCommand('.valid-message', $this->t('Name is too long.')));
    }
    else {
      $response->addCommand(new HtmlCommand('.valid-message', $this->t('Name added.')));
    }
    return $response;
  }

}
