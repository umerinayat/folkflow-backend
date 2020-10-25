<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

use App\Repositories\Contracts\ICompany;




class CompaniesController extends Controller
{
    protected $companies;

    public function __construct(ICompany $companies)
    {
        $this->companies = $companies;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string'],
            'website' => 'string',
            'career_page_url' => 'string',
            'brand_color' => 'string',
            'logo' => ['mime:jpeg,gif,bmp,png', 'max:2048'],
            'thumbnail' => ['mime:jpeg,gif,bmp,png', 'max:2048'],
            'description' => 'string',
        ]);

        // get images files
        $logo = $request->file('logo');
        $thumbnail = $request->file('thumbnail');


        $logo_path = $logo->getPathName();
        $thumbnail_path = $thumbnail_path->getPathName();

        // get the original file name and replace any spaces with _
        $logoName = time(). '_' . preg_replace( '/\$+/', '_', strtolower( $logo->getClientOriginalName() ) );
        $thumbnailName = time(). '_' . preg_replace( '/\$+/', '_', strtolower( $thumbnail->getClientOriginalName() ) );

        // move the image files to the temp location
        $tempLogo = $image->storeAs('uploads', $logoName, 'temp');
        $tempThumbnail = $image->storeAs('uploads', $logoName, 'temp');

        


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
