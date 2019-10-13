<?php


namespace SimpleForms\Callback\Admin;


use SimpleForms\Callback\CallbackBase;
use SimpleForms\Callback\Form\FormCallback;
use SimpleForms\Callback\Form\SelectFieldCallback;
use SimpleForms\Callback\Title\TitleCallback;
use SimpleForms\Enum\FormType;
use SimpleForms\Enum\QuestionType;


/**
 * Class AddFormPageCallback
 * @package SimpleForms\Callback\Admin
 */
class AddFormPageCallback extends CallbackBase {

  /**
   * @inheritDoc
   */
  public function getTemplatePath() {
    return 'page.html.twig';
  }


  /**
   * @inheritDoc
   */
  public function getCallbackParameterKeys() {
    return [];
  }

  /**
   * Returns all the callbacks classes with their parameters
   * in order in which you want them to be rendered
   *
   * @return array
   */
  public function getChildCallbacks() {
    return [
      TitleCallback::class => [
        'title' => 'Add Form'
      ],
      FormCallback::class => [
        'action' => '/not-so-valid-action',
        'submit' => 'Submit',
        'callbacks' => [
          SelectFieldCallback::class => [
            'label' => 'Chose a Question Type:',
            'options' => [
              1 => QuestionType::TEXT_INPUT,
              2 => QuestionType::RADIO_BUTTON,
              3 => QuestionType::CHECKBOX
            ]
          ]
        ]
      ]
    ];
  }

}
