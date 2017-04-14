<?php namespace Foostart\Page\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use URL;
use Route,
    Redirect;
use Foostart\Page\Models\PagesCategories;
/**
 * Validators
 */
use Foostart\Page\Validators\PageCategoryAdminValidator;

class PageCategoryAdminController extends Controller {

    public $data_view = array();

    private $obj_page_category = NULL;
    private $obj_validator = NULL;

    public function __construct() {
        $this->obj_page_category = new PagesCategories();
    }

    /**
     *
     * @return type
     */
    public function index(Request $request) {

         $params =  $request->all();

        $list_page_category = $this->obj_page_category->get_pages_categories($params);

        $this->data_view = array_merge($this->data_view, array(
            'pages_categories' => $list_page_category,
            'request' => $request,
            'params' => $params
        ));
        return view('page::page_category.admin.page_category_list', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function edit(Request $request) {

        $page = NULL;
        $page_id = (int) $request->get('id');
        

        if (!empty($page_id) && (is_int($page_id))) {
            $page = $this->obj_page_category->find($page_id);

        }

        $this->data_view = array_merge($this->data_view, array(
            'page' => $page,
            'request' => $request
        ));
        return view('page::page_category.admin.page_category_edit', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function post(Request $request) {

        $this->obj_validator = new PageCategoryAdminValidator();

        $input = $request->all();

        $page_id = (int) $request->get('id');

        $page = NULL;

        $data = array();

        if (!$this->obj_validator->validate($input)) {

            $data['errors'] = $this->obj_validator->getErrors();

            if (!empty($page_id) && is_int($page_id)) {

                $page = $this->obj_page_category->find($page_id);
            }

        } else {
            if (!empty($page_id) && is_int($page_id)) {

                $page = $this->obj_page_category->find($page_id);

                if (!empty($page)) {

                    $input['page_category_id'] = $page_id;
                    $page = $this->obj_page_category->update_page($input);

                    //Message
                    \Session::flash('message', trans('page::page.message_update_successfully'));
                    return Redirect::route("admin_page_category.edit", ["id" => $page->page_id]);
                } else {

                    //Message
                    \Session::flash('message', trans('page::page.message_update_unsuccessfully'));
                }
            } else {

                $page = $this->obj_page_category->add_page($input);

                if (!empty($page)) {

                    //Message
                    \Session::flash('message', trans('page::page.message_add_successfully'));
                    return Redirect::route("admin_page_category.edit", ["id" => $page->page_id]);
                } else {

                    //Message
                    \Session::flash('message', trans('page::page.message_add_unsuccessfully'));
                }
            }
        }

        $this->data_view = array_merge($this->data_view, array(
            'page' => $page,
            'request' => $request,
        ), $data);

        return view('page::page_category.admin.page_category_edit', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function delete(Request $request) {

        $page = NULL;
        $page_id = $request->get('id');

        if (!empty($page_id)) {
            $page = $this->obj_page_category->find($page_id);

            if (!empty($page)) {
                  //Message
                \Session::flash('message', trans('page::page.message_delete_successfully'));

                $page->delete();
            }
        } else {

        }

        $this->data_view = array_merge($this->data_view, array(
            'page' => $page,
        ));

        return Redirect::route("admin_page_category");
    }

}