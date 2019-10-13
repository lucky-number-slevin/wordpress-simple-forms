<?php


namespace SimpleForms\Callback;


use SimpleForms\Callback\Form\FormCallback;
use SimpleForms\TemplateManagerBase;


/**
 * Class CallbackBase
 * @package SimpleForms\Callback
 */
abstract class CallbackBase extends TemplateManagerBase implements CallbackInterface {

  /**
   * @var string
   */
  const CONTEXT_KEY = 'children';

  /**
   * @var array
   */
  private $parameters;

  /**
   * CallbackBase constructor.
   * @param array $parameters
   */
  public function __construct($parameters = []) {
    parent::__construct();
    $this->parameters = $parameters;

//    if($this instanceof FormCallback) {
//      var_dump($parameters);
//    }

  }

  /**
   * Renders the callback's template
   */
  public function renderTemplate() {
    parent::render($this->getTemplatePath(), $this->getTemplateContext());
  }

  /**
   * Returns child callbacks and parameters. Both of these can
   * be empty, in which case template will not render anything.
   *
   * @return array
   */
  protected function getTemplateContext() {
    $param_keys = array_keys($this->parameters);
    $params_diff = array_diff($param_keys, array_merge(['callbacks'], $this->getCallbackParameterKeys() ?? []));
    foreach ($params_diff as $key) {
      if (in_array($key, $param_keys)) {
        unset($this->parameters[$key]);
      }
    }

    $parameter_callbacks = $this->processChildCallbacksFromParameters();

//    if($this instanceof FormCallback) {
//      var_dump($parameter_callbacks);
//    }

    $callbacks = array_merge($this->processChildCallbacks(), $parameter_callbacks);

    return array_merge($this->parameters, [self::CONTEXT_KEY => $callbacks]);
  }

  /**
   * Wraps child callback object with a class that allows for
   * those callbacks to be rendered inside a twig template.
   * For example, if we loop through callback array (children)
   * inside a twig template, we could render every 'child' by
   * calling wrapper render function
   * Example of rendering a child callback inside a twig template:
   * child.[render_function_name_defined_in_wrapper_class]
   *
   * @return array
   */
  private function processChildCallbacks() {

    $callback_classes = $this->getChildCallbacks();
    if (empty($callback_classes)) {
      return [];
    }

    $processed_callbacks = [];
    foreach ($callback_classes as $callback_class => $parameters) {
      $processed_callbacks[] = new ChildCallbackRenderer(new $callback_class($parameters));
    }

    return $processed_callbacks;
  }

  /**
   * Returns callbacks passed as parameters to parent callback
   * class
   *
   * @return array
   */
  private function processChildCallbacksFromParameters() {
    if (empty($this->parameters['callbacks'])) {
      return [];
    }
    $callbacks = $this->parameters['callbacks'];
    $valid_callbacks = [];
    if (is_array($callbacks)) {
      foreach ($callbacks as $callback_class => $callback_parameters) {
        if ($callback_class instanceof CallbackBase) {
          $valid_callbacks[$callbacks] = $callback_parameters;
        }
      }
      return $valid_callbacks;
    }
    return [];
  }

}
