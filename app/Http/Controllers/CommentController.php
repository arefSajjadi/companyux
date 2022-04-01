<?php

namespace App\Http\Controllers;

use App\DB\CommentRepo;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function index()
    {
        $commentDB = new CommentRepo;
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

        $jobs = $commentDB->getJobs();

        $comments = $commentDB->getComment(Auth::user());

        return view('comments.index', [
            'breadcrumb' => $breadcrumb,
            'jobs' => $jobs,
            'comments' => $comments
        ]);
    }

    public function create(Company $company)
    {
        $commentDB = new CommentRepo;

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

        $jobs = $commentDB->getJobs(); //db

        return view('comments.create', [
            'breadcrumb' => $breadcrumb,
            'jobs' => $jobs,
            'company' => $company
        ]);
    }

    public function store(Company $company, StoreCommentRequest $request)
    {
        $commentDB = new CommentRepo;
        //send data to ShoteRepo class for create new comment
        $commentDB->storeComment(Auth::user(), $request, $company);
    
        session()->flash('comment_store');
        return redirect()->route('comments.index');
    }

    public function update(UpdateCommentRequest $request,  Comment $comment)
    {
        $commentDB = new CommentRepo;

        $this->authorize('update', $comment);
        $commentDB->updateComment( $request, $comment);

        session()->flash('comment_update');
        return back();
    }

    public function destroy(Comment $comment)
    {
        $commentDB = new CommentRepo;
        $this->authorize('delete', $comment);

        $commentDB->delete($comment);
        session()->flash('comment_destroy');

        return back();
    }
}
