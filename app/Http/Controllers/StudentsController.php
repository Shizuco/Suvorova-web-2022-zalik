<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Repositories\StudentRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Response;

class StudentsController extends Controller
{
    private $studentRepository;

    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function index(Request $request)
    {
        $students = $this->studentRepository->all();

        return view('students.index')
            ->with('students', $students);
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(CreateStudentRequest $request)
    {
        $input = $request->all();
        $student = $this->studentRepository->create($input);
        return redirect(route('students.index'));
    }

    public function show($id)
    {
        $student = $this->studentRepository->find($id);

        if (empty($student)) {
            return response([
                'message' => "Not found",
            ], HttpResponse::HTTP_NOT_FOUND);
        }
        $response = response([
            'data' => $student,
        ], HttpResponse::HTTP_OK);
        return $response;
    }

    public function edit($id)
    {
        $student = $this->studentRepository->find($id);

        if (empty($student)) {

            return redirect(route('students.index'));
        }

        return view('students.edit')->with('student', $student);
    }

    public function update($id, UpdateStudentRequest $request)
    {
        $student = $this->studentRepository->find($id);

        if (empty($student)) {

            return redirect(route('students.index'));
        }

        $student = $this->studentRepository->update($request->all(), $id);

        $response = response([
            'data' => $student,
        ], HttpResponse::HTTP_OK);
        return $response;
    }

    public function destroy($id)
    {
        $student = $this->studentRepository->find($id);

        if (empty($student)) {
            return response([
                'message' => "Not found",
            ], HttpResponse::HTTP_NOT_FOUND);
        }

        $this->studentRepository->delete($id);

        $response = Response([
            'data' => $student,
        ], HttpResponse::HTTP_OK);

        return $response;
    }
}
