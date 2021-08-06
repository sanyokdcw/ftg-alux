<?php

namespace App\Http\Controllers;

use App\Mail\FormData;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\FormDataRequest;

class MailController extends Controller
{
    protected const MAIL_TO = 'info@ftgco.kz';

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
            $request->session()->flash('message', 'Произошла ошибка при отправке формы, пожалуйста, повторите попытку чуть позже.');
            return redirect()->back();
        }
        
        # 3 ======================================== #
        return redirect()->back()->with('contact', 'contact');
    }
}
