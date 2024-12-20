<?php

namespace App\Admin\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PostController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'پست';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Post());

        $grid->column('id', __('Id'));
        $grid->column('post_category_id', 'دسته بندی پست')->display(function () {
            return $this->post_category->name;
        });
        $grid->column('title', __('Title'));
        $grid->column('status', __('Status'));
        $grid->column('slug', __('Slug'));
        $grid->column('summary', __('Summary'));
        $grid->column('body', __('Body'));
        $grid->column('meta_title', __('Meta title'));
        $grid->column('meta_description', __('Meta description'));
//        $grid->column('created_at', __('Created at'));
//        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $post = Post::findOrFail($id);
        $show = new Show($post);

        $show->field('id', __('Id'));
        $show->field('post_category_id', __('Post category id'));
        $show->field('title', __('Title'));
        $show->field('status', __('Status'));
        $show->field('slug', __('Slug'));
        $show->field('summary', __('Summary'));
        $show->field('body', __('Body'));
        $show->field('meta_title', __('Meta title'));
        $show->field('meta_description', __('Meta description'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('image', 'تصویر')->image();

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Post());


//        $form->number('post_category_id', __('Post category id'));
        $form->select('post_category_id', 'دسته بندی پست')->options(PostCategory::all()->pluck('name','id'))->required();
        $form->text('title', __('Title'))->rules(['required'])->placeholder('لطفا عنوان را وارد کنید')->autofocus();
        $form->switch('status', __('Status'))->placeholder('لطفا وضعیت را وارد کنید');
        $form->text('slug', __('Slug'));
        $form->textarea('summary', __('Summary'));
        $form->textarea('body', __('Body'));
        $form->text('meta_title', __('Meta title'));
        $form->textarea('meta_description', __('Meta description'));
        $form->image('image', 'تصویر')->move('posts');


        $form->tools(function (Form\Tools $tools) {

            // Disable `List` btn.
            $tools->disableList();

            // Disable `Delete` btn.
            $tools->disableDelete();

            // Disable `Veiw` btn.
            $tools->disableView();

            // Add a button, the argument can be a string, or an instance of the object that implements the Renderable or Htmlable interface
//            $tools->add('<a class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>&nbsp;&nbsp;delete</a>');
        });

        $form->setWidth(8, 3);


        return $form;
    }
}
