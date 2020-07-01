<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\HttpException;

class AdminController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(): View
    {
        $feedback = Feedback::with('files')->get();

        return view('admin/index', ['feedback' => $feedback]);
    }

    /**
     * @return Application|Factory|View
     */
    public function showAdminUpdate(): View
    {
        $admin = User::find(1);

        return view('admin.admin', ['admin' => $admin]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function updateAdminEmail(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'email' => 'required|email'
        ]);
        $user = User::find(1);

        if (empty($user)) {
            throw new HttpException(400, 'Admin not found');
        }

        $user->email = $request->get('email');
        $user->save();

        return redirect()->route('admin.email.show');
    }
}
