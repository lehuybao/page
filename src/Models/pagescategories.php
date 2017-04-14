<?php

namespace Foostart\Page\Models;

use Illuminate\Database\Eloquent\Model;

class PagesCategories extends Model {

    protected $table = 'pages_categories';
    public $timestamps = false;
    protected $fillable = [
        'page_category_name'
    ];
    protected $primaryKey = 'page_category_id';

    public function get_pages_categories($params = array()) {
        $eloquent = self::orderBy('page_category_id');

        if (!empty($params['page_category_name'])) {
            $eloquent->where('page_category_name', 'like', '%'. $params['page_category_name'].'%');
        }
        $pages_category = $eloquent->paginate(10);
        return $pages_category;
    }

    /**
     *
     * @param type $input
     * @param type $page_id
     * @return type
     */
    public function update_page($input, $page_id = NULL) {

        if (empty($page_id)) {
            $page_id = $input['page_category_id'];
        }

        $page = self::find($page_id);

        if (!empty($page)) {

            $page->page_category_name = $input['page_category_name'];

            $page->save();

            return $page;
        } else {
            return NULL;
        }
    }

    /**
     *
     * @param type $input
     * @return type
     */
    public function add_page($input) {

        $page = self::create([
                    'page_category_name' => $input['page_category_name'],
        ]);
        return $page;
    }
}
