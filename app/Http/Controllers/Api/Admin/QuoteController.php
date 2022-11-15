<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
// use App\Http\Requests\QuoteRequest;
use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return responseSuccess('quotes', Quote::get(['id', 'title', 'description']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  QuoteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $request->request->add(['user_id' => $user->id]);
        Quote::create($request->all());

        return responseSuccess('', '', 'Quote Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Quote $quote)
    {
        return responseSuccess('sections', $quote->sections);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  QuoteRequest  $request
     * @param  Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function update(QuoteRequest $request, Quote $quote)
    {
        $quote->update($request->except(['sections']));
        $this->QuoteectionSave($quote, $request->sections);

        return responseSuccess('', '', 'Quote Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quote $quote)
    {
        try {
            $quote->delete();
            $quote->sections()->delete();

            return responseSuccess('', '', 'Quote Deleted Successfully');
        } catch (\Throwable $th) {
            return responseError($th->getMessage(), 403);
        }
    }


}
