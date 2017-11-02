<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequireBlueprintRequest;
use App\Http\Requests\CreateBlueprintRequest;
use App\Repositories\Contracts\UserRepositoryInterface as UserRepository;
use App\Repositories\Contracts\BlueprintRepositoryInterface as BlueprintRepository;
use App\Repositories\Contracts\TopicRepositoryInterface as TopicRepository;
use App\Repositories\Contracts\GalleryRepositoryInterface as GalleryRepository;
use App\Repositories\Contracts\CategoryRepositoryInterface as CategoryRepository;
use App\Repositories\Contracts\RequestBlueprintRepositoryInterface as RequestBlueprintRepository;
use App\Repositories\Contracts\CommentRepositoryInterface as CommentRepository;

use Hash, Auth;

class BlueprintController extends Controller
{
    private $blueprintRepository;
    private $topicRepository;
    private $galleryRepository;
    private $userRepository;
    private $categoryRepository;
    private $requestBlueprintRepository;
    private $commentRepository;

    public function __construct(
        CommentRepository $commentRepository,
        BlueprintRepository $blueprintRepository,
        TopicRepository $topicRepository,
        GalleryRepository $galleryRepository,
        UserRepository $userRepository,
        CategoryRepository $categoryRepository,
        RequestBlueprintRepository $requestBlueprintRepository
    )
    {
        $this->blueprintRepository = $blueprintRepository;
        $this->topicRepository = $topicRepository;
        $this->galleryRepository = $galleryRepository;
        $this->userRepository = $userRepository;
        $this->categoryRepository = $categoryRepository;
        $this->requestBlueprintRepository = $requestBlueprintRepository;
        $this->commentRepository = $commentRepository;
    }

    public function getRequestFishTanksBlueprint()
    {
        return view('blueprint.request_blueprint');
    }

    public function postRequestFishTanksBlueprint(RequireBlueprintRequest $request)
    {
        $newRequest = $this->blueprintRepository->createRequestBlueprint($request);
        return redirect()->route('viewRequest', [$newRequest])->with('success_msg', __('Yêu cầu thành công !'));
    }

    public function getCreateBlueprint()
    {
        $topics = $this->topicRepository->getAllTopics();
        $categories = $this->categoryRepository->getAllCategory();
        return view('blueprint.create_blueprint', compact('topics', 'categories'));
    }

    public function postCreateBlueprint(CreateBlueprintRequest $request)
    {
        return $this->blueprintRepository->createBlueprint($request);
    }

    public function getCreateDone($id)
    {
        return view('blueprint.create_blueprint_done', compact('id'));
    }

    public function getAddAttribute(Request $request)
    {
        return view('blueprint.sub_pages.add_more_attr')->render();
    }

    public function getUpdateBlueprint($id)
    {
        $blueprintInfo = $this->blueprintRepository->getBlueprintInfo($id);
        $topicInfo = $this->blueprintRepository->findBlueprintTopic($id);
        $topics = $this->topicRepository->getAllTopics();
        $categories = $this->categoryRepository->getAllCategory();
        $blueprintProduct = $this->blueprintRepository->getBlueprintProduct($id);
        $gallery = $this->blueprintRepository->getBlueprintImage($id);
        return view('blueprint.update_blueprint',
            compact(
                'blueprintInfo',
                'blueprintProduct',
                'topicInfo', 'topics',
                'categories',
                'gallery'
            )
        );
    }

    public function postUpdateBlueprint(Request $request, $id)
    {
        $this->blueprintRepository->updateBlueprint($request, $id);
        return redirect()->route('getViewBlueprint', [$id])->with('success_msg', 'Update successfull');
    }

    public function getRemoveGallery($id)
    {
        return $this->galleryRepository->remove($id);
    }

    public function getViewBlueprint($id)
    {
        $blueprintInfo = $this->blueprintRepository->getBlueprintInfo($id);
        $gallery = $this->blueprintRepository->getBlueprintImage($id);
        $relative = $this->blueprintRepository->getRelative($blueprintInfo->topic->id);

        return view("blueprint.view_blueprint",
            compact(
                'blueprintInfo',
                'gallery',
                'relative'
            )
        );
    }

    public function getEditRequest($id)
    {
        $requestBlueprint = $this->requestBlueprintRepository->findById($id);

        return view('blueprint.edit_request_blueprint', compact('requestBlueprint'));
    }

    public function postEditRequest(RequireBlueprintRequest $request, $id)
    {
        $this->requestBlueprintRepository->updateRequestBlueprint($request, $id);

        return redirect()->back()->with('success_msg', __('Update successfully'));
    }

    public function deleteRequest($id)
    {
        $this->requestBlueprintRepository->delete($id);

        return "deleted";
    }

    public function deleteBlueprint($id)
    {
        try {
            $this->blueprintRepository->delete($id);
            return "deleted";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function listBlueprint()
    {
        $listBlueprint = $this->blueprintRepository->listAllBlueprint();

        return view('blueprint.list_blueprint', compact('listBlueprint'));
    }

    public function listNewBlueprint()
    {
        $listNewBlueprint = $this->blueprintRepository->listWeekBlueprint();

        return view('blueprint.list_new_blueprint', compact('listNewBlueprint'));
    }

    public function listMyBlueprint()
    {
        $allUserblueprint = $this->blueprintRepository->allUserBlueprint();

        return view('blueprint.list_my_blueprint', compact('allUserblueprint'));
    }

    public function removeProduct($productId)
    {
        return $this->blueprintRepository->removeProduct($productId);
    }

    public function viewRequest($requestId)
    {
        $requestInfor = $this->requestBlueprintRepository->findById($requestId);
        $ramdomRequest = $this->requestBlueprintRepository->ramdomRequest(4);

        return view('blueprint.view_request_blueprint', compact('requestInfor', 'ramdomRequest'));
    }

    public function searchByKeyWord(Request $request)
    {
        $blueprintResut = $this->blueprintRepository->searchByKeyWord($request->keyWord);

        return view('blueprint.sub_pages.navbar_search_respon', compact('blueprintResut'))->render();
    }

    public function addComment(Request $request)
    {
        $comment = [];
        $comment = array_add($comment, 'body', $request->commentContent);
        $comment = array_add($comment, 'commentable_id', $request->blueprintId);
        $comment = array_add($comment, 'commentable_type', 'App\Entities\Blueprint');
        $comment = array_add($comment, 'users_id', Auth::user()->id);

        $newComment = $this->commentRepository->create($comment);

        return view('blueprint.sub_pages.comment_respon', compact('newComment'))->render();
    }

    public function addReply(Request $request)
    {
        $reply = [];
        $reply = array_add($reply, 'body', $request->replyContent);
        $reply = array_add($reply, 'parents_comment_id', $request->comentId);
        $reply = array_add($reply, 'commentable_id', $request->blueprintId);
        $reply = array_add($reply, 'commentable_type', 'App\Entities\Blueprint');
        $reply = array_add($reply, 'users_id', Auth::user()->id);
        $reply = $this->commentRepository->create($reply);
        $blueprintInfo = $this->blueprintRepository->findById($request->blueprintId);
        $commentId = $request->comentId;

        return view('blueprint.sub_pages.reply_respon', compact('blueprintInfo', 'reply', 'commentId'))->render();
    }
}
