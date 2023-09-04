<?php

namespace App\Http\Requests\Comments;

use App\Models\Comment;
use Illuminate\Foundation\Http\FormRequest;

class StoreReplyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'user_id' => auth()->id(),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'body' => 'required|max:255',
            'comment_id' => 'required|exists:comments,id',
        ];
    }

    /**
     * Create reply data with conditional 'parent_id'.
     *
     * @return array<string, mixed>
     */
    public function createReplyData(): array
    {
        $commentId = $this->validated()['comment_id'];
        $parentId = $this->has('parent_id') ? $this->parent_id : null;
        $parentReply = $parentId !== null;

        $replyData = [
            'body' => $this->validated()['body'],
            'user_id' => auth()->id(),
            'replyable_id' => $commentId,
            'replyable_type' => Comment::class,
            'parentReply' => $parentReply,
        ];

        if ($parentId !== null) {
            $replyData['parent_id'] = $parentId;
        }

        return $replyData;
    }
}
