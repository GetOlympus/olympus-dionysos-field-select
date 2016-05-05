<?php

namespace GetOlympus\Field;

use GetOlympus\Hera\Field\Controller\Field;
use GetOlympus\Hera\Translate\Controller\Translate;

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
    protected $faIcon = 'fa-list';

    /**
     * @var string
     */
    protected $template = 'select.html.twig';

    /**
     * Prepare HTML component.
     *
     * @param array $content
     * @param array $details
     *
     * @since 0.0.1
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

            // details
            'post' => 0,
            'prefix' => '',
            'template' => 'pages',

            // texts
            't_no_options' => Translate::t('select.no_options', [], 'selectfield'),
        ];

        // Build defaults data
        $vars = array_merge($defaults, $content);

        // Retrieve field value
        $vars['val'] = $this->getValue($details, $vars['default'], $content['id']);

        // Update vars
        $this->getField()->setVars($vars);
    }
}
