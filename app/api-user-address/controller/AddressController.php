<?php
/**
 * AddressController
 * @package api-user-address
 * @version 0.0.1
 */

namespace ApiUserAddress\Controller;

use LibForm\Library\Form;
use UserAddress\Model\UserAddress as UAddress;
use LibFormatter\Library\Formatter;

class AddressController extends \Api\Controller
{
    public function indexAction(){
        if(!$this->user->isLogin())
            return $this->resp(401);

        $addr = UAddress::getOne(['user'=>$this->user->id]);
        if(!$addr)
            return $this->resp(0, []);

        $addr = Formatter::format('user-address', $addr, [
            'country',
            'state',
            'city',
            'district',
            'village',
            'zipcode'
        ]);

        $this->resp(0, $addr);
    }

    public function updateAction(){
        if(!$this->user->isLogin())
            return $this->resp(401);

        $form = new Form('api.me.address');

        if(!($valid = $form->validate()))
            return $this->resp(422, $form->getErrors());

        $addr = UAddress::getOne(['user'=>$this->user->id]);

        if(!$addr){
            $valid->user = $this->user->id;
            UAddress::create((array)$valid);
        }else{
            UAddress::set((array)$valid, ['id'=>$addr->id]);
        }

        $addr = UAddress::getOne(['user'=>$this->user->id]);

        $addr = Formatter::format('user-address', $addr, [
            'country',
            'state',
            'city',
            'district',
            'village',
            'zipcode'
        ]);

        $this->resp(0, $addr);
    }
}