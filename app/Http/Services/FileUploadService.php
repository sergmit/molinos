<?php

namespace App\Http\Services;

use App\Models\Feedback;
use App\Models\File;
use Illuminate\Http\Request;

class FileUploadService
{
    public const FEEDBACK_STORAGE = 'public/feedback';

    /**
     * @param Request $request
     * @param Feedback $feedback
     */
    public function saveFeedbackFiles(Request $request, Feedback $feedback): void
    {
        $filesUpload = $request->file('files');

        if (!empty($filesUpload)) {
            foreach ($filesUpload as $item) {
                $path = $item->store(self::FEEDBACK_STORAGE);
                $file = new File();
                $file->path = $path;
                $file->feedback()->associate($feedback);
                $file->save();
            }
        }

    }
}
