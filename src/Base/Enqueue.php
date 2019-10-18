<?php


namespace SimpleForms\Base;


use Exception;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use ReflectionException;
use SimpleForms\Enum\EnqueueType;
use SimpleForms\PluginBase;


/**
 * Class Enqueue
 * @package SimpleForms\Base
 */
class Enqueue extends PluginBase {

  const ASSETS_ROOT_DIRECTORY = 'assets';

  const SCRIPTS_DIRECTORY = 'js';

  const STYLE_DIRECTORY = 'style';

  public function register() {
    add_action('admin_enqueue_scripts', [$this, 'enqueue']);
  }

  /**
   * Registers all script and style files
   * @throws ReflectionException
   */
  function enqueue() {
    $this->registerScriptFiles();
    $this->registerStyleFiles();
  }

  /**
   * Registers all .js files in the script's directory,
   * regardless of their exact location as long as they are
   * not outside of script's directory
   * @throws ReflectionException
   */
  private function registerScriptFiles() {
    $scripts_dir_rel_path = self::ASSETS_ROOT_DIRECTORY . '/' . self::SCRIPTS_DIRECTORY;
    $scripts_dir_abs_path = $this->getPluginPath() . $scripts_dir_rel_path;

    $directory_iterator = new RecursiveDirectoryIterator($scripts_dir_abs_path, RecursiveDirectoryIterator::KEY_AS_PATHNAME);
    foreach (new RecursiveIteratorIterator($directory_iterator, RecursiveIteratorIterator::SELF_FIRST) as $file) {
      if (!$file->isFile() || $file->getExtension() !== 'js') {
        continue;
      }
      $script_name = $this->getEnqueueName($file, 'sp_script');
      $script_path = $this->getEnqueuePath(EnqueueType::SCRIPT, $file->getRealPath());
      var_dump(['NAME' => $script_name, 'PATH' => $script_path]); // TODO: DELETE
      wp_enqueue_script($script_name, $script_path, ['jquery']);
    }
  }

  /**
   * Registers all .css files in the style's directory,
   * regardless of their exact location as long as they are
   * not outside of style's directory
   * @throws ReflectionException
   */
  private function registerStyleFiles() {
    $styles_dir_rel_path = self::ASSETS_ROOT_DIRECTORY . '/' . self::STYLE_DIRECTORY;
    $styles_dir_abs_path = $this->getPluginPath() . $styles_dir_rel_path;

    $directory_iterator = new RecursiveDirectoryIterator($styles_dir_abs_path, RecursiveDirectoryIterator::KEY_AS_PATHNAME);
    foreach (new RecursiveIteratorIterator($directory_iterator, RecursiveIteratorIterator::SELF_FIRST) as $file) {
      if (!$file->isFile() || $file->getExtension() !== 'css') {
        continue;
      }
      $style_name = $this->getEnqueueName($file, 'sp_style');
      $style_path = $this->getEnqueuePath(EnqueueType::STYLE, $file->getRealPath());
      var_dump(['NAME' => $style_name, 'PATH' => $style_path]); // TODO: DELETE
      wp_enqueue_style($style_name, $style_path);
    }
  }

  /**
   * @param object $file
   * @param string $prefix
   * @return string
   */
  private function getEnqueueName(object $file, string $prefix = '') {
    // Remove file extension from file name
    $file_name = str_replace('.' . $file->getExtension(), '', $file->getFilename());
    // Transform file name from CamelCase to snake_case
    $enqueue_name = ltrim(strtolower(preg_replace('/[A-Z]([A-Z](?![a-z]))*/', '_$0', $file_name)), '_');
    return 'sf_' . $prefix . '_' . $enqueue_name;
  }

  /**
   * @param string $enqueue_type
   * @param $file_abs_path
   * @return mixed
   * @throws ReflectionException
   * @throws Exception
   */
  private function getEnqueuePath(string $enqueue_type, $file_abs_path) {
    if (!EnqueueType::isValid($enqueue_type)) {
      throw new Exception("Invalid enqueue type '$enqueue_type'.");
    }

    $dir_rel_path = NULL;
    switch ($enqueue_type) {
      case EnqueueType::SCRIPT:
        $dir_rel_path = self::ASSETS_ROOT_DIRECTORY . '/' . self::SCRIPTS_DIRECTORY;
        break;
      case EnqueueType::STYLE:
        $dir_rel_path = self::ASSETS_ROOT_DIRECTORY . '/' . self::STYLE_DIRECTORY;
        break;
      default:
        throw new Exception("Missing case implementation in " . __FUNCTION__ . "  for enqueue type '$enqueue_type' .");
    }
    $dir_abs_path = $this->getPluginPath() . $dir_rel_path;
    $dir_url_path = $this->getPluginUrl() . $dir_rel_path;

    return str_replace($dir_abs_path, $dir_url_path, $file_abs_path);
  }

}
