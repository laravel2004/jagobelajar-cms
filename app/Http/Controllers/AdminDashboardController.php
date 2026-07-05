<?php

namespace App\Http\Controllers;

use App\Models\Bimbel;
use App\Models\BlogPost;
use App\Models\ExamSession;
use Illuminate\Contracts\View\View;

class AdminDashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('pages.admin.dashboard', [
            'stats' => [
                'bimbels' => Bimbel::query()->count(),
                'blogs' => BlogPost::query()->count(),
                'exam_sessions' => ExamSession::query()->count(),
                'published_exam_sessions' => ExamSession::query()->where('status', 'active')->count(),
            ],
        ]);
    }
}
