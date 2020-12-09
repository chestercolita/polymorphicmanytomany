<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Models\Post;
use App\Models\Video;
use App\Models\Tag;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function() {
    $post = Post::create(['name' => 'My First Post']);
    $tag1 = Tag::find(1);
    $post->tags()->save($tag1);

    $video = Video::create(['name' => 'video.mov']);
    $tag2 = Tag::find(1);
    $video->tags()->save($tag2);
});

Route::get('/read', function() {
    $post = Post::findOrFail(1);
    foreach($post->tags as $tag) {
        echo $tag->name;
    }
});

Route::get('/update', function() {
    $post = Post::findOrFail(1);
    foreach($post->tags as $tag) {
        $tag->whereName('PHP')->update(['name' => 'Updated PHP']);
    }
});

Route::get('/delete', function() {
    $post = Post::findOrFail(1);
    foreach ($post->tags as $tag) {
        $tag->whereId(2)->delete();
    }
});
