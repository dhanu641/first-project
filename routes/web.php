

 <?php
      
        use Illuminate\Support\Facades\Auth;
        use App\Http\Middleware\authenticate;
        use Illuminate\Support\Facades\Route;
        use App\Http\Controllers\HomeController;
        use App\Http\Controllers\categorycontroller;
        use App\Http\Controllers\Auth\LoginController;
        use App\Http\Controllers\productcontroller;
        use App\Http\Controllers\cartcontroller;

        Route::get("/", function(){
        return view("welcome");
        });
        Auth::routes();
        //middleware([authenticate::class])->
        Route::get('admin',function(){
            return view('admin_panel');
        })->name('admin')->middleware('auth');
        Route::prefix('admin/category')->name('category.')->group( function () {
            Route::get('/', [categoryController::class,'index'])->name('index');
            Route::get('/create', function () {
                return view('category.create');
            })->name('create');
            Route::post('/store', [categoryController::class,'store'])->name('store');
            Route::get('/edit/{id}', [categoryController::class,'edit'])->name('edit');
            Route::put('/update/{id}', [categoryController::class,'update'])->name('update');
            Route::get('/delete/{id}', [categorycontroller::class,'delete'])->name('delete');
        })->middleware('auth');

        Route::prefix('admin/products')->name('products.')->group( function () {
            Route::get('/', [productcontroller::class,'index'])->name('index');
            Route::get('/create', [productcontroller::class,'create'])->name('create');
            Route::post('/store', [productcontroller::class,'store'])->name('store');
            Route::get('/edit/{id}', [productcontroller::class,'edit'])->name('edit');
            Route::put('/update/{id}', [productcontroller::class,'update'])->name('update');
            Route::get('/delete/{id}', [productcontroller::class,'delete'])->name('delete');
        })->middleware('auth');


        Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');
        Route::get('/products/{id}', [productcontroller::class, 'products'])->name('products')->middleware('auth');

       
        Route::get('/cart/{id}',[cartcontroller::class,'addcart'])->name('add_to_cart');
        Route::get('/cart',[cartcontroller::class,'cart'])->name('cart');