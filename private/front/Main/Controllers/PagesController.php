<?php

namespace Front\Main\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Master\Facades\Front;
use Master\Facades\Meta;
use Master\Modules\AppUsers\Mail\Deleted;
use Master\Modules\AppUsers\Mail\Expired;
use Master\Modules\AppUsers\Mail\PwdRecovery;
use Master\Modules\AppUsers\Mail\Registration;
use Master\Modules\AppUsers\Mail\Reminder;
use Master\Modules\AppUsers\Models\AppUser;
use Master\Modules\Websites\Facades\Websites;

class PagesController extends BaseController {

    /* Index
    ------------------------------------------------------------ */
    public function index(Request $request) {
        $lang = $request->getPreferredLanguage(array_keys(Websites::current('enabledFrontLanguages')));
        return Response::redirectTo(Front::routeLang('home', $lang),303);
    }

    /* Home
    ------------------------------------------------------------ */

    public function home(Request $request) {
        abort(404);
    }

    public function accountConfirmation($id){

        // Meta
        Meta::set('title', __('front::title.registration_confirmed'));
        Meta::set('robots', 'noindex,nofollow');

        $app_user = AppUser::find($id);
        if ($app_user){
            if (!$app_user->data_joined){
                $app_user->date_joined = Carbon::now()->toDateTimeString();
                $app_user->save();
            }
        }
        return view('pages.confirmed', [
            "app_user" => $app_user
        ]);
    }

    public function accountDeletion(Request $request){
        $lang = $request->getPreferredLanguage(array_keys(Websites::current('enabledFrontLanguages')));
        return Response::redirectTo(Front::routeLang('account.deletionPage', $lang),303);
    }

    public function privacyPolicyGlobal(Request $request){
        $lang = $request->getPreferredLanguage(array_keys(Websites::current('enabledFrontLanguages')));
        return Response::redirectTo(Front::routeLang('privacyPolicy', $lang),303);
    }


    public function accountDeletionPage(){

        // Meta
        Meta::set('title', __('front::title.how_to_delete_account'));
        Meta::set('robots', 'noindex,nofollow');

        return view('pages.account-deletion', [

        ]);
    }

    public function privacyPolicy(){
        // Meta
        Meta::set('title', __('front::title.privacy_policy'));
        Meta::set('robots', 'noindex,nofollow');

        $privacy_policy_url = "http://privacy.ene.si/api/policy-full/?uid=".Websites::current('epp_policy_id')."&ln=".(app()->getLocale() == 'it' ? 'ita' : 'eng');

        try {
            $response = Http::get($privacy_policy_url);

            if ($response->successful()) {
                $content = $response->body();
            } else {
                $content = null;
                Log::warning('Privacy policy URL failed: ' . $response->status());
            }
        } catch (\Exception $e) {
            $content = null;
            Log::error('Privacy policy fetch error: ' . $e->getMessage());
        }

        return view('pages.privacyPolicy',[
            'content' => $content
        ]);

    }

    public function testMail(){
        $appUser = AppUser::find('019909de-5cc5-72cb-948f-e46f9eec9af2');
        if ($appUser){
            //$message = new Registration($appUser,'rapid_fr');
            //$message = new Reminder($appUser,'rapid_fr');
            //$message = new PwdRecovery($appUser,'123','rapid_fr');
            //$message = new Expired($appUser);
            $message = new Deleted($appUser);

            echo $message->render();
            exit;
        }
        abort(404);
    }
}
