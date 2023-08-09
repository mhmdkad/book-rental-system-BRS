<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BorrowController extends Controller
{
    //
    
    public function show()
    {
        // bring rentlas details of a reader;
        
        if (Auth::check()) {
            $reader_id = Auth::user()->id;
            
            $equl = '=';
            if(Auth::user()->is_librarian == 1){
                $equl = '<>';
            }
            // DB::enableQueryLog();
            
            // $query = DB::getQueryLog();
            // $query = end($query);
            // dd($query);

            $rentals = DB::table('borrows')
                            ->join('books as b1', 'b1.id', '=', 'borrows.book_id')
                            ->where('reader_id',$equl,$reader_id)->get();

            $rentals_pending =  DB::table('borrows')
                            ->join('books as b1', 'b1.id', '=', 'borrows.book_id')
                            ->where('reader_id',$equl,$reader_id)
                            ->where('status','=','PENDING')->get(['borrows.id', 'b1.title', 'b1.authors', 'borrows.created_at as rental_time','borrows.deadline']);

            $rentals_accepted_intime =  DB::table('borrows')
                            ->join('books as b1', 'b1.id', '=', 'borrows.book_id')
                            ->where('reader_id',$equl,$reader_id)
                            ->where('status','=','ACCEPTED')
                            ->where('deadline', '>=', now()->format('Y-m-d'))->get(['borrows.id', 'b1.title', 'b1.authors', 'borrows.created_at as rental_time','borrows.deadline']);

            $rentals_accepted_late =  DB::table('borrows')
                            ->join('books as b1', 'b1.id', '=', 'borrows.book_id')
                            ->where('reader_id',$equl,$reader_id)
                            ->where('status','=','ACCEPTED')
                            ->where('deadline', '<', now()->format('Y-m-d'))->get(['borrows.id', 'b1.title', 'b1.authors', 'borrows.created_at as rental_time','borrows.deadline']);
                            
            $rentals_rejected =  DB::table('borrows')
                            ->join('books as b1', 'b1.id', '=', 'borrows.book_id')
                            ->where('reader_id',$equl,$reader_id)
                            ->where('status','=','REJECTED')->get(['borrows.id', 'b1.title', 'b1.authors', 'borrows.created_at as rental_time','borrows.deadline']);

            $rentals_returned =  DB::table('borrows')
                            ->join('books as b1', 'b1.id', '=', 'borrows.book_id')
                            ->where('reader_id',$equl,$reader_id)
                            ->where('status','=','RETURNED')->get(['borrows.id', 'b1.title', 'b1.authors', 'borrows.created_at as rental_time','borrows.deadline']);
            
        }
        
        return view('rentals/show', [
            'rentals_pending' => $rentals_pending,
            'rentals_accepted_intime' => $rentals_accepted_intime,
            'rentals_accepted_late' => $rentals_accepted_late,
            'rentals_rejected' => $rentals_rejected,
            'rentals_returned' => $rentals_returned
            ]);
    }

    public function store($book_id)
    {   
        
        $auth_id = Auth::id();
        
        $borrow_data = ['reader_id' => $auth_id, 'book_id' => $book_id, 'status' => 'PENDING'];

        // dd($borrow_data);
        // save rental 
        Borrow::create($borrow_data);
        
        return redirect()->route('book.show', ['book_id'=>$book_id]);
    }


    public function update($rental_id, Request $request)
    {   
        
        $validated_data = $request->validate([
            'status' => 'required',
            'deadline' => 'required'
        ]);
           
        // fix the 24 hr format
        $validated_data['deadline']  = date("Y-m-d H:i:s", strtotime($validated_data['deadline']));
     
        
        // request_processed_at
        // request_managed_by

        // returned_at
        // return_managed_by

        $id = Auth::id();
        $curr_dt = date('Y-m-d H:i:s', time());

        if($validated_data['status'] == 'PENDING'){
            $validated_data = [];
        }
        if($validated_data['status'] == 'REJECTED'){
            $validated_data['request_processed_at'] = $curr_dt;
            $validated_data['request_managed_by'] = $id;
            unset($validated_data['deadline']);
        }
        if($validated_data['status'] == 'ACCEPTED'){
            $validated_data['request_processed_at'] = $curr_dt;
            $validated_data['request_managed_by'] = $id;
        }
        if($validated_data['status'] == 'RETURNED'){
            $validated_data['returned_at'] = $curr_dt;
            $validated_data['return_managed_by'] = $id;
            unset($validated_data['deadline']);
        }

        // Edit book
        Borrow::find($rental_id)->update($validated_data);


        return redirect()->route('rental.show', ['rental_id' => $rental_id]);
    }

    public function showRentalDetail($rental_id)
    {   
        // DB::enableQueryLog();

        $rental_details = DB::table('borrows')
                ->join('users as u1', 'u1.id', '=', 'borrows.reader_id')
                ->leftJoin('users as l1', 'l1.id', '=', 'borrows.request_managed_by')
                ->leftJoin('users as l2', 'l2.id', '=', 'borrows.return_managed_by')
                ->join('books', 'books.id', '=', 'borrows.book_id')                
                ->where('borrows.id', '=', $rental_id)
                ->get(['borrows.id','title','authors','released_at','u1.name as r_name','request_processed_at','status','deadline','returned_at','l1.name as l1_name', 'l2.name as l2_name']);

        // $query = DB::getQueryLog();
        // $query = end($query);
        // dd($query);
        $html = '';
        $curr_datetime =  strtotime(date('Y-m-d H:i:s', time()));
        $deadline = strtotime($rental_details[0]->deadline);

        $difference = ($deadline - $curr_datetime);
        

        // dd($rental_details[0]);
        if($rental_details[0]->status == 'RETURNED'){
            $html = "<tr>
                        <td><b>Date Returned</b></td>
                        <td>".$rental_details[0]->returned_at."</td>
                    </tr>
                    <tr>
                        <td><b>Librarian Name</b></td>
                        <td>".$rental_details[0]->l2_name."</td>
                    </tr>";
        }else if($rental_details[0]->status == 'PENDING'){
            // $html = "<tr>
            //             <td><b>Librarian Name</b></td>
            //             <td>".$rental_details[0]->l1_name."</td>
            //         </tr>";
            $html = "";
        }else if($rental_details[0]->status == 'ACCEPTED' && $difference<0 ){
            $html = "<tr>
                        <td><b>Late Rental</b></td>
                        <td>".$rental_details[0]->deadline."</td>
                    </tr>";
        }else if($rental_details[0]->status == 'ACCEPTED'){
            $html = "<tr>
                        <td><b>Date Returned</b></td>
                        <td>".$rental_details[0]->request_processed_at."</td>
                    </tr>
                    <tr>
                        <td><b>Librarian Name</b></td>
                        <td>".$rental_details[0]->l1_name."</td>
                    </tr>";
        }

        $status_list = ['PENDING', 'ACCEPTED', 'REJECTED', 'RETURNED'];

        return view('rentals/rental_detail', [
            'rental_details' => $rental_details,
            'html' => $html,
            'status_list' => $status_list
        ]);
    }
}
