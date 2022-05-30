<?php

namespace Drupal\bonnie\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\HtmlCommand;
use Drupal\Core\Ajax\CssCommand;

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
      '#title' => $this->t('Cat name:'),
      '#type' => 'textfield',
      '#placeholder' => $this->t('From 2 to 32 letters'),
      '#required' => TRUE,
      '#suffix' => '<span class="name-valid-message"></span>',
    ];

    $form['email'] = [
      '#type' => 'email',
      '#title' => $this->t('Your email:'),
      '#placeholder' => ('user-_@company.'),
      '#required' => TRUE,
      '#ajax' => [
        'callback' => [$this, 'validateEmailAjax'],
        'event' => 'input',
        'progress' => [
          'type' => 'throbber',
          'message' => NULL,
        ],
      ],
      '#suffix' => '<span class="email-valid-message"></span>',
    ];
    $form['image'] = [
      '#type' => 'managed_file',
      '#title' => $this->t('Cat image:'),
      '#upload_validators' => [
        'file_validate_extensions' => ['png jpg jpeg'],
        'file_validate_size' => [2097152],
      ],
      '#preview_image_style' => 'medium',
      '#upload_location' => 'public://',
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
   *
   * @throws \Exception
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $response = new AjaxResponse();
    if (!$form_state->getValue('name')
      || empty($form_state->getValue('name'))
    ) {
      $response->addCommand(new HtmlCommand('.name-valid-message', $this->t('Enter cat name.')));
    }
    elseif (!$form_state->getValue('email')
      || empty($form_state->getValue('email'))
    ) {
      $response->addCommand(new HtmlCommand('.email-valid-message', $this->t('Enter email.')));
    }
    if (!$form_state->getValue('email')
      || empty($form_state->getValue('email'))
    ) {
      $response->addCommand(new HtmlCommand('.email-valid-message', $this->t('Enter email.')));
    }
    elseif (!$form_state->getValue('name')
      || empty($form_state->getValue('name'))
    ) {
      $response->addCommand(new HtmlCommand('.name-valid-message', $this->t('Enter cat name.')));
    }
    elseif (strlen($form_state->getValue('name')) < 2) {
      $response->addCommand(new HtmlCommand('.name-valid-message', $this->t('Name is too short.')));

    }
    elseif (strlen($form_state->getValue('name')) > 32) {
      $response->addCommand(new HtmlCommand('.name-valid-message', $this->t('Name is too long.')));
    }
    else {
      $response->addCommand(new HtmlCommand('.valid-message', $this->t('Name added.')));
    }
    return $response;
  }

  /**
   * Ajax callback to validate the email field.
   */
  public function validateEmailAjax(array &$form, FormStateInterface $form_state) {
    $response = new AjaxResponse();
    if (!$form_state->getValue('email')
      || empty($form_state->getValue('email'))
    ) {
      $css = ['border' => '3px solid red'];
      $response->addCommand(new CssCommand('#edit-email', $css));
      $response->addCommand(new HtmlCommand('.email-valid-message', $this->t('Enter email.')));
    }
    elseif (preg_match('/^[a-z_-]+@[a-z0-9.-]+\.[a-z]{2,4}$/', $form_state->getValue('email'))) {
      $css = ['border' => '3px solid green'];
      $response->addCommand(new CssCommand('#edit-email', $css));
      $response->addCommand(new HtmlCommand('.email-valid-message', $this->t('Enter ok.')));
    }
    else {
      $css = ['border' => '3px solid red'];
      $response->addCommand(new CssCommand('#edit-email', $css));
      $response->addCommand(new HtmlCommand('.email-valid-message', $this->t('Email not valid.')));
    }
    return $response;
  }

}
