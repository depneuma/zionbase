<?php 

namespace App\Traits;

use App\Models\Setting;
use App\Traits\FlashMessages;

trait Base 
{
    // BaseController Functions

    Use FlashMessages;
    protected $data = null;
    protected function setPageTitle($title, $subTitle, $subText = null)
    {
        view()->share(['pageTitle' => $title, 'subTitle' => $subTitle, 'subText' => $subText]);
    }

    protected function showErrorPage($errorCode = 404, $message = null)
    {
        $data['message'] = $message;
        return response()->view('errors.'.$errorCode, $data, $errorCode);
    }

    protected function responseJson($error = true, $responseCode = 200, $message = [], $data = null)
    {
        return response()->json([
            'error'         =>  $error,
            'response_code' =>  $responseCode,
            'message'       =>  $message,
            'data'          =>  $data
        ]);
    }

    protected function responseRedirect($route, $message, $type = 'info', $error = false, $withOldInputWhenError = false)
    {
        $this->setFlashMessage($message, $type);
        $this->showFlashMessages();

        if ($error && $withOldInputWhenError) {
            return redirect()->back()->withInput();
        }

        return redirect()->route($route);
    }

    protected function responseRedirectBack($message, $type = 'info', $error = false, $withOldInputWhenError = false)
    {
        $this->setFlashMessage($message, $type);
        $this->showFlashMessages();

        return redirect()->back();
    }

    protected function responseRedirectExt($route, $message, $type = 'info')
    {
        $this->setFlashMessage($message, $type);
        $this->showFlashMessages();

        return redirect($route);
    }
    
    protected function amountBeforeFees($whole)
    {
        $quater = calculatePercentage(null, $whole, Setting::get('default_ratio'));
        return $quater;
    }
}