<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\PostRepositoryInterface;
use App\Entities\Post;

class PostRepository extends AbstractRepository implements PostRepositoryInterface
{
    protected $model;
    protected $typeRepository;

    function __construct(TypeRepository $typeRepository)
    {
        $this->model = $this->model();
        $this->typeRepository = $typeRepository;
    }

    public function model()
    {
        return Post::class;
    }

    public function getNewestPost()
    {
        return $this->model::orderBy('id', 'desc')->skip(0)->take(4)->get();
    }

    public function changePublishStatus($id)
    {
        $post = $this->model::find($id);
        if ($post->publish_flg != 0) {
            $post->publish_flg = 0;
            $post->save();

            return __('Unpublish');
        } else {
            $post->publish_flg = 1;
            $post->save();

            return __('Published');
        }
    }

    public function create($data)
    {
        return $this->model::create($data);
    }

    public function getAll()
    {
        return $this->typeRepository->getAllTypes();
    }

    public function findById($id)
    {
        return $this->model::find($id);
    }

    public function relativePost($id)
    {
        $postCurrent = self::findById($id);
        return $this->model::where('types_id', $postCurrent->types_id)->take(4)->get();
    }

    public function editPost($request, $id)
    {
        $currentpost = $this->model::find($id);
        $currentpost->types_id = $request->post_type;
        $currentpost->title = $request->post_title;
        $currentpost->body = $request->post_content;
        $currentpost->save();
        return __('edited');
    }

    public function deletePost($id)
    {
        return $this->model::destroy($id);
    }

    public function getAllPost()
    {
        return $this->model::with('user')->paginate(16);
    }
}
