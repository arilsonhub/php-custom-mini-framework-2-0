<?php /* Smarty version Smarty-3.1.1, created on 2016-05-21 15:39:38
         compiled from "include\twitter.php" */ ?>
<?php /*%%SmartyHeaderCode:297975740651ac716e8-83756517%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4378dde83940d3987427f0a5fe5750d314349b7e' => 
    array (
      0 => 'include\\twitter.php',
      1 => 1345600178,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '297975740651ac716e8-83756517',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_5740651ac82bf',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5740651ac82bf')) {function content_5740651ac82bf($_smarty_tpl) {?><script charset="utf-8" src="http://widgets.twimg.com/j/2/widget.js"></script>
<script>
new TWTR.Widget({
  version: 2,
  type: 'profile',
  rpp: 2,
  interval: 30000,
  width: 239,
  height: 203,
  theme: {
    shell: {
      background: '#d6d6d6',
      color: '#000000'
    },
    tweets: {
      background: '#ebebeb',
      color: '#000000',
      links: '#ff0000'
    }
  },
  features: {
    scrollbar: false,
    loop: false,
    live: false,
    behavior: 'all'
  }
}).render().setUser('@escolasnewpoint').start();
</script><?php }} ?>