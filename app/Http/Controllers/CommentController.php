<?php

namespace App\Http\Controllers;

use App\Facades\CommentFacade;
use App\Facades\JobFacade;
use App\Facades\UserFacade;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;
use App\Models\Company;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index(): Factory|View|Application
    {
        $breadcrumb = breadcrumb(
            ['حساب کاربری', route('profile.dashboard')],
            ['لیست تجربه های ثبت شده شما']
        );

        $jobs = JobFacade::jobs();

        $comments = UserFacade::comments(10);

        return view('comments.index', [
            'breadcrumb' => $breadcrumb,
            'jobs' => $jobs,
            'comments' => $comments
        ]);
    }

    public function create(Company $company): Factory|View|Application
    {
        $breadcrumb = breadcrumb(
            ['حساب کاربری', route('profile.dashboard')],
            ['شرکت ها', route('companies.index')],
            [$company->name, route('companies.show', $company->id)],
            ['ثبت تجربه'],
        );

        $jobs = JobFacade::jobs();

        return view('comments.create', [
            'breadcrumb' => $breadcrumb,
            'jobs' => $jobs,
            'company' => $company
        ]);
    }

    public function store(Company $company, StoreCommentRequest $request): RedirectResponse
    {
        $data = [
            'job_id' => $request->job_id,
            'company_id' => $company->id,
            'display_name' => $request->display_name,
            'comment' => $request->comment,
            'type' => $request->type,
            'hire' => (bool)$request->hire,
            'requested_wage' => intval(preg_replace('/\D/', '', $request->requested_wage)),
            'received_wage' => intval(preg_replace('/\D/', '', $request->received_wage))
        ];

        CommentFacade::store(Auth::user(), $company, $data);

        session()->flash('comment_store');

        return redirect()->route('comments.index');
    }

    public function update(UpdateCommentRequest $request, Company $company, Comment $comment): RedirectResponse
    {
        $this->authorize('update', $comment);

        if ($comment->company_id != $company->id)
            abort(401);

        $data = [
            'job_id' => $request->job_id,
            'display_name' => $request->display_name,
            'comment' => $request->comment,
            'status' => Comment::STATUS_WAITING,
            'type' => $request->type,
            'hire' => (bool)$request->hire,
            'requested_wage' => intval(preg_replace('/\D/', '', $request->requested_wage)),
            'received_wage' => intval(preg_replace('/\D/', '', $request->received_wage))
        ];

        CommentFacade::update($comment, $data);

        session()->flash('comment_update');

        return back();
    }

    public function destroy(Company $company, Comment $comment): RedirectResponse
    {
        $this->authorize('delete', $comment);

        if ($comment->company_id !== $company->id)
            abort(401);

        CommentFacade::delete($comment);

        session()->flash('comment_destroy');

        return back();
    }
}
