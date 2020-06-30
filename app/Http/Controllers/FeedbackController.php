<?php

namespace App\Http\Controllers;

use App\Events\FeedbackCreateEvent;
use App\Http\Requests\FeedbackRequest;
use App\Http\Services\FeedbackService;
use App\Http\Services\FileUploadService;
use App\Models\Feedback;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class FeedbackController extends Controller
{
    /**
     * @var FeedbackService
     */
    private $feedbackService;
    /**
     * @var FileUploadService
     */
    private $fileUploadService;

    public function __construct(FeedbackService $feedbackService, FileUploadService $fileUploadService)
    {
        $this->feedbackService = $feedbackService;
        $this->fileUploadService = $fileUploadService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $feedback = Feedback::with('files')->get();

        return view('admin/index', ['feedback' => $feedback]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param FeedbackRequest $request
     * @return RedirectResponse
     */
    public function store(FeedbackRequest $request): RedirectResponse
    {
        $feedback = $this->feedbackService->create($request);
        $this->fileUploadService->saveFeedbackFiles($request, $feedback);
        event(new FeedbackCreateEvent($feedback));

        return redirect()->route('home')->with('status', 'Created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Feedback $feedback
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Feedback $feedback): RedirectResponse
    {
        $feedback->delete();

        return redirect()->route('admin_main');
    }
}
