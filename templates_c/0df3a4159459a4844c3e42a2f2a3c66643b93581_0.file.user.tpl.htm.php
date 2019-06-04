<?php
/* Smarty version 3.1.33, created on 2019-05-28 02:25:21
  from 'D:\dev\g173116\SmatryTest\templates\user.tpl.htm' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cec7ff115ca38_50737182',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0df3a4159459a4844c3e42a2f2a3c66643b93581' => 
    array (
      0 => 'D:\\dev\\g173116\\SmatryTest\\templates\\user.tpl.htm',
      1 => 1559003116,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cec7ff115ca38_50737182 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-all.min.css">
    <link href="metro-icons.css" rel="stylesheet">
    <title>Парсер от Барсика - Информация о пользователе</title>
    <link href="favicon.ico" rel="icon" type="image/x-icon" />
</head>
<body>
<div class="container-fluid">
    <header class="app-bar bg-darkMagenta fg-white app-bar-expand row" data-role="appbar" data-expand-point="md"
            id="app-bar-1558398757257504" data-role-appbar="true">
        <div class="cell">
            <a href="index.php" class="brand fg-white no-hover">Парсер от Барсика</a>
        </div>
        <div class="cell offset-8 text-right">
            <img src="badger.png" height="50px" alt="">
        </div>
    </header>
    <div class="row text-center">
        <div class="cell-4 offset-4">
            <div class="card mt-20">
                <div class="card-header">
                    <div class="name"><?php echo $_smarty_tpl->tpl_vars['infoUser']->value['userNAME'];?>
</div>
                    <div class="date">
                    </div>
                </div>
                <div class="card-content p-2">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['infoUser']->value['userURL'];?>
" width="200px">
                </div>
                <div class="card-footer">
                    <div class="cell">
                        <a href="tel:+<?php echo $_smarty_tpl->tpl_vars['infoUser']->value['userPHONE'];?>
">
                            <button class="button success"><span class="mif-phone"></span> +<?php echo $_smarty_tpl->tpl_vars['infoUser']->value['userPHONE'];?>

                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.3.1.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://cdn.metroui.org.ua/v4/js/metro.min.js"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
