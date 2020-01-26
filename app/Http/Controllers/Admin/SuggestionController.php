<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Suggestion;

class SuggestionController extends Controller
{
    public function delete(Request $request)
    {
        Suggestion::destroy($request->id);
        return back()->with('success', __('admin.suggestions.deleted'));
    }

    public function markRead(Request $request)
    {
        $suggestion = Suggestion::find($request->id);
        if ($suggestion) {
            $suggestion->shown_at = today();
            $suggestion->save();
            return  'fa-eye-slash';
        }

        logger("markRead - suggestion ($request->id) not found!");
        return 'fa-eye';
    }

    public function markNotRead(Request $request)
    {
        $suggestion = Suggestion::find($request->id);
        if ($suggestion) {
            $suggestion->shown_at = null;
            $suggestion->save();
            return  'fa-eye';
        }

        logger("markNotRead - suggestion ($request->id) not found!");
        return 'fa-eye-slash';
    }

    public function addNote(Request $request)
    {
        $suggestion = Suggestion::findOrFail($request->id);   
        if ($suggestion->notes) {
            $suggestion->notes .= ' '.$request->notes;
        } else {
            $suggestion->notes = $request->notes;
        }
        if ($suggestion->save()) {
            return back()->with('success', __('admin.suggestions.notes-saved'));
        }

        return back()->with('error', __('admin.error'));
    }
}
