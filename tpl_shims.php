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
 * @param string $type       Name of the class to be used from dokuwiki\Menu\Item.
 * @param bool   $ignore_exc Should we ignore any exceptions that are thrown?
 *
 * @see tpl_button
 */
function _shim_button($type, $ignore_exc = false) {
    try {
        echo (new $class())->asHtmlButton();
    } catch (Exception $e) {
        if (!$ignore_exc)
            throw $e;
    }
}
