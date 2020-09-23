<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\HelperController;
use App\Models\TeamMember;
use File;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Session;


class TeamMemberController extends Controller
{
    /**
     * view team member list
     * @return Factory|View
     */
    public function index()
    {
        $data = [
            'team_members' => TeamMember::orderby('name')->get()
        ];
        return view('admin.team_member.index')->with($data);
    }


    /**
     * show product save form
     * @return Factory|View
     */
    public function create()
    {
        $data = [

        ];
        return view('admin.team_member.create')->with($data);
    }

    /**
     * save product data in database
     * @param Request $request
     * @return RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $teamMemberData = $this->validateRequest();
        $teamMemberData['slug'] = Str::slug($teamMemberData['name']);
        if (!empty($request->file('feature_photo'))) {
            $image = HelperController::imageUpload($request, 'feature_photo', 'team_member/', 50, 50);
            $teamMemberData['feature_photo'] = $image['file_name'];
        }

        if (TeamMember::create($teamMemberData)) {
            Session::flash('success', 'TeamMember Added successfully!');
            return redirect(route('admin.team_member.index'));
        } else {
            Session::flash('error', 'Failed to save product!');
            return redirect(route('admin.team_member.create'));
        }
    }

    /**
     * edit individual product
     * @param TeamMember $teamMember
     * @return Team Member
     */
    public function edit(TeamMember $teamMember)
    {
        $data = [
            'team_member' => $teamMember,
        ];

        return view('admin.team_member.edit')->with($data);
    }


    /**
     * update product
     * @param Request $request
     * @param TeamMember $teamMember
     * @return RedirectResponse|Redirector
     */
    public function update(Request $request, TeamMember $teamMember)
    {
        $validatedData = $this->updateValidateRequest();

        if (!empty($request->file('feature_photo'))) {
            if (file_exists(public_path('uploads/team_member/feature/' . $teamMember->feature_photo))) {
                File::delete(public_path('uploads/team_member/feature/' . $teamMember->feature_photo));
            }
            if (file_exists(public_path('uploads/team_member/thumbnail/' . $teamMember->feature_photo))) {
                File::delete(public_path('uploads/team_member/thumbnail/' . $teamMember->feature_photo));
            }

            $image = HelperController::imageUpload($request, 'feature_photo', 'team_member/feature');
            $teamMemberData['feature_photo'] = $image['file_name'];
        } else {
            unset($validatedData['feature_photo']);
        }

        if ($teamMember->update($validatedData)) {
            Session::flash('success', 'TeamMember Updated successfully!');
            return redirect(route('admin.team_member.index'));
        } else {
            Session::flash('error', 'Failed to update product!');
            return redirect(route('admin.team_member.create'));
        }
    }

    /**
     * delete team member individually
     * @param TeamMember $teamMember
     * @return RedirectResponse|Redirector
     * @throws Exception
     */
    public function destroy(TeamMember $teamMember)
    {
        if ($teamMember->delete()) {

            if (file_exists(public_path('uploads/product/feature/' . $teamMember->feature_photo))) {
                File::delete(public_path('uploads/product/feature/' . $teamMember->feature_photo));
            }
            if (file_exists(public_path('uploads/product/thumbnail/' . $teamMember->feature_photo))) {
                File::delete(public_path('uploads/product/thumbnail/' . $teamMember->feature_photo));
            }

            Session::flash('success', 'TeamMember deleted successfully!');
            return redirect(route('admin.team_member.index'));
        } else {
            Session::flash('error', 'Failed to delete product!');
            return redirect(route('admin.team_member.index'));
        }
    }

    /**
     * validation data
     * @return array
     */
    private function validateRequest()
    {
        return request()->validate([
            'name' => 'required|min:3',
            'designation' => 'required|min:2',
            'facebook' => 'required|min:2',
            'instagram' => 'required',
            'twitter' => 'required',
            'feature_photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    }

    /**
     * update validation data
     * @param $id
     * @return array
     */
    private function updateValidateRequest()
    {
        return request()->validate([
            'name' => 'required|min:3',
            'designation' => 'required|min:2',
            'facebook' => 'required|min:2',
            'instagram' => 'required',
            'twitter' => 'required',
            'feature_photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    }


}
