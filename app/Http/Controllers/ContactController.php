<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest;


class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function post(ContactFormRequest $request)
    {
        $validate_rule =[
        'name' => 'required','max:255',
            'sex' => 'required',
            'email' => 'required','email',
            'postcode' => 'required','min:8','max:8',
            'address' => 'required','max:255',
            'building_name' => 'max:255',
            'opinion' => 'required','max:120',
        ];
        $name = $request->name;
        $sex = $request->sex;
        $email = $request->email;
        $postcode = $request->postcode;
        $address = $request->address;
        $building = $request->building_name;
        $opinion = $request->opinion;

        $fullname = implode(" ",$name);

        $input =['name'=>$fullname,'sex'=>$sex,
        'email'=>$email,'postcode'=>$postcode,'address'=>$address,
        'building'=>$building,'opinion'=>$opinion];

        $request->session()->put("form_input", $input);
    
        $this->validate($request, $validate_rule);
        return redirect()->action([ContactController::class,'confirm']);

    }

    public function confirm(ContactFormRequest $request){
		
		$input = $request->session()->get("form_input");
		if(!$input){
			return redirect()->action([ContactController::class,'confirm']);
		}
		return view("confirm",["input" => $input]);
    }

    public function create(ContactFormRequest $request){
	
		$input = $request->session()->get("form_input");
		
		if(!$input){
			return redirect()->action([ContactController::class,'index']);
		}

        if($request->has("back")){
		return redirect()->action([ContactController::class,'index'])->withInput($input);
        }

        $fullname = $input['name'];
        $sex =  $input['sex'];
        $email =  $input['email'];
        $postcode =  $input['postcode'];
        $address =  $input['address'];
        $building =  $input['building'];
        $opinion =  $input['opinion'];
        Contact::create(['fullname' => $fullname,'gender' => $sex,'email' => $email
    ,'postcode' => $postcode,'address' => $address,'building_name' => $building,'opinion' =>$opinion]);

		$request->session()->forget("form_input");
		return redirect()->action([ContactController::class,'thanks']);
	}

    public function thanks()
    {
        return view('thanks');
    }

    public function managepage()
    {
        $cont = Contact::Paginate(5);
        $contact = Contact::all();
        return view('manage',['contact'=> $contact,'contact'=>$cont]);
    }

    public function manage(Request $request)
    {
        $fullname = $request->fullname;
        $gender = $request->gender;
        $date = $request->crated_at;
        $email = $request->email;

        $contacts = Contact::where('fullname',$fullname)->orwhere('gender',$gender)
        ->orwhere('created_at',$date)->orwhere('email',$email)->get();
        return view('manage',[
            'contact' => $contacts,
        ]);
    }

    public function delete($id)
    {
        $contact=Contact::find($id);
        $contact->delete();
        return redirect('/managepage');
    }


}