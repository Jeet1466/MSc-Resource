<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        // Validate inputs
        $request->validate([
            'type' => 'required',
            'semester' => 'required',
            'file.*' => 'required|mimes:pdf,doc,docx|max:20480', // Max 20MB
            'password' => 'required',
        ]);

        // Password check
        if (!Hash::check($request->password, env('UPLOAD_PASSWORD_HASH'))){
            return back()->with('error', 'Invalid upload password.');
        }

        $type = $request->type; // syllabus, material, pyq
        $semester = $request->semester;

        if ($type === 'syllabus') {
            $directoryPath = public_path("$type/$semester/");
        } else {
            $request->validate([
                'subject' => 'required'
            ]);
            $subject = preg_replace('/[^A-Za-z0-9_\-]/', '_', $request->subject); // Clean subject name
            $directoryPath = public_path("$type/$semester/$subject/");
        }

        if (!file_exists($directoryPath)) {
            mkdir($directoryPath, 0777, true);
        }

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $file) {
                $fileName = uniqid() . '_' . $file->getClientOriginalName();
                $file->move($directoryPath, $fileName);
            }
        }

        return back()->with('success', 'Files uploaded successfully!');
    }

    public function showPYQ()
    {
        $resources = $this->listResources('pyq');
        return view('pyq', compact('resources'));
    }

    public function showSyllabus()
    {
        $resources = $this->listSyllabus();
        return view('syllabus', compact('resources'));
    }

    public function showMaterial()
    {
        $resources = $this->listResources('material');
        return view('material', compact('resources'));
    }

    private function listResources($type)
    {
        $resources = [];
        $path = public_path($type);

        if (file_exists($path)) {
            $semesters = scandir($path);
            foreach ($semesters as $semester) {
                if ($semester != '.' && $semester != '..') {
                    $semesterPath = $path . '/' . $semester;
                    if (is_dir($semesterPath)) {
                        $entries = scandir($semesterPath);
                        foreach ($entries as $entry) {
                            if ($entry != '.' && $entry != '..') {
                                $entryPath = $semesterPath . '/' . $entry;
                                if (is_dir($entryPath)) {
                                    // Subject folder
                                    $files = scandir($entryPath);
                                    foreach ($files as $file) {
                                        if ($file != '.' && $file != '..') {
                                            $resources[$semester][$entry][] = [
                                                'name' => pathinfo($file, PATHINFO_FILENAME),
                                                'url' => asset("$type/$semester/$entry/$file"),
                                            ];
                                        }
                                    }
                                } elseif (is_file($entryPath)) {
                                    // Direct file inside semester (no subject folder)
                                    $resources[$semester]['General'][] = [
                                        'name' => pathinfo($entry, PATHINFO_FILENAME),
                                        'url' => asset("$type/$semester/$entry"),
                                    ];
                                }
                            }
                        }
                    }
                }
            }
            // Optional: sort semesters
            ksort($resources);
        }

        return $resources;
    }

    private function listSyllabus()
    {
        $resources = [];
        $path = public_path('syllabus');

        if (file_exists($path)) {
            $semesters = scandir($path);
            foreach ($semesters as $semester) {
                if ($semester != '.' && $semester != '..') {
                    $semesterPath = $path . '/' . $semester;
                    if (is_dir($semesterPath)) {
                        $files = scandir($semesterPath);
                        foreach ($files as $file) {
                            if ($file != '.' && $file != '..') {
                                $resources[$semester][] = [
                                    'name' => pathinfo($file, PATHINFO_FILENAME),
                                    'url' => asset("syllabus/$semester/$file"),
                                ];
                            }
                        }
                    }
                }
            }
            // Optional: sort semesters
            ksort($resources);
        }

        return $resources;
    }
}
