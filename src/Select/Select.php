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
     * Prepare variables.
     */
    protected function setVars()
    {
        $this->getModel()->setFaIcon('fa-list');
        $this->getModel()->setStyle('css'.S.'select.css');
        $this->getModel()->setTemplate('select.html.twig');
    }

    /**
     * Prepare HTML component.
     *
     * @param array $content
     * @param array $details
     */
    protected function getVars($content, $details = [])
    {
        // Build defaults
        $defaults = [
            'id' => '',
            'title' => Translate::t('select.title', [], 'selectfield'),
            'default' => '',
            'description' => '',
            'options' => [],

            // texts
            't_no_options' => Translate::t('select.no_options', [], 'selectfield'),
        ];

        // Build defaults data
        $vars = array_merge($defaults, $content);

        // Retrieve field value
        $vars['val'] = $this->getValue($content['id'], $details, $vars['default']);

        // Update vars
        $this->getModel()->setVars($vars);
    }
}
