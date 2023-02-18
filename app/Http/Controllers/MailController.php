<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailRequest;
use App\Models\Description;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\Mime\Part\TextPart;
use Symfony\Component\Mime\Message;
use Symfony\Component\Mime\Part\AbstractPart;


class MailController extends Controller
{
    /**
     * @param Request $request
     * @return RedirectResponse
     *
     * Saving data then send email
     */
    public function sendMail(MailRequest $request): RedirectResponse
    {
        $user = User::find(Auth::id());
        if ($request->hasFile('file')) {
            $user->addMedia($request->file)
                ->toMediaCollection('photo');
            if (!empty($request->description)) {
                Description::create([
                    'description' => $request->description,
                    'user_id' => Auth::id(),
                    'image_id' => $user->getMedia('photo')->last()->id,
                ]);
            } else {
                Description::create([
                    'description' => ' ',
                    'user_id' => Auth::id(),
                    'image_id' => $user->getMedia('photo')->last()->id,
                ]);
            }
        }
        $file_extension = $request->file('file')->getClientOriginalExtension();
        $file_mime = $request->file('file')->getClientMimeType();
        Mail::send('email', [], function ($m) use ($request, $file_extension, $file_mime, $user) {
            $m->from('dima.it.1989@gmail.com', 'Sender Name');
            $m->to(Auth::user()->email, 'Receiver Name');
            $m->subject($user->getMedia('photo')->last()->created_at);
            $m->attach($user->getMedia('photo')->last()->getUrl(), [
                'as' => 'image.' . $file_extension,
                'mime' => $file_mime,
            ]);
        });


        return redirect()->back()->with('success', 'sent and saved');
    }


}
