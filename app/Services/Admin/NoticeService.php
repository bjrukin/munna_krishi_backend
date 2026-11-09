<?php
namespace App\Services\Admin;

use App\Models\Notice;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class NoticeService {
    public function feature(int $noticeId): JsonResponse
    {
        $notice = Notice::findOrFail($noticeId);

        DB::transaction(function () use ($notice): void {
            Notice::where('is_featured', true)->update(['is_featured' => false]);
            $notice->update(['is_featured' => true]);
        });

        return response()->json([
            'message' => 'Notice featured on the homepage successfully.',
            'status' => 200,
        ]);
    }

    public function list($per_page, $page, $q) {
        try {
            $data['q'] = $q;
            $query = Notice::select('*');
            if ($q) {
                $query->where('name', 'LIKE', '%' . $q . '%');
            }
            $data['notices'] = $query->orderBy('id', 'asc')->paginate($per_page);
            $data['count'] = ($page != 1) ? (($per_page * $page) - $per_page + 1) : 1;
            return $data;
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function status($request) {
        try {
            Notice::where('id', $request->id)
                ->update([
                    $request->field_name => $request->val,
                ]);
            if ($request->val == 1) {
                $response['message'] = 'Notice enabled successfully';
            } else {
                $response['message'] = 'Notice disabled successfully';
            }
            $response['error'] = null;
            $response['status'] = 200;
            return response()->json($response, $response['status']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function store($request) {
        try {
            if ($request['id']) {
                $id = $request['id'];
                $notice = Notice::findOrFail($id);
                $response['message'] = 'Notice updated successfully.';
                $response['error'] = null;
                $response['status'] = 202;
            } else {
                $id = 0;
                $notice = new Notice;
                $response['message'] = 'Notice created successfully.';
                $response['error'] = null;
                $response['status'] = 201;
            }
            $notice->name = $request['name'];
            $notice->date = $request['date'];
            $notice->description = $request['description'];
            $notice->save();
            $response['error'] = null;
            return response()->json($response, $response['status']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function delete($request) {
        try {
            $id = $request->id;
            Notice::where('id', $id)->delete();
            $response['message'] = 'Notice deleted successfully.';
            $response['error'] = null;
            $response['status'] = 200;
            return response()->json($response, $response['status']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
