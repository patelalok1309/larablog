<?php

namespace App\Http\Controllers;

use App\Models\SiteOption;
use Hamcrest\Arrays\IsArray;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function Ramsey\Uuid\v1;

class SiteOptionController extends Controller
{
    // Index for site settings
    public function index()
    {
        return view('backpanel.settings.index');
    }


    // Store settings
    public function store(Request $request)
    {

        $options = [
            'site_name',
            'site_email',
            'site_logo',
            'site_phone',
            'site_description',
            'site_social_links',
            'site_owner_bio',
            'site_owner_social_links',
            'copyright_text',
            'site_owner_avatar'
        ];

        $this->saveSiteSetting($request, $options);

        return redirect()->route('setting.index')->with('success', 'Setting Saved');
    }

    private function saveSiteSetting(Request $request, array $options)
    {
        foreach ($options as $option_name) {

            $siteOption = SiteOption::where('option_name', $option_name)->first();
            $request_option_values = $request->{$option_name};

            if ($request_option_values !== null) {
                if (is_array($request_option_values)) {
                    // save array to db
                    $siteOption->option_value = serialize($request_option_values);
                } elseif ($request->hasFile($option_name)) {
                    // save file
                    $file = $request->file($option_name);
                    Storage::disk('own')->put($file->getClientOriginalName(), file_get_contents($file));
                    $siteOption->option_value = $file->getClientOriginalName();
                } else {
                    //  save simple text
                    $siteOption->option_value = $request_option_values;
                }
            }

            $siteOption->save();
        }
    }
}
