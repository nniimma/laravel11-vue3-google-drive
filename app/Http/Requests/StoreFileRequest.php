<?php

namespace App\Http\Requests;

use App\Models\File;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreFileRequest extends ParentIdBaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // dd(Request());
        return array_merge(parent::rules(), [
            'files.*' => [
                'required',
                'file',
                function ($attribute, $value, $fail) {
                    // dd($value->getClientOriginalName());
                    // dd($this->parent_id);
                    /** @var $value \Illuminate\Http\UploadedFile */
                    $file = File::query()
                        ->where('name', $value->getClientOriginalName())
                        ->where('created_by', Auth::id())
                        ->where('parent_id', $this->parent_id)
                        ->whereNull('deleted_at')
                        ->exists();

                    if ($file) {
                        $fail('File "' . $value->getClientOriginalName() . '" already exists.');
                    }
                },
            ],
        ]);
    }
}
