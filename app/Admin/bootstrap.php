<?php
use App\Admin\Extensions\Form\CKEditor;
use Encore\Admin\Form;
use Encore\Admin\Grid;

/**
 * Laravel-admin - admin builder based on Laravel.
 * @author z-song <https://github.com/z-song>
 *
 * Bootstraper for Admin.
 *
 * Here you can remove builtin form field:
 * Encore\Admin\Form::forget(['map', 'editor']);
 *
 * Or extend custom form field:
 * Encore\Admin\Form::extend('php', PHPEditor::class);
 *
 * Or require js and css assets:
 * Admin::css('/packages/prettydocs/css/styles.css');
 * Admin::js('/packages/prettydocs/js/main.js');
 *
 */

Form::forget(['map', 'editor']);

Grid::init(function (Grid $grid) {
    $grid->actions(function (Grid\Displayers\Actions $actions) {
        $actions->disableView();
    });
});
Form::init(function (Form $form) {
    $form->tools(function (Form\Tools $tools) {
        $tools->disableView();
    });
});
Form::extend('ckeditor', CKEditor::class);
