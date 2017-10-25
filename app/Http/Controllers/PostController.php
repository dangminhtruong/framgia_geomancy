<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Repositories\Contracts\PostRepositoryInterface as PostRepository;
class PostController extends Controller
{
    private $postRepository;
    public function __construct(PostRepository $postRepository){
        $this->postRepository = $postRepository;
    }
    public function writePost()
    {
        return view('post.write_post');
    }
    public function changePushlish($id){
        return $this->postRepository->changePublishStatus($id);
    }
}