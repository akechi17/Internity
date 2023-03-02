<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vacancy;
use App\Models\Appliance;
use Illuminate\Http\Request;
use App\Http\Requests\StoreApplianceRequest;
use App\Http\Requests\UpdateApplianceRequest;

class ApplianceController extends Controller
{
    private function getData($vacancy, $search=null, $status=null, $sort=null)
    {
        $appliances = Appliance::with(['user', 'vacancy'])
            ->where('vacancy_id', $vacancy);
        if ($search) {
            $appliances = $appliances->whereHas('user', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            });
        }
        if ($status) {
            $appliances = $appliances->where('status', $status);
        }
        if ($sort) {
            if ($sort[0] == '-') {
                $sort = substr($sort, 1);
                $sortType = 'desc';
            } else {
                $sortType = 'asc';
            }
            $appliances = $appliances->orderBy($sort, $sortType);
        }
        $appliances = $appliances->paginate(10);

        $appliances->withPath('/appliances')->withQueryString();

        if ($appliances->count() > 0) {
            $context = [
                'status' => true,
                'message' => 'Data peralatan ditemukan',
                'appliances' => $appliances,
                'vacancy' => Vacancy::where('id', $vacancy)->first(),
                'pagination' => $appliances->links()->render(),
            ];
        } else {
            $context = [
                'status' => false,
                'message' => 'Data peralatan tidak ditemukan',
                'appliances' => $appliances,
                'vacancy' => Vacancy::where('id', $vacancy)->first(),
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
        $vacancyId = $request->query('vacancy');
        ! $vacancyId ? abort(404) : $vacancyId = decrypt($vacancyId);

        $search = $request->query('search');
        $status = $request->query('status');
        $sort = $request->query('sort');

        $context = $this->getData($vacancyId, $search, $status, $sort);

        return view('appliances.index', $context);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $vacancyId = $request->query('vacancy');
        ! $vacancyId ? abort(404) : $vacancyId = decrypt($vacancyId);

        return view('appliances.create', compact('vacancyId'));
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
            'vacancy_id' => 'required|exists:vacancies,id',
            'user_id' => 'required|exists:users,id',
            'resume' => 'file|mimes:pdf,doc,docx|max:2048',
            'status' => 'required|in:pending,accepted,rejected',
            'message' => 'nullable|string',
        ]);

        try {
            $resume = $request->file('resume');
            $resumeName = time() . '_' . $resume->getClientOriginalName();
            $resume->move(storage_path('app/public/resumes'), $resumeName);

            $appliance = Appliance::create([
                'vacancy_id' => $request->vacancy_id,
                'user_id' => $request->user_id,
                'resume' => $resumeName,
                'status' => $request->status,
                'message' => $request->message,
            ]);

            $context = [
                'status' => true,
                'message' => 'Data berhasil ditambahkan',
                'data' => $appliance,
            ];

            return redirect()->route('appliances.show', encrypt($appliance->id))->with($context);
        } catch (\Exception $e) {
            $context = [
                'status' => false,
                'message' => 'Data gagal ditambahkan',
                'data' => null,
            ];

            return redirect()->route('appliances.index', encrypt($request->vacancy_id))->with($context);
        }
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
        $id = decrypt($id);
        try {
            $appliance = Appliance::findOrFail($id);
            $context = [
                'status' => true,
                'message' => 'Data ditemukan',
                'data' => $appliance,
            ];

            return view('appliances.edit', $context);
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
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = decrypt($id);
        try {
            $appliance = Appliance::findOrFail($id);
            $appliance->delete();
            $context = [
                'status' => true,
                'message' => 'Data berhasil dihapus',
                'data' => $appliance,
            ];
        } catch (\Exception $e) {
            $context = [
                'status' => false,
                'message' => 'Data tidak ditemukan',
                'data' => null,
            ];
        }

        return back()->with($context);
    }

    public function accept($id)
    {
        $id = decrypt($id);
        try {
            $appliance = Appliance::findOrFail($id);
            $appliance->update([
                'status' => 'accepted',
            ]);
            $user = User::findOrFail($appliance->user_id);
            $user->companies()->attach($appliance->vacancy->company_id);
            $user->internDates()->create([
                'company_id' => $appliance->vacancy->company_id,
            ]);

            $context = [
                'status' => true,
                'message' => 'Data berhasil diperbarui',
                'data' => $appliance,
            ];
        } catch (\Exception $e) {
            $context = [
                'status' => false,
                'message' => 'Data tidak ditemukan',
                'data' => null,
            ];
        }

        return back()->with($context);
    }

    public function reject($id)
    {
        $id = decrypt($id);
        try {
            $appliance = Appliance::findOrFail($id);
            $appliance->update([
                'status' => 'rejected',
            ]);
            $user = User::findOrFail($appliance->user_id);
            if ($user->companies()->where('company_id', $appliance->vacancy->company_id)->exists()) {
                $user->companies()->detach($appliance->vacancy->company_id);
            }
            if ($user->internDates()->where('company_id', $appliance->vacancy->company_id)->exists()) {
                $user->internDates()->where('company_id', $appliance->vacancy->company_id)->delete();
            }
            $context = [
                'status' => true,
                'message' => 'Data berhasil diperbarui',
                'data' => $appliance,
            ];
        } catch (\Exception $e) {
            $context = [
                'status' => false,
                'message' => 'Data tidak ditemukan',
                'data' => null,
            ];
        }

        return back()->with($context);
    }
}
