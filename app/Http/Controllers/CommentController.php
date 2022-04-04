<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;
use App\Models\Company;
use App\Repositories\CommentRepository;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function __construct(CommentRepository $commentRepository) 
    {
        $this->repository = $commentRepository;
    }

    private CommentRepository $repository ;

    public function index()
    {
        $breadcrumb = [
            'items' => [
                [
                    'title' => 'حساب کاربری',
                    'link' => route('profile.dashboard'),
                ],
                [
                    'title' => 'لیست تجربه های ثبت شده شما',
                ],
            ]
        ];

        $jobs = $this->repository->getJobs();

        $comments = $this->repository->getUsersProprety(Auth::user());

        return view('comments.index', [
            'breadcrumb' => $breadcrumb,
            'jobs' => $jobs,
            'comments' => $comments
        ]);
    }

    public function create(Company $company)
    {

        $breadcrumb = [
            'items' => [
                [
                    'title' => 'حساب کاربری',
                    'link' => route('profile.dashboard'),
                ],
                [
                    'title' => 'شرکت ها',
                    'link' => route('companies.index')
                ],
                [
                    'title' => $company->name,
                    'link' => route('companies.show', $company->id),
                ],
                [
                    'title' => 'ثبت تجربه',
                ],
            ]
        ];

        $jobs = $this->repository->getJobs(); //db

        return view('comments.create', [
            'breadcrumb' => $breadcrumb,
            'jobs' => $jobs,
            'company' => $company
        ]);
    }

    public function store(Company $company, StoreCommentRequest $request)
    {
        $data =[ //db
            'job_id' => $request->job_id,
            'company_id' => $company->id,
            'display_name' => $request->display_name,
            'comment' => $request->comment,
            'status' => Comment::STATUS_WAITING,
            'type' => $request->type,
            'hire' => (bool)$request->hire,
            'requested_wage' => intval(preg_replace('/\D/', '', $request->requested_wage)),
            'received_wage' => intval(preg_replace('/\D/', '', $request->received_wage))
        ];

        $this->repository->store($data,Auth::user(), $company);
        session()->flash('comment_store');
        return redirect()->route('comments.index');
    }

    public function update(UpdateCommentRequest $request,  Comment $comment)
    {

        $data =[ 
            'job_id' => $request->job_id,
            'display_name' => $request->display_name,
            'comment' => $request->comment,
            'status' => Comment::STATUS_WAITING,
            'type' => $request->type,
            'hire' => (bool)$request->hire,
            'requested_wage' => intval(preg_replace('/\D/', '', $request->requested_wage)),
            'received_wage' => intval(preg_replace('/\D/', '', $request->received_wage))
        ];

        $this->authorize('update', $comment);
        $this->repository->updateComment( $data, $comment);

        session()->flash('comment_update');
        return back();
    }

    
    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);

        $this->repository->delete($comment);
        session()->flash('comment_destroy');

        return back();
    }
}
