<?php

namespace App\Http\Controllers\BackEnd;

use App\Helpers\Common;
use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * @return View
 */
class SlidersController extends Controller
{
    /**
     *  go to sliders table screen
     *
     *  @param Illuminate\Http\Request $request
     */
    public function index(Request $request)
    {
        $sliders = Slider::select('id', 'name', 'href', 'description', 'thumbnail', 'status', 'created_at')
            ->where('name', 'LIKE', '%' . $request->search . '%')
            ->orderBy('created_at', 'DESC')
            ->paginate(10);
        return view('backend.sliders.index', compact('sliders'));
    }

    /**
     *  add a slider to the sliders table
     *
     *  @param App\Http\Requests\SliderRequest $request
     *  @return \Illuminate\Http\Response
     */
    public function create(SliderRequest $request)
    {
        DB::beginTransaction();
        try {
            $slider = Slider::select(
                'id',
                'name',
                'href',
                'description',
                'thumbnail',
                'user_id',
                'status',
            )->where('name', $request->name)->first();

            // slider exist
            if ($slider !== null) {
                return response()->json(['success' => false, 'errors' => 'slider đã tồn tại!'], 400);
            }

            // check if the user has edited the thumbnail
            if ($request->hasFile('thumbnail')) {
                // save the thumbnail to storage and return the path
                $file = $request->file('thumbnail');
                $thumbnail = Common::uploadImage($file, 'sliders/' . Str::random(25) . '.' . $file->getClientOriginalExtension());
                // update new path to db
                $request->thumbnail = 'storage/' . $thumbnail;
            };
            $href = '';
            if (empty($request->input('href'))) {
                $href = '';
            } else {
                $href = $request->input('href');
            }
            // add new slider
            Slider::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'href'  => $href,
                'thumbnail' => $request->thumbnail,
                'user_id' => $request->input('user_id'),
                'status' => $request->input('status'),
            ]);
            DB::commit();
            return response()->json(['success' => true], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'errors' => $e], 500);
        }
    }

    /**
     *  go to get slider detail
     *
     *  @param Illuminate\Http\Request $request
     *  @return \Illuminate\Http\Response
     */
    public function detail(Request $request)
    {
        $slider = Slider::select(
            'id',
            'name',
            'description',
            'href',
            'thumbnail',
            'user_id',
            'status',
        )->where('id', $request->id)->first();
        // slider not exist
        if ($slider === null) {
            return response()->json(['success' => false, 'errors' => 'slider ko tồn tại!'], 400);
        }
        return response()->json(['success' => true, 'slider' => $slider], 200);;
    }

    /**
     *  update Slider
     *
     *  @param App\Http\Requests\SliderRequest $request
     *  @return \Illuminate\Http\Response
     */
    public function update(SliderRequest $request)
    {
        DB::beginTransaction();
        try {

            $sliderCheck = Slider::select(
                'id',
                'name',
                'description',
                'href',
                'thumbnail',
                'user_id',
                'status',
            )
                ->where('id', '!=', $request->id)
                ->where('name', $request->name)
                ->first();

            // slider exist
            if ($sliderCheck != null) {
                return response()->json(['success' => false, 'errors' => 'slider đã tồn tại!'], 400);
            }

            // get the slider to update
            $slider = Slider::select(
                'id',
                'name',
                'description',
                'href',
                'thumbnail',
                'user_id',
                'status',
            )->where('id', $request->id)->first();

            // slider not exist
            if ($slider == null) {
                return response()->json(['success' => false, 'errors' => 'slider ko tồn tại!'], 400);
            }

            // update slider
            $slider->name = $request->input('name');
            $slider->description = $request->input('description');
            if (empty($request->input('href'))) {
                $slider->href = '';
            } else {
                $slider->href = $request->input('href');
            }
            if ($request->user_id && $request->user_id != $slider->user_id) {
                $slider->user_id = $request->input('user_id');
            }
            $slider->status = $request->input('status');
            // check if the user has edited the thumbnail
            if ($request->hasFile('thumbnail')) {
                // save the thumbnail to storage and return the path
                $file = $request->file('thumbnail');
                $thumbnail = Common::uploadImage($file, 'sliders/' . Str::random(25) . '.' . $file->getClientOriginalExtension(), $slider->thumbnail);
                // update new path to db
                $slider->thumbnail = 'storage/' . $thumbnail;
            };
            $slider->save();
            DB::commit();
            return response()->json(['success' => true, 'slider' => $slider], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back();
        }
    }
    /**
     *  delete slider
     *
     *  @param Illuminate\Http\Request $request
     *  @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        DB::beginTransaction();
        try {
            $slider =  Slider::select(
                'id',
                'name',
                'href',
                'description',
                'thumbnail',
                'status',
                'created_at'
            )
                ->where('id', $request->id)
                ->first();
            // slider not exist
            if ($slider === null) {
                return response()->json(['success' => false, 'errors' => 'slider ko tồn tại!'], 400);
            }
            $slider->delete();
            DB::commit();
            return response()->json(['success' => true], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'errors' => $e], 500);
        }
    }
}
