<?php

namespace App\Http\Controllers;

use App\Category;
use App\Components\Recusive;
use App\Http\Requests\productAddRequest;
use App\Product;
use App\ProductImage;
use App\ProductTag;
use App\Tag;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminProductController extends Controller
{
    use StorageImageTrait;
    private $category;
    private $product;
    private $productImage;
    private $productTag;
    private $tag;

    public function __construct(
        Category $category,
        Product $product,
        ProductImage $productImage,
        ProductTag $productTag,
        Tag $tag
    )
    {
        $this->category = $category;
        $this->product = $product;
        $this->productImage = $productImage;
        $this->productTag = $productTag;
        $this->tag = $tag;
    }

    public function index()
    {
        $products = $this->product->latest()->paginate(5);
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $htmlOption = $this ->getCategory($parentId = '');
        return view('admin.product.add', compact('htmlOption'));

    }

    public function getCategory($parentId)
    {
        $data = $this ->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive ->categoryRecusive($parentId);
        return $htmlOption;
    }

    public function store(productAddRequest $request)
    {
        try {
            DB::beginTransaction();
            $dataProductCreate = [
                'name' => $request->name,
                'price' => $request->price,
                'content' => $request->contents,
                'user_id' => auth()->id(),
                'category_id' => $request->category_id,
            ];
            $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'product');

            if(!empty($dataUploadFeatureImage)){
                $dataProductCreate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataProductCreate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            }
            $product = $this->product->create($dataProductCreate);

            //insert to table product_images
            if ($request->hasFile('image_path')) {
                foreach ($request->image_path as $fileItem) {
                    $dataProductImageDetail = $this->storageTraitUploadMutiple($fileItem, 'product');

                    $product->images()->create([
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name']
                    ]);
                }
            }

            //insert to table product_tag and tag table

            if(!empty($dataUploadFeatureImage)) {
                foreach ($request->tags as $tagItem) {
                    $tagInstance = $this->tag->firstOrCreate([
                        'name' => $tagItem
                    ]);
                    $tagIds[] = $tagInstance->id;

                }
            }


            $product->tags()->attach($tagIds);
            DB::commit();
            return redirect()->route('product.index');

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: '. $exception->getMessage() . '--- Line : ' . $exception->getLine());
        }
        return redirect()->route('product.index');
    }

    public function edit($id)
    {
        $product = $this->product->find($id);
        $htmlOption = $this ->getCategory($product->category_id);
        return view('admin.product.edit', compact('htmlOption', 'product'));
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $dataProductUpdate = [
                'name' => $request->name,
                'price' => $request->price,
                'content' => $request->contents,
                'user_id' => auth()->id(),
                'category_id' => $request->category_id,
            ];
            $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'product');

            if(!empty($dataUploadFeatureImage)){
                $dataProductUpdate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataProductUpdate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            }
            $this->product->find($id)->update($dataProductUpdate);
            $product = $this->product->find($id);

            //insert to table product_images
            if ($request->hasFile('image_path')) {
                $this->productImage->where('product_id', $id)->delete();
                foreach ($request->image_path as $fileItem) {
                    $dataProductImageDetail = $this->storageTraitUploadMutiple($fileItem, 'product');
                    $product->images()->create([
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name']
                    ]);
                }
            }

            //insert to table product_tag and tag table

            if(!empty($dataUploadFeatureImage)) {
                foreach ($request->tags as $tagItem) {
                    $tagInstance = $this->tag->firstOrCreate([
                        'name' => $tagItem
                    ]);
                    $tagIds[] = $tagInstance->id;

                }
            }

            $product->tags()->sync($tagIds);
            DB::commit();
            return redirect()->route('product.index');

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: '. $exception->getMessage() . '--- Line : ' . $exception->getLine());
        }
        return redirect()->route('product.index');
    }

    public function delete($id)
    {
        try {
            $this->product->find($id)->delete();
            return response()->json([
               'code' => 200,
               'message' =>'success'
            ], 200);
        }
        catch (\Exception $exception) {
            Log::error('Message: '. $exception->getMessage() . '--- Line : ' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' =>'fail'
            ], 500);
        }
    }
}
