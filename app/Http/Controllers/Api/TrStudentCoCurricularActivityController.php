<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SetSubjectCoCurricularActivityResource;
use App\Models\MsClass;
use App\Models\MsStudent;
use App\Models\SetAcademicYear;
use App\Models\SetGroup;
use App\Models\SetSchedule;
use App\Models\SetSubjectCoCurricularActivity;
use App\Models\TrStudentCoCurricularActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator as FacadesValidator;

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
                    if(!$student){
                        return response()->json([
                            'status'=>true,
                            'message'=>'Siswa tidak ditemukan',
                        ],404);
                    }
                    $getStudentUnit = $student->unit;
                    $getStudentClass = $student->class;
                    $getStudentId = $student->id;
                    
                    if($getStudentUnit == 'SD'){
                        $getClass = MsClass::where('code','=',$getStudentClass)->first();
                        $getStudentClassId = $getClass->id;
                    }
                break;
                CASE 'LSS':
                    $student = MsStudent::where('student_id','=',$data['student_id'])->first();
                    $getStudentUnit = $student->unit;
                    $getStudentClass= $student->class;
                    $getStudentId = $student->id;

                    if($getStudentUnit == 'SD'){
                        $getClass = MsClass::where('code','=',$getStudentClass)->first();
                        $getStudentClassId = $getClass->id;
                    } 
                break;
            }
            // Join tidak perlu column lain karna id sudah unique
            $getGroup = SetGroup::join('ms_groups', function ($join){
                    $join->on('set_groups.ms_group_id', '=', 'ms_groups.id');
                })
                ->where('set_groups.unit', '=', $getStudentUnit)
                ->where('set_groups.campus','=',$data['campus'])
                ->where('set_groups.group','=',$getClass->group)
                ->where('set_groups.academic_year','=',$getAcademicYear)
                ->where('set_groups.semester','=',$getSemester)
                ->first();
            // dd($getGroupCCAName);
            // $GroupCCAName = $getGroupCCAName->namagrup;
			$getGroupId = $getGroup->ms_group_id;

            if(!!$getGroupId){ //
                
                $checkSchedule = SetSchedule::where('unit','=',$getStudentUnit)
                        ->where('campus','=',$data['campus'])
                        ->where('academic_year','=',$getAcademicYear)
                        ->where('semester','=',$getSemester)
                        ->where('status','=',1)
                        ->where('ms_group_id','=',$getGroupId)
                        ->first();

                if(!!$checkSchedule && strtotime($checkSchedule->enrollment_start_date) <= strtotime(date('Y-m-d H:i:s')) && strtotime($checkSchedule->enrollment_end_date) >= strtotime(date('Y-m-d H:i:s'))){
                    
                    $getTrStudentCoCurricularActivity = TrStudentCoCurricularActivity::join('ms_subject_co_curricular_activities', function($join){
                        $join->on('ms_subject_co_curricular_activities.id','=','tr_student_co_curricular_activities.ms_subject_co_curricular_activity_id')
                            ->on('ms_subject_co_curricular_activities.unit','=','tr_student_co_curricular_activities.unit')
                            ->on('ms_subject_co_curricular_activities.campus','=','tr_student_co_curricular_activities.campus');
                        })
                        ->where('academic_year','=',$getAcademicYear)
                        ->where('semester','=',$getSemester)
                        ->where('tr_student_co_curricular_activities.unit','=',$getStudentUnit)
                        ->where('tr_student_co_curricular_activities.campus','=',$data['campus'])
                        ->where('ms_class_id','=',$getStudentClassId)
                        ->where('ms_student_id','=',$getStudentId)
                        ->first();
                    // dd($getTrStudentCoCurricularActivity);
                    if(!!$getTrStudentCoCurricularActivity && !!$getTrStudentCoCurricularActivity->id){
                        return response()->json([
                            'status'=>true,
                            'message'=>'Data ditemukan',
                            'data'=>$getTrStudentCoCurricularActivity
                        ],200);
                    } elseif(empty($getTrStudentCoCurricularActivity->id)) {
                        $getSetSubjectCoCurricularActivity = SetSubjectCoCurricularActivity::
                            where('academic_year','=',$getAcademicYear)
                            ->where('semester','=',$getSemester)
                            ->where('set_subject_co_curricular_activities.unit','=',$getStudentUnit)
                            ->where('set_subject_co_curricular_activities.campus','=',$data['campus'])
                            ->where('ms_group_id','=',$getGroupId)
                            ->get();
                        $output = SetSubjectCoCurricularActivityResource::collection($getSetSubjectCoCurricularActivity);

                        return response()->json([
                            'status'=>true,
                            'message'=>'Data ditemukan',
                            'data'=> $output
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
        $rules = [
            'campus'=>'required',
            'student_id'=>'required',
            'code'=>'required',
        ];

        $validator = FacadesValidator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json([
                'status'=>false,
                'message'=>'Data tidak sesuai',
                'data'=>$validator->errors(),
            ]);
        }

        $academicYear = SetAcademicYear::where('status','=','1')->first();
        $getAcademicYear = $academicYear->academic_year; // Not Necessary untuk di store di dalam var Kalau tidak digunakan berulang kali
        $getSemester = $academicYear->semester; 
        
        // IF Better ganti ke switch case
        switch($request->campus){
            CASE 'LAS': 
                $student = MsStudent::where('student_id','=',$request->student_id)->first();
                if(!$student){
                    return response()->json([
                        'status'=>true,
                        'message'=>'Siswa tidak ditemukan',
                    ],404);
                }
                $getStudentUnit = $student->unit;
                $getStudentClass = $student->class;
                $getStudentId = $student->id;
                
                if($getStudentUnit == 'SD'){
                    $getClass = MsClass::where('code','=',$getStudentClass)->first();
                    $getStudentClassId = $getClass->id;
                }
            break;
            CASE 'LSS':
                $student = MsStudent::where('student_id','=',$request->student_id)->first();
                $getStudentUnit = $student->unit;
                $getStudentClass= $student->class;
                $getStudentId = $student->id;

                if($getStudentUnit == 'SD'){
                    $getClass = MsClass::where('code','=',$getStudentClass)->first();
                    $getStudentClassId = $getClass->id;
                } 
            break;
        }
        // Join tidak perlu column lain karna id sudah unique
        $getGroup = SetGroup::join('ms_groups', function ($join){
                $join->on('set_groups.ms_group_id', '=', 'ms_groups.id');
            })
            ->where('set_groups.unit', '=', $getStudentUnit)
            ->where('set_groups.campus','=',$request->campus)
            ->where('set_groups.group','=',$getClass->group)
            ->where('set_groups.academic_year','=',$getAcademicYear)
            ->where('set_groups.semester','=',$getSemester)
            ->first();
        // dd($getGroupCCAName);
        // $GroupCCAName = $getGroupCCAName->namagrup;
        $getGroupId = $getGroup->ms_group_id;

        if(!!$getGroupId){ //
            
            $checkSchedule = SetSchedule::where('unit','=',$getStudentUnit)
                    ->where('campus','=',$request->campus)
                    ->where('academic_year','=',$getAcademicYear)
                    ->where('semester','=',$getSemester)
                    ->where('status','=',1)
                    ->where('ms_group_id','=',$getGroupId)
                    ->first();

            if(!!$checkSchedule && strtotime($checkSchedule->enrollment_start_date) <= strtotime(date('Y-m-d H:i:s')) && strtotime($checkSchedule->enrollment_end_date) >= strtotime(date('Y-m-d H:i:s'))){
                
                $getTrStudentCoCurricularActivity = TrStudentCoCurricularActivity::join('ms_subject_co_curricular_activities', function($join){
                    $join->on('ms_subject_co_curricular_activities.id','=','tr_student_co_curricular_activities.ms_subject_co_curricular_activity_id')
                        ->on('ms_subject_co_curricular_activities.unit','=','tr_student_co_curricular_activities.unit')
                        ->on('ms_subject_co_curricular_activities.campus','=','tr_student_co_curricular_activities.campus');
                    })
                    ->where('academic_year','=',$getAcademicYear)
                    ->where('semester','=',$getSemester)
                    ->where('tr_student_co_curricular_activities.unit','=',$getStudentUnit)
                    ->where('tr_student_co_curricular_activities.campus','=',$request->campus)
                    ->where('ms_class_id','=',$getStudentClassId)
                    ->where('ms_student_id','=',$getStudentId)
                    ->first();
                // dd($getTrStudentCoCurricularActivity);
                if(!!$getTrStudentCoCurricularActivity && !!$getTrStudentCoCurricularActivity->id){
                    return response()->json([
                        'status'=>true,
                        'message'=>'Siswa sudah memilih CCA',
                        'data'=>$getTrStudentCoCurricularActivity
                    ],200);
                } elseif(empty($getTrStudentCoCurricularActivity->id)) {
                    // Check quota
                    // $getUsedQuota = DB::table('trsiswacca')->selectRaw('COUNT(idtrsiswacca) as kuotaterpakai')
                    //     ->join('setsubjectcca', function($join){
                    //         $join->on('setsubjectcca.id_subject','=','trsiswacca.id_subject')
                    //         ->on('setsubjectcca.unit','=','trsiswacca.unit')
                    //         ->on('setsubjectcca.campus','=','trsiswacca.campus')
                    //         ->on('setsubjectcca.idmsgrupkelas','=','trsiswacca.idmsgrupkelas');
                    //     })
                    //     ->where(function($query) use ($getAcademicYear,$getSemester,$getUnit,$request,$GroupCCAID){
                    //         $query->where('trsiswacca.tahunajaran','=',$getAcademicYear);
                    //         $query->where('trsiswacca.semester','=',$getSemester);
                    //         $query->where('trsiswacca.unit','=',$getUnit);
                    //         $query->where('trsiswacca.campus','=',$request->campus);
                    //         $query->where('trsiswacca.idmsgrupkelas','=',$GroupCCAID);
                    //         $query->where('trsiswacca.id_subject','=',$request->cca);
                    //     })->first();
                    $getUsedQuota = DB::table('tr_student_co_curricular_activities')->selectRaw('COUNT(tr_student_co_curricular_activities.id) as used_quota')
                        ->join('set_subject_co_curricular_activities', function($join){
                            $join->on('set_subject_co_curricular_activities.ms_subject_co_curricular_activity_id','=','tr_student_co_curricular_activities.ms_subject_co_curricular_activity_id')
                            ->on('set_subject_co_curricular_activities.unit','=','tr_student_co_curricular_activities.unit')
                            ->on('set_subject_co_curricular_activities.campus','=','tr_student_co_curricular_activities.campus')
                            ->on('set_subject_co_curricular_activities.ms_group_id','=','tr_student_co_curricular_activities.ms_group_id');
                        })
                        ->where('tr_student_co_curricular_activities.academic_year','=',$getAcademicYear)
                        ->where('tr_student_co_curricular_activities.semester','=',$getSemester)
                        ->where('tr_student_co_curricular_activities.unit','=',$getStudentUnit)
                        ->where('tr_student_co_curricular_activities.campus','=',$request->campus)
                        ->where('tr_student_co_curricular_activities.ms_group_id','=',$getGroupId)
                        ->where('tr_student_co_curricular_activities.ms_subject_co_curricular_activity_id','=',$request->code)
                        ->first();
                    // dd($getUsedQuota);
                    // $getQuota = DB::table('setsubjectcca')
                    //     ->where(function($query) use ($getAcademicYear,$getSemester,$getUnit,$request,$GroupCCAID){
                    //         $query->where('idmsgrupkelas','=',$GroupCCAID);
                    //         $query->where('id_subject','=',$request->cca);
                    //         $query->where('tahunajaran','=',$getAcademicYear);
                    //         $query->where('semester','=',$getSemester);
                    //         $query->where('unit','=',$getUnit);
                    //         $query->where('campus','=',$request->campus);
                    //     })->first();
                    $getQuota = DB::table('set_subject_co_curricular_activities')
                            ->where('ms_group_id','=',$getGroupId)
                            ->where('ms_subject_co_curricular_activity_id','=',$request->code)
                            ->where('academic_year','=',$getAcademicYear)
                            ->where('semester','=',$getSemester)
                            ->where('unit','=',$getStudentUnit)
                            ->where('campus','=',$request->campus)
                            ->first();
                    $quota = $getQuota->quota;
                    // dd($getQuota);
                    if($quota <= $getUsedQuota->used_quota){
                        $getQuota->status = 'Full';
                        $getQuota->save();
                        
                        return response()->json([
                            'status'=>true,
                            'message'=>'Quota Full',
                            'data'=>$getQuota
                        ],200);
                    } elseif($quota > $getUsedQuota->used_quota){
                        TrStudentCoCurricularActivity::create([
                            'ms_subject_co_curricular_activity_id'=>$request->code,
                            'ms_student_id'=>$getStudentId,
                            'ms_class_id'=>$getStudentClass,
                            'ms_group_id'=>$getGroupId,
                            'semester'=>$getSemester,
                            'academic_year'=>$getAcademicYear,
                            'unit'=>$getStudentUnit,
                            'campus'=>$request->campus,
                        ]);
                        // $model = new TrStudentCoCurricularActivity;
                        // $model->ms_subject_co_curricular_activity_id = $request->code;
                        // $model->ms_student_id = $getStudentId;
                        // $model->ms_class_id = $getStudentClassId;
                        // $model->semester = $getSemester;
                        // $model->academic_year = $getAcademicYear;
                        // $model->ms_group_id = $getGroupId;
                        // $model->unit = $getStudentUnit;
                        // $model->campus = $request->campus;

                        // $model->save();

                        return response()->json([
                            'status'=>true,
                            'message'=>'CCA Berhasil diambil',
                            // 'data'=>$model
                        ],200);
                    } else {
                        return response()->json([
                            'status'=>false,
                            'message'=>'Gagal mengambil CCA'
                        ],503);
                    }
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
