<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ItemsImport;
use App\Imports\ItemsImportp2;
use App\Imports\ItemsImportp3;
use App\Imports\ItemsImportp4;
use App\Imports\ItemsImportp5;
use App\Imports\ItemsImportp6;
use App\Imports\ItemsImportp7;
use App\Imports\ItemsImportp8;
use App\Imports\ItemsImportp9;
use App\Imports\ItemsImportp10;
use App\Imports\ItemsImportp11;
use App\Imports\ItemsImportp12;
use App\Imports\ItemsImportp13;

class ItemsController extends Controller{
    public function adminDashboard()
    {
        // استرجاع جميع الموظفين من قاعدة البيانات
        $employees = DB::table('users')->where('role', 'employee')->get();
    
        // اسم المستخدم الحالي
        $name = Auth::user()->name;
    
        // تمرير بيانات الموظفين واسم المستخدم إلى العرض
        return view('auth.adminDashboard', ['employees' => $employees, 'name' => $name]);
    }
    public function delete(Request $request)
{
    // تأكد أن المستخدم مسؤول
    if(Auth::user()->role != 'admin') {
        return redirect()->back()->with('error', 'You are not authorized to delete employees.');
    }

    // احذف الموظف باستخدام الـ ID المقدمة في الطلب
    $employee = User::find($request->employee_id);
    $employee->delete();

    return redirect()->back()->with('success', 'Employee deleted successfully.');
}
    public function showEmployees()
    {
        // استرجاع جميع الموظفين من قاعدة البيانات
        $employees = DB::table('users')->where('role', 'employee')->get();
    
        // تمرير بيانات الموظفين إلى العرض
        return view('showEmployees', ['employees' => $employees, 'name' => Auth::user()->name]);
    }

    public function createEmployee()
    {
        return view('admin.createEmployee');
    }

    public function employeeDashboard()
    {
        return view('auth.employeeDashboard');
    }
//page1
    public function showpage1()
    {
        // Retrieve data from the database
        $items = DB::table('table_items')->latest()->paginate(10);
    
        // Display the page with the data
        return view('pages.page1', ['items' => $items])
                    ->with('i', (request()->input('page', 1) - 1) * 10); // تمرير الرقم الذي يعبر عن الصفحة الحالية
    }
    public function searchp1(Request $request)
    {
        $query = $request->input('query');

        // Perform search query based on $query
        $searchResults = DB::table('table_items')
                        ->where('Mabec', 'like', '%' . $query . '%')
                        ->orWhere('description', 'like', '%' . $query . '%')
                        ->orWhere('prix', 'like', '%' . $query . '%')
                        ->paginate(10);

        // Return the view with search results
        return view('pages.page1', ['items' => $searchResults]);
    }

    public function importExcel(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|mimes:xlsx,xls'
        ]);

        Excel::import(new ItemsImport, $request->file('excel_file'));

        return redirect()->back()->with('success', 'Excel file imported successfully.');
    }

   public function deleteExcel()
{
    DB::table('table_items')->truncate();
    return redirect()->back()->with('success', 'Excel file deleted successfully.');
}
    //page2
    public function showpage2()
    {
        // Retrieve data from the database for page 2
        $items = DB::table('table_items_2')->latest()->paginate(10);
      
        // Display the page with the data
        return view('pages.page2', ['items' => $items])
                    ->with('i', (request()->input('page', 1) - 1) * 10); 
    }
    
    public function searchp2(Request $request)
    {
        $query = $request->input('query');
    
        // Perform search query based on $query for page 2
        $searchResults = DB::table('table_items_2')
                        ->where('Mabec', 'like', '%' . $query . '%')
                        ->orWhere('description', 'like', '%' . $query . '%')
                        ->orWhere('prix', 'like', '%' . $query . '%')
                        ->paginate(10);
    
        // Return the view with search results for page 2
        return view('pages.page2', ['items' => $searchResults]);
    }
    
    public function importExcel2(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|mimes:xlsx,xls'
        ]);
    
        Excel::import(new ItemsImportp2, $request->file('excel_file'));
    
        return redirect()->back()->with('success', 'Excel file imported successfully for page 2.');
    }
    
    public function deleteExcel2()
    {
        DB::table('table_items_2')->truncate();
        return redirect()->back()->with('success', 'Excel file deleted successfully for page 2.');
    }

    // page3
public function showpage3()
{
    // Retrieve data from the database for page 3
    $items = DB::table('table_items_3')->latest()->paginate(10);
  
    // Display the page with the data
    return view('pages.page3', ['items' => $items])
                ->with('i', (request()->input('page', 1) - 1) * 10); 
}

public function searchp3(Request $request)
{
    $query = $request->input('query');

    // Perform search query based on $query for page 3
    $searchResults = DB::table('table_items_3')
                    ->where('Mabec', 'like', '%' . $query . '%')
                    ->orWhere('description', 'like', '%' . $query . '%')
                    ->orWhere('prix', 'like', '%' . $query . '%')
                    ->paginate(10);

    // Return the view with search results for page 3
    return view('pages.page3', ['items' => $searchResults]);
}

public function importExcel3(Request $request)
{
    $request->validate([
        'excel_file' => 'required|mimes:xlsx,xls'
    ]);

    Excel::import(new ItemsImportp3, $request->file('excel_file'));

    return redirect()->back()->with('success', 'Excel file imported successfully for page 3.');
}

public function deleteExcel3()
{
    DB::table('table_items_3')->truncate();
    return redirect()->back()->with('success', 'Excel file deleted successfully for page 3.');
}
    
//page4

public function showpage4()
{
    // Retrieve data from the database for page 4
    $items = DB::table('table_items_4')->latest()->paginate(10);
  
    // Display the page with the data
    return view('pages.page4', ['items' => $items])
                ->with('i', (request()->input('page', 1) - 1) * 10); 
}

public function searchp4(Request $request)
{
    $query = $request->input('query');

    // Perform search query based on $query for page 4
    $searchResults = DB::table('table_items_4')
                    ->where('Mabec', 'like', '%' . $query . '%')
                    ->orWhere('description', 'like', '%' . $query . '%')
                    ->orWhere('prix', 'like', '%' . $query . '%')
                    ->paginate(10);

    // Return the view with search results for page 4
    return view('pages.page4', ['items' => $searchResults]);
}

public function importExcel4(Request $request)
{
    $request->validate([
        'excel_file' => 'required|mimes:xlsx,xls'
    ]);

    Excel::import(new ItemsImportp4, $request->file('excel_file'));

    return redirect()->back()->with('success', 'Excel file imported successfully for page 4.');
}

public function deleteExcel4()
{
    DB::table('table_items_4')->truncate();
    return redirect()->back()->with('success', 'Excel file deleted successfully for page 4.');
}

//page5
public function showpage5()
{
    // Retrieve data from the database for page 5
    $items = DB::table('table_items_5')->latest()->paginate(10);
  
    // Display the page with the data
    return view('pages.page5', ['items' => $items])
                ->with('i', (request()->input('page', 1) - 1) * 10); 
}

public function searchp5(Request $request)
{
    $query = $request->input('query');

    // Perform search query based on $query for page 5
    $searchResults = DB::table('table_items_5')
                    ->where('Mabec', 'like', '%' . $query . '%')
                    ->orWhere('description', 'like', '%' . $query . '%')
                    ->orWhere('prix', 'like', '%' . $query . '%')
                    ->paginate(10);

    // Return the view with search results for page 5
    return view('pages.page5', ['items' => $searchResults]);
}

public function importExcel5(Request $request)
{
    $request->validate([
        'excel_file' => 'required|mimes:xlsx,xls'
    ]);

    Excel::import(new ItemsImportp5, $request->file('excel_file'));

    return redirect()->back()->with('success', 'Excel file imported successfully for page 5.');
}

public function deleteExcel5()
{
    DB::table('table_items_5')->truncate();
    return redirect()->back()->with('success', 'Excel file deleted successfully for page 5.');
}

//page6
public function showpage6()
{
    // Retrieve data from the database for page 5
    $items = DB::table('table_items_6')->latest()->paginate(10);
  
    // Display the page with the data
    return view('pages.page6', ['items' => $items])
                ->with('i', (request()->input('page', 1) - 1) * 10); 
}

public function searchp6(Request $request)
{
    $query = $request->input('query');

    // Perform search query based on $query for page 5
    $searchResults = DB::table('table_items_6')
                    ->where('Mabec', 'like', '%' . $query . '%')
                    ->orWhere('description', 'like', '%' . $query . '%')
                    ->orWhere('prix', 'like', '%' . $query . '%')
                    ->paginate(10);

    // Return the view with search results for page 5
    return view('pages.page6', ['items' => $searchResults]);
}

public function importExcel6(Request $request)
{
    $request->validate([
        'excel_file' => 'required|mimes:xlsx,xls'
    ]);

    Excel::import(new ItemsImportp6, $request->file('excel_file'));

    return redirect()->back()->with('success', 'Excel file imported successfully for page 6.');
}

public function deleteExcel6()
{
    DB::table('table_items_6')->truncate();
    return redirect()->back()->with('success', 'Excel file deleted successfully for page 6.');
}

//page7
public function showpage7()
{
    // Retrieve data from the database for page 5
    $items = DB::table('table_items_7')->latest()->paginate(10);
  
    // Display the page with the data
    return view('pages.page7', ['items' => $items])
                ->with('i', (request()->input('page', 1) - 1) * 10); 
}

public function searchp7(Request $request)
{
    $query = $request->input('query');

    // Perform search query based on $query for page 5
    $searchResults = DB::table('table_items_7')
                    ->where('Mabec', 'like', '%' . $query . '%')
                    ->orWhere('description', 'like', '%' . $query . '%')
                    ->orWhere('prix', 'like', '%' . $query . '%')
                    ->paginate(10);

    // Return the view with search results for page 5
    return view('pages.page7', ['items' => $searchResults]);
}

public function importExcel7(Request $request)
{
    $request->validate([
        'excel_file' => 'required|mimes:xlsx,xls'
    ]);

    Excel::import(new ItemsImportp7, $request->file('excel_file'));

    return redirect()->back()->with('success', 'Excel file imported successfully for page 7.');
}

public function deleteExcel7()
{
    DB::table('table_items_7')->truncate();
    return redirect()->back()->with('success', 'Excel file deleted successfully for page 7.');
}

//page8
public function showpage8()
{
    // Retrieve data from the database for page 5
    $items = DB::table('table_items_8')->latest()->paginate(10);
  
    // Display the page with the data
    return view('pages.page8', ['items' => $items])
                ->with('i', (request()->input('page', 1) - 1) * 10); 
}

public function searchp8(Request $request)
{
    $query = $request->input('query');

    // Perform search query based on $query for page 5
    $searchResults = DB::table('table_items_8')
                    ->where('Mabec', 'like', '%' . $query . '%')
                    ->orWhere('description', 'like', '%' . $query . '%')
                    ->orWhere('prix', 'like', '%' . $query . '%')
                    ->paginate(10);

    // Return the view with search results for page 5
    return view('pages.page8', ['items' => $searchResults]);
}

public function importExcel8(Request $request)
{
    $request->validate([
        'excel_file' => 'required|mimes:xlsx,xls'
    ]);

    Excel::import(new ItemsImportp8, $request->file('excel_file'));

    return redirect()->back()->with('success', 'Excel file imported successfully for page 8.');
}

public function deleteExcel8()
{
    DB::table('table_items_8')->truncate();
    return redirect()->back()->with('success', 'Excel file deleted successfully for page 8.');
}

//page9
public function showpage9()
{
    // Retrieve data from the database for page 5
    $items = DB::table('table_items_9')->latest()->paginate(10);
  
    // Display the page with the data
    return view('pages.page9', ['items' => $items])
                ->with('i', (request()->input('page', 1) - 1) * 10); 
}

public function searchp9(Request $request)
{
    $query = $request->input('query');

    // Perform search query based on $query for page 5
    $searchResults = DB::table('table_items_9')
                    ->where('Mabec', 'like', '%' . $query . '%')
                    ->orWhere('description', 'like', '%' . $query . '%')
                    ->orWhere('prix', 'like', '%' . $query . '%')
                    ->paginate(10);

    // Return the view with search results for page 5
    return view('pages.page9', ['items' => $searchResults]);
}

public function importExcel9(Request $request)
{
    $request->validate([
        'excel_file' => 'required|mimes:xlsx,xls'
    ]);

    Excel::import(new ItemsImportp9, $request->file('excel_file'));

    return redirect()->back()->with('success', 'Excel file imported successfully for page 9.');
}

public function deleteExcel9()
{
    DB::table('table_items_9')->truncate();
    return redirect()->back()->with('success', 'Excel file deleted successfully for page 9.');
}

//page10
public function showpage10()
{
    // Retrieve data from the database for page 5
    $items = DB::table('table_items_10')->latest()->paginate(10);
  
    // Display the page with the data
    return view('pages.page10', ['items' => $items])
                ->with('i', (request()->input('page', 1) - 1) * 10); 
}

public function searchp10(Request $request)
{
    $query = $request->input('query');

    // Perform search query based on $query for page 5
    $searchResults = DB::table('table_items_10')
                    ->where('Mabec', 'like', '%' . $query . '%')
                    ->orWhere('description', 'like', '%' . $query . '%')
                    ->orWhere('prix', 'like', '%' . $query . '%')
                    ->paginate(10);

    // Return the view with search results for page 5
    return view('pages.page10', ['items' => $searchResults]);
}

public function importExcel10(Request $request)
{
    $request->validate([
        'excel_file' => 'required|mimes:xlsx,xls'
    ]);

    Excel::import(new ItemsImportp10, $request->file('excel_file'));

    return redirect()->back()->with('success', 'Excel file imported successfully for page 10.');
}

public function deleteExcel10()
{
    DB::table('table_items_10')->truncate();
    return redirect()->back()->with('success', 'Excel file deleted successfully for page 10.');
}


//page11
public function showpage11()
{
    // Retrieve data from the database for page 5
    $items = DB::table('table_items_11')->latest()->paginate(10);
  
    // Display the page with the data
    return view('pages.page11', ['items' => $items])
                ->with('i', (request()->input('page', 1) - 1) * 10); 
}

public function searchp11(Request $request)
{
    $query = $request->input('query');

    // Perform search query based on $query for page 5
    $searchResults = DB::table('table_items_11')
                    ->where('Mabec', 'like', '%' . $query . '%')
                    ->orWhere('description', 'like', '%' . $query . '%')
                    ->orWhere('prix', 'like', '%' . $query . '%')
                    ->paginate(10);

    // Return the view with search results for page 5
    return view('pages.page11', ['items' => $searchResults]);
}

public function importExcel11(Request $request)
{
    $request->validate([
        'excel_file' => 'required|mimes:xlsx,xls'
    ]);

    Excel::import(new ItemsImportp11, $request->file('excel_file'));

    return redirect()->back()->with('success', 'Excel file imported successfully for page 11.');
}

public function deleteExcel11()
{
    DB::table('table_items_11')->truncate();
    return redirect()->back()->with('success', 'Excel file deleted successfully for page 11.');
}

//page12
public function showpage12()
{
    // Retrieve data from the database for page 5
    $items = DB::table('table_items_12')->latest()->paginate(10);
  
    // Display the page with the data
    return view('pages.page12', ['items' => $items])
                ->with('i', (request()->input('page', 1) - 1) * 10); 
}

public function searchp12(Request $request)
{
    $query = $request->input('query');

    // Perform search query based on $query for page 5
    $searchResults = DB::table('table_items_12')
                    ->where('Mabec', 'like', '%' . $query . '%')
                    ->orWhere('description', 'like', '%' . $query . '%')
                    ->orWhere('prix', 'like', '%' . $query . '%')
                    ->paginate(10);

    // Return the view with search results for page 5
    return view('pages.page12', ['items' => $searchResults]);
}

public function importExcel12(Request $request)
{
    $request->validate([
        'excel_file' => 'required|mimes:xlsx,xls'
    ]);

    Excel::import(new ItemsImportp12, $request->file('excel_file'));

    return redirect()->back()->with('success', 'Excel file imported successfully for page 12.');
}

public function deleteExcel12()
{
    DB::table('table_items_12')->truncate();
    return redirect()->back()->with('success', 'Excel file deleted successfully for page 12.');
}

//page13
public function showpage13()
{
    // Retrieve data from the database for page 5
    $items = DB::table('table_items_13')->latest()->paginate(10);
  
    // Display the page with the data
    return view('pages.page13', ['items' => $items])
                ->with('i', (request()->input('page', 1) - 1) * 10); 
}

public function searchp13(Request $request)
{
    $query = $request->input('query');

    // Perform search query based on $query for page 5
    $searchResults = DB::table('table_items_13')
                    ->where('Mabec', 'like', '%' . $query . '%')
                    ->orWhere('description', 'like', '%' . $query . '%')
                    ->orWhere('prix', 'like', '%' . $query . '%')
                    ->paginate(10);

    // Return the view with search results for page 5
    return view('pages.page13', ['items' => $searchResults]);
}

public function importExcel13(Request $request)
{
    $request->validate([
        'excel_file' => 'required|mimes:xlsx,xls'
    ]);

    Excel::import(new ItemsImportp13, $request->file('excel_file'));

    return redirect()->back()->with('success', 'Excel file imported successfully for page 13.');
}

public function deleteExcel13()
{
    DB::table('table_items_13')->truncate();
    return redirect()->back()->with('success', 'Excel file deleted successfully for page 13.');
}
}

