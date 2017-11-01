<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Repositories\Contracts\PostRepositoryInterface as PostRepository;
use Auth;

class PostController extends Controller
{
    private $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function writePost()
    {
        $allType = $this->postRepository->getAll();
        return view('post.write_post', compact('allType'));
    }

    public function changePushlish($id)
    {
        return $this->postRepository->changePublishStatus($id);
    }

    public function postWritePost(PostRequest $request)
    {
        $postData = [];
        $postData = array_add($postData, 'title', $request->post_title);
        $postData = array_add($postData, 'body', $request->post_content);
        $postData = array_add($postData, 'slug', str_slug($request->post_title, '-'));
        $postData = array_add($postData, 'publish_flg', 1);
        $postData = array_add($postData, 'users_id', Auth::user()->id);
        $postData = array_add($postData, 'types_id', 10);

        $this->postRepository->create($postData);
        return redirect()->back()->with('success_msg', __('Tạo bài viết thành công'));
    }
}
