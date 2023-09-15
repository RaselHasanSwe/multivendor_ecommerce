<?php
namespace App\Services\Frontend;

use App\Models\Billing;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class BillingService {

    protected $sessionName = 'billing_session';
    public $userId;
    public $billingId;

    public function sessionBilling( Request $request )
    {
        $request->request->remove('_token');
        Session::put($this->sessionName, $request->all());
    }

    public function getBilling()
    {
        return Session::get($this->sessionName);
    }

    public function currentUser()
    {
        if(Auth::check()){
            $this->userId = Auth::user()->id;
            return true;
        }
        return false;
    }

    public function isUserExist()
    {
        $email = $this->getBilling()['email'];
        $user = User::where('email', $email)->first();
        if($user) {
            $this->userId = $user->id;
            return true;
        }
        return false;
    }

    public function isBillingExist()
    {
        $billing = Billing::where('user_id', $this->userId)->first();
        if($billing) return $billing;
        return false;
    }

    public function storeUser()
    {
        $data = $this->getBilling();
        $item = [
            'name' => $data['first_name'].' '. $data['last_name'],
            'phone' => $data['phone'],
            'city' => $data['city'],
            'state_id' => $data['state'],
            'zip_code' => $data['zip'],
            'address' => $data['address'],
            'email' => $data['email'],
            'country_id' => $data['country'],
            'password' => Hash::make('password'),
        ];
        $user = User::create($item);
        $this->userId = $user->id;

    }

    public function storeBilling()
    {
        $data = $this->getBilling();
        $data['user_id'] = $this->userId;
        $billing = $this->isBillingExist();
        if($billing){
            Billing::find($billing->id)->fill($data)->save();
            $this->billingId = $billing->id;
        }else{
           $create = Billing::create($data);
           $this->billingId = $create->id;
        }
    }

    public function handleBilling()
    {
        if(!$this->currentUser() && !$this->isUserExist()) {
            $this->storeUser();
            $this->storeBilling();
        }
        if(!$this->currentUser() && $this->isUserExist()) $this->storeBilling();

        if($this->currentUser()) $this->storeBilling();

        return [
            'billing_id' => $this->billingId,
            'user_id' => $this->userId
        ];

    }

}
