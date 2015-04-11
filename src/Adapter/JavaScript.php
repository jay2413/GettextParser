<?php
namespace GettextParser\Adapter;

use GettextParser\Pattern;

/**
 * Adapter for JavaScript files processing
 *
 * @package GettextParser\Adapter
 */
class JavaScript extends AbstractAdapter
{
    protected function addPatterns()
    {
        //search for non-plural calls: _('Text'), _("Text"), _( 'Text' )
        $this->patterns[] = new Pattern("~[^n]+_\([\s]*[\'\"]{1}(.*)[\'\"]{1}[\s]*\)~Uu");
        $this->patterns[] = new Pattern("~^_\([\s]*[\'\"]{1}(.*)[\'\"]{1}[\s]*\)~Uu");

        //search for plural calls: n_( 'country', 'countries', 3 );
        $this->patterns[] = new Pattern(
            "~n_\([\s]*[\'\"]{1}(.*)[\'\"]{1}[\s]*,[\s]*[\'\"]{1}(.*)[\'\"]{1}[\s]*,[\s]*(.*)[\s]*\)~Uu",
            true
        );

        //search for plural calls: n_( 'день', 'дней', 3 );
        $this->patterns[] = new Pattern(
            "~n_\([\s]*[\'\"]{1}(.*)[\'\"]{1}[\s]*,[\s]*[\'\"]{1}(.*)[\'\"]{1}[\s]*,[\s]*[\'\"]{1}(.*)[\'\"]{1}[\s]*,[\s]*(.*)[\s]*\)~Uu",
            true
        );
    }
}