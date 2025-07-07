<?php
/**
 * DokuWiki Origin Resurrected Template
 *
 * This was originally the default template for dokuwiki called "default"
 * but later in 2012 that changed to a different template called "dokuwiki"
 * I (desbest) have volunteered to maintain this to make it compatible with
 * newer dokuwiki versions, as I have a use for this template for me to add
 * modifications to it for my website.
 *
 * @link   http://dokuwiki.org/templates
 * @author Andreas Gohr <andi@splitbrain.org>
 * @author desbest <afaninthehouse@gmail.com>
 * @author Nathan Campos <hi@nathancampos.me>
 */

// must be run from within DokuWiki
if (!defined('DOKU_INC')) die();

// include hook for template shimming functions
@require_once(dirname(__FILE__).'/tpl_shims.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $conf['lang']?>"
 lang="<?php echo $conf['lang']?>" dir="<?php echo $lang['direction']?>">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>
    <?php tpl_pagetitle()?>
    [<?php echo strip_tags($conf['title'])?>]
  </title>

  <?php tpl_metaheaders()?>
  <?php echo tpl_favicon(array('favicon', 'mobile')) ?>

  <?php /*old includehook*/ @include(dirname(__FILE__).'/meta.html')?>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<?php /*old includehook*/ @include(dirname(__FILE__).'/topheader.html')?>
<div class="dokuwiki">
  <?php html_msgarea()?>

  <div class="stylehead">

    <div class="header">
      <div class="pagename">
        <!-- [[ -->
        <?php tpl_link(wl($ID,'do=backlink'),tpl_pagetitle($ID,true),'title="'.$lang['btn_backlink'].'"')?>
        <!-- ]] -->
      </div>
      <div class="logo">
        <?php tpl_link(wl(),$conf['title'],'name="dokuwiki__top" id="dokuwiki__top" accesskey="h" title="[H]"')?>
      </div>

      <div class="clearer"></div>
    </div>

    <?php /*old includehook*/ @include(dirname(__FILE__).'/header.html')?>

    <div class="bar" id="bar__top">
      <div class="bar-left" id="bar__topleft">
        <?php _shim_button('Edit')?>
        <?php _shim_button('Revisions')?>
      </div>

      <div class="bar-right" id="bar__topright">
        <?php _shim_button('Recent')?>
        <?php tpl_searchform()?>&#160;
      </div>

      <div class="clearer"></div>
    </div>

    <?php if($conf['breadcrumbs']){?>
    <div class="breadcrumbs">
      <?php tpl_breadcrumbs()?>
      <?php //tpl_youarehere() //(some people prefer this)?>
    </div>
    <?php }?>

    <?php if($conf['youarehere']){?>
    <div class="breadcrumbs">
      <?php tpl_youarehere() ?>
    </div>
    <?php }?>

  </div>
  <?php tpl_flush()?>

  <?php /*old includehook*/ @include(dirname(__FILE__).'/pageheader.html')?>

  <div class="page">
    <!-- wikipage start -->
    <?php tpl_content()?>
    <!-- wikipage stop -->
  </div>

  <div class="clearer"></div>

  <?php tpl_flush()?>

  <div class="stylefoot">

    <div class="meta">
      <div class="user">
        <?php tpl_userinfo()?>
      </div>
      <div class="doc">
        <?php tpl_pageinfo()?>
      </div>
    </div>

   <?php /*old includehook*/ @include(dirname(__FILE__).'/pagefooter.html')?>

    <div class="bar" id="bar__bottom">
      <div class="bar-left" id="bar__bottomleft">
        <?php _shim_button('Edit')?>
        <?php _shim_button('Revisions')?>
        <?php _shim_button('Revert', true)?>
      </div>
      <div class="bar-right" id="bar__bottomright">
        <?php _shim_button('Subscribe', true)?>
        <?php _shim_button('Media')?>
        <?php _shim_button('Admin')?>
        <?php _shim_button('Profile')?>
        <?php _shim_button('Login')?>
        <?php _shim_button('Index')?>
        <?php _shim_button('Top')?>&#160;
      </div>
    </div>

  <div class="clearer"></div><?php tpl_flush()?> <!-- desbest edit -->

  </div>

  <?php tpl_license(false);?>

</div>
<?php /*old includehook*/ @include(dirname(__FILE__).'/footer.html')?>

<div class="no"><?php /* provide DokuWiki housekeeping, required in all templates */ tpl_indexerWebBug()?></div>
</body>
</html>
