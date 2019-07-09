<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Images;
use App\Models\Product;
use App\Models\ProductAttr;
use App\Models\Slider;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller {
	public function index() {

		$silder = Slider::all();
		$products = Product::where('status', 1)->paginate(8);
		$productNew = DB::table('products')->where('sale', ">=", 20)->orderBy('id', 'desc')->take(5)->get();
		$byCate = Category::all();
		return view('Frontend.home.index', compact('products', 'byCate', 'productNew', 'silder'))->render();

	}

	public function listByCat($url = null) {
		//Show 404 Page if category url does not exist
		$countCategory = Category::where(['name' => $url])->count();
		if ($countCategory == 0) {
			abort(404);
		}

		//Display Categories or Sub Categories in left Sidebar of Home Page
		$categories = Category::with('categories')->where(['parent_id' => 0])->get();

		$categoryDetails = Category::where(['name' => $url])->first();
		if ($categoryDetails->parent_id == 0) {
			//if url is Main category url
			$subCategories = Category::where(['parent_id' => $categoryDetails->id])->get();
			$subCategoriesCount = count($subCategories);
			//dd($subCategoriesCount);
			if ($subCategoriesCount == 0) {
				$productsAll = Product::where(['categories_id' => $categoryDetails->id])->get();
			} else {

				foreach ($subCategories as $subcat) {
					$cat_ids[] = $subcat->id;
				}
				$productsAll = Product::whereIn('categories_id', $cat_ids)->get();
				$productsAll = json_decode(json_encode($productsAll));
			}

		} else {
			//if url is sub category url
			$productsAll = Product::where(['categories_id' => $categoryDetails->id])->get();
		}
		return view('Frontend.categories.listing')->with(compact('categories', 'categoryDetails', 'productsAll'));
	}
	public function listByCatFind(Request $request) {
		$cat_id = $request->id;
		if ($cat_id != "") {
			$data = Product::where('products.categories_id', $cat_id)->where('products.status', 1);
		} else {
			$data = Product::where('products.status', 1);
		}
		$search_id = $request->search;
		$searchCount = count($request->search);
		$priceCount = count($request->price);
		$size_id = $request->size;
		$color_id = $request->color;
		//dd($color_id);
		$color_idCount = count($request->color);
		// $data = $data->where('color', 'like', '%' . $color_id . '%')->get();
		// dd($data);
		if ($size_id != "") {

			$data = $data->join('productatt', 'productatt.products_id', '=', 'products.id')->select('products.*', 'productatt.products_id', 'productatt.size')->groupBy('productatt.products_id')->where('productatt.size', $size_id);

		}
		if ($priceCount != "0") {

			$price = explode("-", $request->price);
			$start = $price[0];
			$end = $price[1];
			$data = $data->where('products.price', ">=", $start)
				->where('products.price', "<=", $end);
			//dd($data);

		}
		if ($searchCount != "0") {
			if ($search_id != "1") {
				$data = $data->orderBy('price', 'asc');
			} else {

				$data = $data->orderBy('price', 'desc');
			}
		}
		if ($color_idCount != "0") {

			$data = $data->where('color', 'like', '%' . $color_id . '%');

		}
		$data = $data->get();

		if (count($data) == "0") {
			echo "<h1 align='center'>Kết quả tìm kiếm 0 sản phẩm </h1>";
		} else {
			return view('Frontend.product.productsPage', [
				'data' => $data,
			]);
		}
	}

	public function detialpro($id) {
		$detail_product = Product::findOrFail($id);
		$imagesGalleries = Images::where('products_id', $id)->get();
		$totalStock = ProductAttr::where('products_id', $id)->sum('stock');
		$relateProducts = Product::where([['id', '!=', $id], ['categories_id', $detail_product->categories_id]])->get();
		return view('Frontend.product.detail', compact('detail_product', 'imagesGalleries', 'totalStock',
			'relateProducts'));
	}
	public function getAttrs(Request $request) {
		$all_attrs = $request->all();
		$attr = explode('-', $all_attrs['size']);
		$result_select = ProductAttr::where(['products_id' => $attr[0], 'size' => $attr[1]])->first();
		echo $result_select->price . "#" . $result_select->stock;
	}

	public function search(Request $request) {
		$searchData = $request->searchData;
		$data = Product::where('name', 'like', '%' . $searchData . '%')
			->orwhere('price', $searchData)->get();
		return view('Frontend.home.search', [
			'data' => $data, 'catByUser' => $searchData,
		]);
	}
}
