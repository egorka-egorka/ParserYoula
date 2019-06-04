<?php
/* Smarty version 3.1.33, created on 2019-05-28 03:02:20
  from 'D:\dev\g173116\SmatryTest\templates\index.tpl.htm' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cec889ca79eb5_76482370',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8f3f7f79fffcafb6cdcdeecc9957cd6092baf0dc' => 
    array (
      0 => 'D:\\dev\\g173116\\SmatryTest\\templates\\index.tpl.htm',
      1 => 1559005329,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cec889ca79eb5_76482370 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-all.min.css">
    <title>Парсер от Барсика</title>
    <link href="favicon.ico" rel="icon" type="image/x-icon" />
    <style>
        .myCheck::before{
            border-color: #6b300b !important;
            background: #6b300b!important;
        }
    </style>
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
    <div class="row">
        <div class="cell">
            <form class="mt-20" action="#" method="post" data-role="validator">
                <div class="form-group">
                    <input type="text" data-role="input" data-search-button="true" name="search" value="<?php echo $_smarty_tpl->tpl_vars['query']->value;?>
"
                           placeholder="Поиск объявлений">
                </div>
                <label class="radio style2 transition-on">
                    <input name="r11" value="all" type="radio" data-role="radio" data-style="2" data-caption="radio" data-cls-caption="fg-cyan text-bold" data-cls-check="bd-cyan myCheck" class="" data-role-radio="true">
                    <span class="check bd-cyan myCheck"></span><span class="caption fg-cyan text-bold">все</span>
                </label>
                <label class="radio style2 transition-on">
                    <input name="r11" value="new" type="radio" data-role="radio" data-style="2" data-caption="radio" data-cls-caption="fg-cyan text-bold" data-cls-check="bd-cyan myCheck" class="" data-role-radio="true">
                    <span class="check bd-cyan myCheck"></span><span class="caption fg-cyan text-bold">новые</span>
                </label>
                <div class="form-group">
                    <div data-role="panel"
                         data-title-caption="Критерии"
                         data-collapsible="true"
                         data-cls-title="bg-darkMagenta fg-white"
                    >
                        <div class="form-group">
                            <select data-role="select" name="category" data-prepend="Категория">
                                <?php if (isset($_smarty_tpl->tpl_vars['categories']->value)) {?>
                                <option selected>Все объявления</option>
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
                                    <?php ob_start();
echo $_smarty_tpl->tpl_vars['subcategory']->value['scId'];
$_prefixVariable1 = ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['subcategory']->value['cId'];
$_prefixVariable2 = ob_get_clean();
if (isset($_smarty_tpl->tpl_vars['scId']->value) && $_smarty_tpl->tpl_vars['scId']->value == $_prefixVariable1 && isset($_smarty_tpl->tpl_vars['cId']->value) && $_smarty_tpl->tpl_vars['cId']->value == $_prefixVariable2) {?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['subcategory']->value['cId'];?>
&<?php echo $_smarty_tpl->tpl_vars['subcategory']->value['scId'];?>
" selected="selected">
                                        <?php echo $_smarty_tpl->tpl_vars['subcategory']->value['name'];?>

                                    </option>
                                    <?php } else { ?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['subcategory']->value['cId'];?>
&<?php echo $_smarty_tpl->tpl_vars['subcategory']->value['scId'];?>
"><?php echo $_smarty_tpl->tpl_vars['subcategory']->value['name'];?>
</option>
                                    <?php }?>
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
                            <input type="text" name="city" value="<?php echo $_smarty_tpl->tpl_vars['cityNAME']->value;?>
" data-role="input" data-prepend="Город" data-validate="required pattern=(^[А-Яа-я\-]+$)">
                            <span class="invalid_feedback">
                                Некорректное название города!
                            </span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row mt-10">
        <div class="cell">
            <div data-role="panel"
                 data-title-caption="Результаты поиска"
                 data-collapsible="true"
                 data-cls-title="bg-darkMagenta fg-white"
            >
                <table class="table mt-5"
                       data-role="table"
                       data-rows-steps="5, 10"
                       data-table-search-title="Поиск по показанным результатам"
                       data-table-rows-count-title="Показать по"
                       data-show-search="false"
                       data-show-rows-steps="false"
                       data-pagination-next-title = "вперёд"
                       data-pagination-prev-title = "назад"
                       data-activity-style = "blue"
                       data-table-info-title="Показано с $1 по $2 из $3 записей"
                >
                    <thead>
                    <tr>
                        <th>Информация</th>
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
                                        <b>Название:</b> <?php echo $_smarty_tpl->tpl_vars['obj']->value['title'];?>
 <br/>
                                        <b>Местоположение:</b> <?php echo $_smarty_tpl->tpl_vars['cityNAME']->value;?>
 <br/>
                                        <b>Цена ₽<span class="mif-money"></span>:</b> <?php echo $_smarty_tpl->tpl_vars['obj']->value['price'];?>
 <br/>
                                        <b>Дата размещения:</b> <?php echo $_smarty_tpl->tpl_vars['obj']->value['date'];?>
 <br/>

                                        <a href="user.php?infoUser=<?php echo $_smarty_tpl->tpl_vars['obj']->value['url'];?>
" target="_blank"><button class="button info"><span class="mif-user"></span> Информация о пользователе</button></a> <br/>
                                        <a href="https://youla.ru<?php echo $_smarty_tpl->tpl_vars['obj']->value['url'];?>
" target="_blank"><button class="button warning"><span class="mif-link"></span> Перейти к объявлению</button></a>
                                    </td>
                                    <td class="img-container thumbnail">
                                        <div>
                                            <img data-src="holder.js/10px10" src="<?php echo $_smarty_tpl->tpl_vars['obj']->value['image'];?>
">
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
