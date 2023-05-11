<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{!! \Illuminate\Support\Facades\Storage::get('website/email/valuation/rejected/title.txt') !!} </title>
</head>
<p>Hello <b>{{ $valuation->full_name }}</b>,</p>
<p>{!! \Illuminate\Support\Facades\Storage::get('website/email/valuation/rejected/body.txt') !!}</p>
<div class="signature">
    <p>Thank you for using our service!</p>
    <hr>
    <h5>{{ ucfirst(config("company.name")) }}</h5>
    <ul>
        <li>
            <a href="{{ config('company.social_media.facebook') }}">Facebook</a>
        </li>
        <li>
            <a href="{{ config('company.social_media.twitter') }}">Twitter</a>
        </li>
        <li>
            <a href="{{ config('company.social_media.instagram') }}">Instagram</a>
        </li>
        <li>
            <a href="{{ config('company.social_media.linkedin') }}">Linked In</a>
        </li>
    </ul>
</div>
</html>
