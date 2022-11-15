<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Fee;
use App\Models\Exam;
use App\Models\User;
use App\Models\Student;
use App\Models\Calendar;
use App\Models\Guardian;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Resources\Parent\ParentFeesResource;
use App\Models\Quote;

class AdminController extends Controller
{
    public function getDashboardOverview()
    {
        $students = Student::whereSessionId(currentSession())->get();
        $total_student = $students->count();
        $total_parent = Guardian::whereSessionId(currentSession())->count();
        $total_teacher = Role::whereName('Teacher')->first()->users()->count();
        $total_staff = User::whereRole('staff')->count() - $total_teacher;
        $total_exam = Exam::whereSessionId(currentSession())->count();
        $total_event = Calendar::count();
        $male_student = $students->where('gender', 'male')->count();
        $female_student = $students->where('gender', 'female')->count();
        $male_student_percentage =  $male_student && $total_student ? round(($male_student / $total_student) * 100):1;
        $female_student_percentage =  $male_student && $total_student && $female_student ? 100 - $male_student_percentage:0;
        $transactions = Transaction::whereSessionId(currentSession())->get();
        $quote = Quote::inRandomOrder()->first();

        $total_income = (abs($transactions->where('type', 'income')->sum('amount'))>0) ? number_format($transactions->where('type', 'income')->sum('amount')) : 0;
        $total_expense = (abs($transactions->where('type', 'expense')->sum('amount'))>0) ? number_format($transactions->where('type', 'expense')->sum('amount')) : 0;
        return response()->json([
            'overview' => [
                'total_student' => number_format($total_student),
                'total_parent' => number_format($total_parent),
                'total_teacher' => number_format($total_teacher),
                'total_staff' => number_format($total_staff),
                'total_exam' => number_format($total_exam),
                'total_event' => number_format($total_event),
                'total_income' => $total_income,
                'total_expense' => $total_expense,
                'quote' => $quote,
            ],
            'students_type' => [
                'male_student' => $male_student,
                'female_student' => $female_student,
                'male_student_percentage' => $male_student_percentage,
                'female_student_percentage' => $female_student_percentage,
            ]
        ], 200);
    }

    public function getDashboardDuefees($class_id)
    {
        $duefees = Fee::with('student.user', 'type', 'class', 'section')
            ->whereSessionId(currentSession())
            ->whereClassId($class_id)
            ->whereStatus(0)
            ->take(5)
            ->get();

        return ParentFeesResource::collection($duefees);
    }

    public function getDashboardIncomeExpenseChart()
    {
        $income_chats = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        $expense_chats = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

        for ($i = 0; $i < 12; $i++) {
            $income_chats[$i] = (int)Transaction::select('amount')
                ->whereSessionId(currentSession())
                ->whereType('income')
                ->whereYear('created_at', date('Y'))
                ->whereMonth('created_at', $i + 1)
                ->sum('amount');

            $expense_chats[$i] = (int)Transaction::select('amount')
                ->whereSessionId(currentSession())
                ->whereType('expense')
                ->whereYear('created_at', date('Y'))
                ->whereMonth('created_at', $i + 1)
                ->sum('amount');
        }

        return response()->json([
            'income' => $income_chats,
            'expense' => $expense_chats,
        ]);
    }

    public function getAdmin($admin)
    {
        $user = User::whereRole('admin')->find($admin);

        return response()->json([
            'user' => $user,
        ]);
    }
}
