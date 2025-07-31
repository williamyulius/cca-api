<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MsClass;
use App\Models\MsStudent;
use App\Models\SetAcademicYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrStudentCoCurricularActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ['key' => request('key')];
        if($data['key']){
            $data = [
                'campus' => request('campus'),
                'student_id' => request('student_id')
            ];
            $academicYear = SetAcademicYear::where('status','=','1')->first();
            $getAcademicYear = $academicYear->academic_year; // Not Necessary untuk di store di dalam var Kalau tidak digunakan berulang kali
            $getSemester = $academicYear->semester; 
            
            // IF Better ganti ke switch case
            switch($data['campus']){
                CASE 'LAS': 
                    $student = MsStudent::where('student_id','=',$data['student_id'])->first();
                    $getUnit = $student->unit;
                    $getClass = $student->class;
                    
                    if($getUnit == 'SD'){
                        $getGroupClass = MsClass::where('code','=',$getClass)->first();
                        
                    }
                break;
                CASE 'LSS':
                    $student = MsStudent::where('student_id','=',$data['student_id'])->first();
                    $getUnit = $student->unit;
                    $getClass = $student->class;

                    if($getUnit == 'SD'){
                        $getGroupClass = MsClass::where('code','=',$getClass)->first();
                    } 
                break;
            }
            
            dd($getGroupClass);
            $getGroupCCAName = DB::table('set_groups')
                ->join('ms_groups', function ($join){
                    $join->on('set_groups.ms_group_id', '=', 'ms_groups.id')
                        ->on('set_groups.unit','=','ms_groups.unit')
                        ->on('set_groups.campus','=','ms_groups.campus');                        
                })
                ->where(function($query) use ($getUnit,$data,$getGroupClass,$getAcademicYear,$getSemester){
                    $query->where('set_groups.unit', '=', $getUnit);
                    $query->where('set_groups.campus','=',$data['campus']);
                    $query->where('set_groups.group','=',$getGroupClass->group);
                    $query->where('set_groups.academic_year','=',$getAcademicYear);
                    $query->where('set_groups.semester','=',$getSemester);
                })->first();
            // dd($getGroupCCAName);
            // $GroupCCAName = $getGroupCCAName->namagrup;
			$GroupCCAID = $getGroupCCAName->md_group_id;

            if(!!$GroupCCAID){ //
                $checkSchedule = DB::table('setjadwal')
                                ->where(function($query) use ($getUnit,$data,$getAcademicYear,$getSemester,$GroupCCAID){
                                    $query->where('unit','=',$getUnit);
                                    $query->where('campus','=',$data['campus']);
                                    $query->where('tahunajaran','=',$getAcademicYear);
                                    $query->where('semester','=',$getSemester);
                                    $query->where('status','=',1);
                                    $query->where('idmsgrupkelas','=',$GroupCCAID);
                                })->first();
                                // dd($checkSchedule);
                if(!!$checkSchedule && strtotime($checkSchedule->waktubuka) <= strtotime(date('Y-m-d H:i:s')) && strtotime($checkSchedule->waktututup) >= strtotime(date('Y-m-d H:i:s'))){
                    $checkTrsiswacca = DB::table('trsiswacca')
                                        ->join('mssubjectcca', function($join){
                                            $join->on('mssubjectcca.id_subject','=','trsiswacca.id_subject')
                                                ->on('mssubjectcca.unit','=','trsiswacca.unit')
                                                ->on('mssubjectcca.campus','=','trsiswacca.campus');
                                        })
                                        ->where(function($query) use ($getAcademicYear,$getSemester,$getUnit,$data,$getClassID){
                                            $query->where('tahunajaran','=',$getAcademicYear);
                                            $query->where('semester','=',$getSemester);
                                            $query->where('trsiswacca.unit','=',$getUnit);
                                            $query->where('trsiswacca.campus','=',$data['campus']);
                                            $query->where('id_kelas','=',$getClassID);
                                            $query->where('id_siswa','=',$data['student_id']);
                                        })->first();
                    if(!!$checkTrsiswacca && !!$checkTrsiswacca->idtrsiswacca){
                        // dd($checkTrsiswacca);
                        return response()->json([
                            'status'=>true,
                            'message'=>'Data ditemukan',
                            'data'=>$checkTrsiswacca
                        ],200);
                    } elseif(empty($checkTrsiswacca->idtrsiswacca)) {
                        $getSubjectCCA = DB::table('setsubjectcca')
                                        ->join('mssubjectcca',function($join){
                                            $join->on('mssubjectcca.id_subject','=','setsubjectcca.id_subject')
                                                ->on('mssubjectcca.unit','=','setsubjectcca.unit')
                                                ->on('mssubjectcca.campus','=','setsubjectcca.campus');
                                        })
                                        ->where(function($query) use ($getAcademicYear,$getSemester,$getUnit,$data, $GroupCCAID){
                                            $query->where('tahunajaran','=',$getAcademicYear);
                                            $query->where('semester','=',$getSemester);
                                            $query->where('setsubjectcca.unit','=',$getUnit);
                                            $query->where('setsubjectcca.campus','=',$data['campus']);
                                            $query->where('idmsgrupkelas','=',$GroupCCAID);
                                        })->get();

                        return response()->json([
                            'status'=>true,
                            'message'=>'Data ditemukan',
                            'data'=>$getSubjectCCA
                        ],200);
                    } else {
                        return response()->json([
                            'status'=>false,
                            'message'=>'Data Tidak ditemukan',
                        ],404);
                    }
                } else {
                    return response()->json([
                            'status'=>true,
                            'message'=>'Pemilihan CCA Telah Ditutup',
                        ],200);
                }
            }

        } else {
            return response()->json([
                'status'=>false,
                'message'=>'Data Tidak ditemukan',
            ],404);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
