<?php

namespace Foostart\Page\Models;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model {

    protected $table = 'pages';
    public $timestamps = false;
    protected $fillable = [
        'page_name'
    ];
    protected $primaryKey = 'page_id';

    /**
     *
     * @param type $params
     * @return type
     */
    public function get_pages($params = array()) {
        $eloquent = self::orderBy('page_id');

        //page_name
        if (!empty($params['page_name'])) {
            $eloquent->where('page_name', 'like', '%'. $params['page_name'].'%');
        }

        $pages = $eloquent->paginate(10);//TODO: change number of item per page to configs

        return $pages;
    }



    /**
     *
     * @param type $input
     * @param type $page_id
     * @return type
     */
    public function update_page($input, $page_id = NULL) {

        if (empty($page_id)) {
            $page_id = $input['page_id'];
        }

        $page = self::find($page_id);

        if (!empty($page)) {

            $page->page_name = $input['page_name'];

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
                    'page_name' => $input['page_name'],
        ]);
        return $page;
    }
}
