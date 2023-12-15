<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Company;
// use App\Models\Department;
use App\Models\Employee;
use App\Models\Product;
use App\Models\Student;
use App\Models\StudentProfile;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        // One to One (Student -> StudentProfile)
        $single = Student::with('profile')->find(1);
        echo "<br>".$single->name."<br>". $single->email."<br>". $single->profile->country."<br>";
        // One to One reverse
        $single = StudentProfile::with('student')->find(1);
        echo "<br>".$single->student->name."<br>". $single->student->email."<br>". $single->country."<br>";

        //One to Many (Department -> Employee)
        /* $dept=Department::with('employee')->find(1);
        print($dept->name);
        foreach ($dept->employee as $value) {
            echo "<br>".$value->department_id. "<br>". $value->name. "<br>". $value->email. "<br><br>";
        } */
        //One to Many reverse
        $emp=Employee::with('department')->find(1);
        echo "<br>".$emp->department_id. "<br>". $emp->name. "<br>". $emp->email. "<br>".$emp->department->name. "<br><br>";
        
        //Many to many (Book -> Author)
        // Java = Patrick, Smith
        // PHP = Smith
        // Python = David, Peter
        // C = Cooper, Patrick
        // Ruby = Cooper, Patrick, David
        
        /* $author=Author::with('book')->get();
        // dd($author->toArray())
        foreach($author as $item) {
            echo $item->name."<br/><br/>";
            foreach($item->book as $book) {
                echo $book->title."<br/>";
            }
            echo "<br>";
        } */
        // Author to book
        $data = Author::with('book')->where('id', 1)->first();
        // dd($data->toArray());
        echo $data->name.'<br/>';
        foreach($data->book as $item) {
            echo $item->title."<br/>";
        }

        // Book to Author
        /* $all = Book::with('author')->get();
        // dd($all->toArray());
        foreach($all as $item) {
            echo $item->title."<br/>";
            foreach($item->author as $author) {
                echo $author->name."<br/>";
            }
            echo "<br>";
        } */
        $item = Book::with('author')->where('id', 1)->first();
        echo '<br>'.$item->title.'<br>';
        foreach($item->author as $author) {
            echo $author->name."<br/>";
        }

        //Polymorphic Relations
        $companies = Company::with('photos')->get();
        $products = Product::with('photos')->get();
        $users = User::with('photos')->get();
        dd($companies, $products, $users);
    }
    public function aboutus()
    {
        if (false) {
            return redirect()->route('veera');
        }
        return '<h1>You are not authorized</h1>';
    }
}
