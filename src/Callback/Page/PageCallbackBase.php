<?php


namespace SimpleForms\Callback\Page;

use SimpleForms\Callback\PartialCallbackRenderer;
use SimpleForms\TemplateManagerBase;

/**
 * Allows the callback to render other callbacks as
 * its parts
 *
 * Class PageCallbackBase
 * @package SimpleForms\Callback
 */
abstract class PageCallbackBase extends TemplateManagerBase implements PageCallbackInterface {

  const DEFAULT_PAGE_TEMPLATE_PATH = 'page/page.html.twig';

  /**
   * @var string
   */
  const CHILD_CALLBACKS_KEY = 'children';

  /**
   * Renders the callback's template
   * @throws \Exception
   */
  public function renderTemplate() {
    $template_variables = $this->getTemplateVariables();
    $template_variables[self::CHILD_CALLBACKS_KEY] = $this->processChildCallbacks($this->getChildCallbacks());
    parent::render($this->getTemplatePath(), $template_variables);
  }

  /**
   * @param array $child_callbacks
   * @return array
   * @throws \Exception
   */
  private function processChildCallbacks(array $child_callbacks) {
    if(empty($child_callbacks)) {
      return [];
    }
    $processed_child_callbacks = []; 
    foreach ($child_callbacks as $callback_class) {
      $callback = new $callback_class();
      $processed_child_callbacks[] = new PartialCallbackRenderer($callback);
    }
    return $processed_child_callbacks;
  }

}
