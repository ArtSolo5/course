<?php


namespace Engine\Core;


class View
{
    public function render($template, $vars = [])
    {
        $templatePath = $this->getTemplatePath($template);

        if (!file_exists($templatePath)) {
            throw new \InvalidArgumentException(sprintf('Template "%s" not found in "%s"', $template, $templatePath));
        }

        if (count($vars)) {
            extract($vars);
        }

        ob_start();
        ob_implicit_flush(0);

        try {
            require $templatePath;
        } catch (\Exception $e) {
            ob_end_clean();
            throw $e;
        }

        echo ob_get_clean();
    }

    private function getTemplatePath($template)
    {
        if (ENV == 'Content') {
            return ROOT_DIR . '/content/View/Template/' . $template . '.php';
        }

        return ROOT_DIR . '/View/Template/' . $template . '.php';
    }
}
