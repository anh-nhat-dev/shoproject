<?php
namespace App\Composers;

use Illuminate\View\View;
use App\Models\Category;

class CatesComposers
{
    
    /**
     * Cates data
     *
     * @var object
     */
    protected $cates;

    /**
     * Current router
     *
     * @var [type]
     */
    protected $currentRouter;
    
    /**
     * Router hidden
     *
     * @var array
     */
    protected $hiddenRouter = ['admin.cate.edit'];

    /**
     * Bind data to the view
     *
     * @param View $view
     * @return void
     */

    /**
     * Cate ID
     *
     * @var [type]
     */
    protected $cate_id;
    protected $cate_id_temp;

    public function __construct()
    {
        $this->currentRouter = app('router')->currentRouteName();
        $this->checkCateId();
        $this->recursiveCates();
    }

    public function compose(View $view)
    {
        $view->with('cates', $this->cates);
    }

    public function recursiveCates()
    {
        $cates = Category::where('parent',0)->get();
        $this->cates = collect();
        $this->loop($cates);
    }

    public function loop($cates, $parent = 0, $char = '')
    {
        foreach ($cates as $cate) {
            if ($cate->parent == $parent) {
                if ($cate->category_id == $this->cate_id) {
                    goto next;
                }
                $cate->name = $char.$cate->name;
                $childrend = $cate->childrend;
                $this->cates->push($cate);
                $this->loop($cate->childrend,$cate->category_id, $char.'--');
                next:
                unset($cate);
            }
        }
    }

    public function checkCateId()
    {
        if (in_array($this->currentRouter, $this->hiddenRouter)) {
            $this->cate_id = app('request')->segment(3);   
        }
    }
}