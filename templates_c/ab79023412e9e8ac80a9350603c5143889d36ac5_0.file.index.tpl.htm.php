<?php
/* Smarty version 3.1.33, created on 2019-05-24 21:09:41
  from 'D:\dev\g173116\SmartyTest\templates\index.tpl.htm' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ce8417579f2d6_08787512',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ab79023412e9e8ac80a9350603c5143889d36ac5' => 
    array (
      0 => 'D:\\dev\\g173116\\SmartyTest\\templates\\index.tpl.htm',
      1 => 1558724874,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ce8417579f2d6_08787512 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-all.min.css">
    <title>ParserYoula</title>
</head>
<body>
<div class="container-fluid">
    <header class="app-bar bg-darkMagenta fg-white app-bar-expand" data-role="appbar" data-expand-point="md" id="app-bar-1558398757257504" data-role-appbar="true">
        <a href="index.php" class="brand fg-white no-hover">Парсер от Барсика</a>
    </header>
    <form class="mt-20" action="#" method="post">
        <div class="form-group">
            <label>Категории</label>
            <select data-role="select" name="category">
                <?php if (isset($_smarty_tpl->tpl_vars['categories']->value)) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category', false, 'key', 'categories', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['category']->value) {
?>
                        <optgroup label="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['category']->value, 'subcategory', false, NULL, 'subcategories', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['subcategory']->value) {
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['subcategory']->value['cId'];?>
&<?php echo $_smarty_tpl->tpl_vars['subcategory']->value['scId'];?>
"><?php echo $_smarty_tpl->tpl_vars['subcategory']->value['name'];?>
</option>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </optgroup>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <?php }?>
            </select>
        </div>
        <div class="form-group">
            <input type="text" data-role="input" data-search-button="true" name="search" value="<?php echo $_smarty_tpl->tpl_vars['query']->value;?>
">
        </div>
    </form>
    <table class="table mt-10"
           data-role="table"
           data-rows-steps="5, 10"
    >
        <thead>
        <tr>
            <th>Описание</th>
            <th>Объявление</th>
        </tr>
        </thead>
        <tbody>
        <?php if (isset($_smarty_tpl->tpl_vars['table']->value)) {?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['table']->value, 'obj', false, NULL, 'outer', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['obj']->value) {
?>
        <tr>
            <td>
                Название: <?php echo $_smarty_tpl->tpl_vars['obj']->value['title'];?>
 <br/>
                Местоположение: <?php echo $_smarty_tpl->tpl_vars['obj']->value['location'];?>
 <br/>
                Цена: <?php echo $_smarty_tpl->tpl_vars['obj']->value['price'];?>
 <br/>
                Дата размещения: <?php echo $_smarty_tpl->tpl_vars['obj']->value['date'];?>
 <br/>
                URL: <a href="https://youla.ru<?php echo $_smarty_tpl->tpl_vars['obj']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['obj']->value['url'];?>
</a> <br/>
                Информация о пользователе: <a href=""></a>
            </td>
            <td class="img-container thumbnail">
                <div>
                    <img data-src="holder.js/10px10" src="<?php echo $_smarty_tpl->tpl_vars['obj']->value['image'];?>
">
                    <div style="width: 280px; text-align:center; overflow: hidden; text-overflow: ellipsis;" class="title">
                        <a href="https://youla.ru<?php echo $_smarty_tpl->tpl_vars['obj']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['obj']->value['title'];?>
</a>
                    </div>
                </div>
            </td>
        </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <?php }?>
        </tbody>
    </table>
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
