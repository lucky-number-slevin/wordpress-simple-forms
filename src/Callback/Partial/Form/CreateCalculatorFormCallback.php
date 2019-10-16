<?php


namespace SimpleForms\Callback\Partial\Form;


use SimpleForms\Enum\FormFieldType;


/**
 * Class CreateCalculatorFormCallback
 * @package SimpleForms\Callback\Partial
 */
class CreateCalculatorFormCallback extends FormCallbackBase {

  /**
   * @inheritDoc
   */
  public function getTemplatePath() {
    return static::FORM_TEMPLATES_DIRECTORY . '/create-form.html.twig';
  }

  /**
   * @inheritDoc
   */
  public function getTemplateVariables() {

    $form_fields['form_name'] = [
      'id' => 'calculator-form-name',
      'type' => FormFieldType::TEXT_INPUT,
      'label' => 'Form name:',
    ];

    $form_fields['calculator_name_1'] = [
      'id' => 'calculator-name-1',
      'type' => FormFieldType::TEXT_INPUT,
      'label' => 'Form result calculator name:',
      'classes' => [
        'sf-calculator-name'
      ]
    ];

    $form_fields['calculator_name_2'] = [
      'id' => 'calculator-name-2',
      'type' => FormFieldType::TEXT_INPUT,
      'label' => 'Second form result calculator name:',
      'classes' => [
        'sf-calculator-name'
      ],
      'style' => [
        'display' => 'none'
      ]
    ];

    $form_fields['calculator_name_3'] = [
      'id' => 'calculator-name-3',
      'type' => FormFieldType::TEXT_INPUT,
      'label' => 'Third form result calculator name:',
      'classes' => [
        'sf-calculator-name'
      ],
      'style' => [
        'display' => 'none'
      ]
    ];

    $form_fields['submit'] = [
      'id' => 'sf-create-calculator-form-submit',
      'type' => FormFieldType::SUBMIT,
      'label' => 'Create Form'
    ];

    return [
      'id' => 'sf-create-calculator-form',
      'title' => 'Create a Calculator Form',
      'action' => '/create-calculator-form',
      self::FORM_FIELDS_KEY => $form_fields
    ];
  }

}
