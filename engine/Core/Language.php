<?php


namespace Engine\Core;


class Language
{
    /**
     * Mask for language files
     */
    const FILE_MASK_LANGUAGE    = 'Language/%s/%s.ini';

    /**
     * @param string $template
     * @return array|false
     * @throws \Exception
     */
    public function load(string $template)
    {
        $file = sprintf(
            self::FILE_MASK_LANGUAGE,
            'english', $template
        );

        if (file_exists($file)) {
            return parse_ini_file($file, true);
        } else {
            throw new \Exception(
                sprintf("'%s' language file does not exist", $file)
            );
        }
    }
}