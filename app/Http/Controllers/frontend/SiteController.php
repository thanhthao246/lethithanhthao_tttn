<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;
use PhpParser\Builder\FunctionLike;
use App\Models\Link;
use App\Models\Post;
use App\Models\Product;

class SiteController extends Controller
{
    public function index($slug = null)
    {
        if ($slug == null) {
            return $this->home();
        } else {
            $link = Link::where('slug', '=', $slug)->first();
            if ($link != NULL) {
                $type = $link->type;
                switch ($type) {
                    case 'brand': {
                            return $this->product_brand($slug);
                            break;
                        }
                    case 'category': {
                            return $this->product_category($slug);
                            break;
                        }
                    case 'topic': {
                            return $this->post_topic($slug);
                            break;
                        }
                    case 'page': {
                            return $this->post_page($slug);
                            break;
                        }
                }
            } else {
                $product = Product::where([['status', '=', 1], ['slug', '=', $slug]])->first();
                if ($product != NULL) {
                    return $this->product_detail($product);
                } else {
                    $post = Post::where([['status', '=', 1], ['slug', '=', $slug], ['type', '=', 'post']])->first();
                    if ($post != NULL) {
                        return $this->post_detail($post);
                    } else {
                        return $this->error_404($slug);
                    }
                }
            }
        }
    }
    //trang chủ
    private function home()
    {
        $list_category = Category::where([['parent_id', '=', 0], ['status', '=', 1]])->get();
        return view('frontend.home', compact('list_category'));
    }
    private function product_category($slug)
    {
        $row_cat = Category::where([['slug', '=', $slug], ['status', '=', '1']])->first();
        $list_category_id = array();
        array_push($list_category_id, $row_cat->id);
        //xét cấp con
        $list_category1 = Category::where([['parent_id', '=', $row_cat->id], ['status', '=', '1']])->get();
        if (count($list_category1) > 0) {
            foreach ($list_category1 as $row_cat1) {
                array_push($list_category_id, $row_cat1->id);

                $list_category2 = Category::where([['parent_id', '=', $row_cat1->id], ['status', '=', '1']])->get();
                if (count($list_category2) > 0) {
                    foreach ($list_category2 as $row_cat2) {
                        array_push($list_category_id, $row_cat2->id);

                        $list_category3 = Category::where([['parent_id', '=', $row_cat2->id], ['status', '=', '1']])->get();
                        if (count($list_category3) > 0) {
                            foreach ($list_category3 as $row_cat3) {
                                array_push($list_category_id, $row_cat3->id);
                            }
                        }
                    }
                }
            }
        }
        $product_list = Product::where('status', 1)
            ->whereIn('category_id', $list_category_id)
            ->orderBy('created_at', 'desc')
            ->paginate(9);
        return view('frontend.product-category', compact('product_list', 'row_cat'));
    }
    private function product_brand($slug)
    {
        $row_brand = Brand::where([['slug', '=', $slug], ['status', '=', '1']])->get();
        $product_list = Product::where(['status', '=', 1], ['brand_id', '=', $row_brand->id])
            ->orderBy('created_at', 'desc')
            ->paginate(9);
        return view('frontend.product-brand', compact('product_list', 'row_brand'));
    }
    private function post_topic($slug)
    {
        return view('frontend.post-topic');
    }
    private function post_page($slug)
    {
        return view('frontend.post-page');
    }
    private function product_detail($product)
    {
        return view('frontend.product-detail');
    }
    private function post_detail($post)
    {
        return view('frontend.post-detail');
    }
    private function error_404($slug)
    {
        return view('frontend.404');
    }
}
