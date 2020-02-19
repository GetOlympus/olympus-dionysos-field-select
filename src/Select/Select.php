<?php

namespace GetOlympus\Field;

use GetOlympus\Zeus\Field\Field;
use GetOlympus\Zeus\Utils\Translate;

/**
 * Builds Select field.
 *
 * @package DionysosField
 * @subpackage Select
 * @author Achraf Chouk <achrafchouk@gmail.com>
 * @since 0.0.1
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
    protected function getDefaults() : array
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
    protected function getVars($value, $contents) : array
    {

        // Get contents
        $vars = $contents;

        // Update value
        $vars['value'] = !is_array($value) ? [$value] : $value;

        // Update vars
        return $vars;
    }
}
