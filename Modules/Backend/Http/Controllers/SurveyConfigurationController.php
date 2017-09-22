<?php
namespace Modules\Backend\Http\Controllers;

use App\Models\Configuration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class SurveyConfigurationController extends BaseController
{
    public function setConfig(Request $request)
    {
        if($request->isMethod('get'))
        {
            $status = Configuration::getCurrentStatus();
            return view('backend::surveyConfiguration.surveyConfiguration',[ 'status' => $status ]);
        }
        $messages = [
            'status.required' => 'Option value cannot be null',
            'status.numeric'  => 'Option value must be integer',
            'status.min'      => 'Option value must be 0 or 1',
            'status.max'      => 'Option value must be 0 or 1',
        ];
        $validator = Validator::make($request->all(), [
            'status'  => 'required|integer|min:0|max:1'],
            $messages);
        if ($validator->fails()) {
            return redirect('/admin/survey-configuration/set')
                ->withErrors($validator)
                ->withInput();
        }
        try {
            $status = $request->input('status');
            Configuration::setConfig($status);
            return redirect('/admin/survey-configuration/set');
        } catch (QueryException $e) {
            DB::rollback();
            Log::error('Exception: ' . $e->getMessage());
            return redirect('/admin/survey-configuration/set')->with(array(
                'message' => 'Validate failed, try again, please!'
            ));
        }
    }

}