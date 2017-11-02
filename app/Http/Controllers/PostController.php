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
        $postData = array_add($postData, 'types_id', $request->post_type);

        $newPost = $this->postRepository->create($postData);

        return redirect()->route('viewpost', [$newPost->id])->with('success_msg', __('Tạo bài viết thành công'));
    }

    public function viewpost($id)
    {
        $postInfor = $this->postRepository->findById($id);
        $relativePost = $this->postRepository->relativePost($id);

        return view('post.view_post', compact('postInfor', 'relativePost'));
    }

    public function editPost($id)
    {
        $allType = $this->postRepository->getAll();
        $postCurrent = $this->postRepository->findById($id);

        return view('post.edit_post', compact('allType', 'postCurrent'));
    }

    public function postEditPost(PostRequest $request, $id)
    {
        $this->postRepository->editPost($request, $id);

        return redirect()->back()->with('success_msg', __('Sửa bài viết thành công'));
    }

    public function deletePost($id)
    {
        $this->postRepository->deletePost($id);

        return __('deleted');
    }

    public function viewListPost()
    {
        $allPost = $this->postRepository->getAllPost();

        return view('post.list_all_post', compact('allPost'));
    }
}
