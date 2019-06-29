<?php

namespace GetOlympus\Field;

use GetOlympus\Zeus\Field\Controller\Field;
use GetOlympus\Zeus\Translate\Controller\Translate;

/**
 * Builds Select field.
 *
 * @package Field
 * @subpackage Select
 * @author Achraf Chouk <achrafchouk@gmail.com>
 * @since 0.0.1
 *
 * @see https://olympus.readme.io/v1.0/docs/select-field
 *
 */

class Select extends Field
{
    /**
     * @var string
     */
    protected $template = 'select.html.twig';

    /**
     * @var string
     */
    protected $textdomain = 'selectfield';

    /**
     * Prepare defaults.
     *
     * @return array
     */
    protected function getDefaults()
    {
        return [
            'title' => Translate::t('select.title', $this->textdomain),
            'default' => '',
            'description' => '',
            'multiple' => false,
            'options' => [],

            // texts
            't_keyboard' => Translate::t('select.keyboard', $this->textdomain),
            't_no_options' => Translate::t('select.errors.no_options', $this->textdomain),
        ];
    }

    /**
     * Prepare variables.
     *
     * @param  object  $value
     * @param  array   $contents
     *
     * @return array
     */
    protected function getVars($value, $contents)
    {

        // Get contents
        $vars = $contents;

        // Update value
        $vars['value'] = !is_array($value) ? [$value] : $value;

        // Update vars
        return $vars;
    }
}
