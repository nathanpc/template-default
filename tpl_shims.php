<?php
/**
 * Template Shimming Functions
 *
 * Shims created to ensure this template keeps working with modern versions of
 * DokuWiki.
 *
 * @author Nathan Campos <hi@nathancampos.me>
 */

// must be run from within DokuWiki
if (!defined('DOKU_INC')) die();

/**
 * Shim for replacing tpl_button().
 *
 * @warning This function performs no validation on $type and uses it to
 *          dynamically call a function.
 *
 * @param string $type       Name of the class to be used from devel:menus.
 * @param bool   $ignore_exc Should we ignore any exceptions that are thrown?
 *
 * @see tpl_button
 * @see https://www.dokuwiki.org/devel:menus
 */
function _shim_button($type, $ignore_exc = false) {
    try {
        // Get button HTML.
        $class = "dokuwiki\\Menu\\Item\\$type";
        $html = (new $class())->asHtmlButton();

        // Remove icon to ensure a consistent look with the original template.
        $svg_start = strpos($html, '<svg ');
        if ($svg_start === false)
            goto echohtml;
        $svg_end = strpos($html, '</svg>') + 6;
        $html = substr($html, 0, $svg_start) . substr($html, $svg_end);

echohtml:
        echo $html;
    } catch (Exception $e) {
        if (!$ignore_exc)
            throw $e;
    }
}
