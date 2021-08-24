<?php

namespace App\Http\Controllers;

use App\Mail\CallData;
use App\Mail\FormData;
use App\Mail\OfficeData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\CallDataRequest;
use App\Http\Requests\FormDataRequest;
use App\Http\Requests\OfficeDataRequest;
use App\Mail\ProductData;

class MailController extends Controller
{
    protected const MAIL_TO = 'info@ftgco.kz';
    protected const MAIL_ERROR = 'Произошла ошибка при отправке формы, пожалуйста, повторите попытку чуть позже.';

    /**
     * @param FormDataRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function send(FormDataRequest $request)
    {
        # 1 ======================================== #
        $this->check_session();

        # 2 ======================================== #
        try {
            Mail::to(self::MAIL_TO)
                ->send(new FormData($request->validated()));
        } catch (\Exception $exception) {
            $request->session()->flash('message', self::MAIL_ERROR);
            return redirect()->back();
        }
        
        # 3 ======================================== #
        return redirect()->back()->with('contact', 'contact');
    }

    /**
     * @param CallDataRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function call(CallDataRequest $request)
    {
        # 1 ======================================== #
        $this->check_session();

        # 2 ======================================== #
        try {
            Mail::to(self::MAIL_TO)
                ->send(new CallData($request->validated()));
        } catch (\Exception $exception) {
            $request->session()->flash('message', self::MAIL_ERROR);
            return redirect()->back();
        }

        # 3 ======================================== #
        return redirect()->back()->with(['contact'=> 'contact']);
    }

    public function office(OfficeDataRequest $request)
    {
        # 1 ======================================== #
        $this->check_session();

        # 2 ======================================== #
        try {
            Mail::to(self::MAIL_TO)
                ->send(new OfficeData($request->validated()));
        } catch (\Exception $exception) {
            $request->session()->flash('message', self::MAIL_ERROR);
            return redirect()->back();
        }

        # 3 ======================================== #
        return redirect()->back()->with(['contact'=> 'contact']);
    }
}
