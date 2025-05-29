<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return Inertia::render('Admin/Slider/Index', [
            'sliders' => $sliders
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Slider/Create');
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'name' => ['required', 'max:255'],
            'price' => 'required',
            'description' => 'required',
            'image' => ['required', 'file', 'max:3072', 'mimes:jpeg,jpg,png,webp'],
            'status' => 'nullable|boolean'
        ]);

        $fields['status'] = $fields['status'] ?? 0;

        if ($request->hasFile('image')) {
            $fields['image'] = $request->file('image')->store('images/sliders', 'public');
        }

        Slider::create($fields);

        return redirect()->route('sliders.index')->with('success', 'Slider created successfully.');
    }

    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return Inertia::render('Admin/Slider/Edit', [
            'slider' => $slider
        ]);
    }

    public function update(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);

        $fields = $request->validate([
            'name' => ['required', 'max:255'],
            'price' => 'required',
            'description' => 'required',
            'image' => ['nullable', 'file', 'max:3072', 'mimes:jpeg,jpg,png,webp'],
            'status' => 'nullable|boolean'
        ]);

        $fields['status'] = $fields['status'] ?? 0;

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($slider->image && Storage::disk('public')->exists($slider->image)) {
                Storage::disk('public')->delete($slider->image);
            }
            $fields['image'] = $request->file('image')->store('images/sliders', 'public');
        } else {
            // Keep the existing image if no new image is uploaded
            $fields['image'] = $slider->image;
        }

        $slider->update($fields);

        return redirect()->route('sliders.index')->with('success', 'Slider updated successfully.');
    }

    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);

        if ($slider->image && Storage::disk('public')->exists($slider->image)) {
            Storage::disk('public')->delete($slider->image);
        }

        $slider->delete();

        return redirect()->route('sliders.index')->with('success', 'Slider deleted successfully.');
    }
}