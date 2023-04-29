<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;
use PhpParser\Builder\FunctionLike;
use App\Models\Link;
use App\Models\Post;
use App\Models\Topic;
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
    public function product_category($slug)
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
    public function product_brand($slug)
    {
        $row_brand = Brand::where([['slug', '=', $slug], ['status', '=', '1']])->first();
        $product_list = Product::where([['status', '=', '1'], ['brand_id', '=', $row_brand->id]])
            ->orderBy('created_at', 'desc')
            ->paginate(9);
        return view('frontend.product-brand', compact('product_list', 'row_brand'));
    }
    public function product_detail($product)
    {

        $list_category_id = array();
        array_push($list_category_id, $product->category_id);
        //xét cấp con
        $list_category1 = Category::where([['parent_id', '=', $product->category_id], ['status', '=', '1']])->get();
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
        $product_list = Product::where([['status', '=', 1], ['id', '!=', $product->id]])
            ->whereIn('category_id', $list_category_id)
            ->orderBy('created_at', 'desc')
            ->take(4)->get();
        return view('frontend.product-detail', compact('product', 'product_list'));
    }

    public function post_topic($slug)
    {
        $row_topic = Topic::where([['slug', '=', $slug], ['status', '=', '1']])->first();
        $args = [
            ['status', '=', 1],
            ['type', '=', 'post'],
            ['topic_id', '=', $row_topic->id]
        ];
        $post_list = Post::where($args)
            ->orderBy('created_at', 'desc')
            ->paginate(9);
        return view('frontend.post-topic', compact('row_topic', 'post_list'));
    }
    public function post_page($slug)
    {
        $args = [
            ['status', '=', 1],
            ['type', '=', 'page'],
            ['slug', '=', $slug]
        ];
        $post = Post::where($args)->fisrt();
        return view('frontend.post-page', compact('post'));
    }
    public function post_detail($post)
    {
        $args = [
            ['status', '=', 1],
            ['id', '!=', $post->id],
            ['type', '=', 'post'],
            ['topic_id', '=', $post->topic_id]
        ];
        $post_list = Post::where()
            ->orderBy('created_at', 'desc')
            ->take(4)->get();
        return view('frontend.post-detail', compact('post', 'post_list'));
    }

    public function error_404($slug)
    {
        return view('frontend.404');
    }
    //tát cả sản phẩm
    public function product()
    {

        $product_list = Product::where('status', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(20);
        return view('frontend.product', compact('product_list'));
    }
    public function brand()
    {
        $product_list = Product::where('status', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(9);
        return view('frontend.brand', compact('product_list'));
    }
    public function post()
    {
        $post_list = Post::where([['status', '=', 1], ['type', '=', 'post']])
            ->orderBy('created_at', 'desc')
            ->paginate(9);
        return view('frontend.post', compact('post_list'));
    }
}
