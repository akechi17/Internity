<?php

namespace App\Http\Controllers;

use App\Models\Appliance;
use Illuminate\Http\Request;
use App\Http\Requests\StoreApplianceRequest;
use App\Http\Requests\UpdateApplianceRequest;

class ApplianceController extends Controller
{
    private function getData($vacancy, $search=null, $status=null, $sort=null)
    {
        $appliances = Appliance::where('vacancy_id', $vacancy)
            ->when($search, function ($query, $search) {
                return $query->search($search);
            })
            ->when($status, function ($query, $status) {
                return $query->status($status);
            })
            ->when($sort, function ($query, $sort) {
                if ($sort[0] == '-') {
                    $sort = substr($sort, 1);
                    $sortType = 'desc';
                } else {
                    $sortType = 'asc';
                }
                return $query->orderBy($sort, $sortType);
            })
            ->paginate(10);

        $appliances->withPath('/appliances')->withQueryString();

        if ($appliances->count() > 0) {
            $context = [
                'status' => true,
                'message' => 'Data peralatan ditemukan',
                'data' => $appliances,
            ];
        } else {
            $context = [
                'status' => false,
                'message' => 'Data peralatan tidak ditemukan',
                'data' => $appliances,
            ];
        }

        return $context;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $vacancy = decrypt($request->query('vacancy'));
        $search = $request->query('search');
        $status = $request->query('status');
        $sort = $request->query('sort');

        $context = $this->getData($vacancy, $search, $status, $sort);

        return response()->json($context);
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
     * @param  \App\Http\Requests\StoreApplianceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreApplianceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = decrypt($id);
        try {
            $appliance = Appliance::findOrFail($id);
            $context = [
                'status' => true,
                'message' => 'Data ditemukan',
                'data' => $appliance,
            ];
        } catch (\Exception $e) {
            $context = [
                'status' => false,
                'message' => 'Data tidak ditemukan',
                'data' => null,
            ];
        }

        return view('appliances.show', $context);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = decrypt($id);
        $this->validate($request, [
            'status' => 'required|in:pending,accepted,rejected',
            'message' => 'nullable|string',
        ]);

        try {
            $appliance = Appliance::findOrFail($id);
            $appliance->update([
                'status' => $request->status,
                'message' => $request->message,
            ]);
            $context = [
                'status' => true,
                'message' => 'Data berhasil diperbarui',
                'data' => $appliance,
            ];

            return back()->with($context);
        } catch (\Exception $e) {
            $context = [
                'status' => false,
                'message' => 'Data tidak ditemukan',
                'data' => null,
            ];

            return back()->with($context);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appliance  $appliance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appliance $appliance)
    {
        //
    }
}
