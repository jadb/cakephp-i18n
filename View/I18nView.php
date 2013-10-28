<?php
App::uses('View', 'View');
App::uses('CakeSession', 'Model/Datasource');
/**
 * I18nView.
 *
 * @package App.View
 */
class I18nView extends View {
  /**
   * Checks if there is a custom View::$viewPath and View::$layoutPath for the
   * current locale.
   *
   * @param string $view Name of view file to use.
   * @param string $layout Layout to use.
   * @return string Rendered Element.
   * @throws CakeException if there is an error in the view.
   */
  public function render($view = null, $layout = null) {
    foreach (array('layout', 'view') as $el) {
      $var = $el . 'Path';
      $localized = $this->{$var} . DS . Configure::read('Config.language');

      if (file_exists(APP . 'View' . DS . ('layout' == $el ? 'Layouts' . DS : '') . $localized)) {
        $this->{$var} = $localized;
      }
    }

    return parent::render($view, $layout);
  }
}
