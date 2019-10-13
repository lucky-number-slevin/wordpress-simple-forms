<?php


namespace SimpleForms;


use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;


class TemplateManagerBase {

  const TEMPLATES_DIR = 'templates';
  /**
   * @var string
   */
  private $templateDir;
  /**
   * @var Environment
   */
  protected $twig;

  public function __construct() {
    $this->templateDir = (new PluginBase())->getPluginPath() . self::TEMPLATES_DIR;
    $this->twig = new Environment(new FilesystemLoader($this->templateDir));
  }

  public function render($template_path, $variables = []) {
    try {
      echo $this->twig->render($template_path, $variables);
    } catch (LoaderError | RuntimeError | SyntaxError $error) {
      if (WP_DEBUG) {
        echo $error;
      }
    }
  }

}
