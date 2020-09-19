@extends('layouts.app')

@section('content')
@if(env('MAIL_USERNAME') == null && env('MAIL_PASSWORD') == null)
    <div class="row">
        <div class="col-sm-12">
            <div class="bg-danger pad-all text-center mar-btm">
                <h4 class="text-light mar-btm">{{translate('Please Configure SMTP Setting to work all email sending funtionality')}}.</h4>
                <a class="btn btn-info btn-rounded" href="{{ route('smtp_settings.index') }}">Configure Now</a>
            </div>
        </div>
    </div>
@endif




@if(Auth::user()->user_type == 'admin' || in_array('9', json_decode(Auth::user()->staff->role->permissions)))
    <div class="row">
    <div class="col-md-6">
        <div class="panel">
            <div class="panel-body text-center dash-widget pad-no">
                <div class="pad-ver mar-top text-main">
                    <i class="demo-pli-data-settings icon-4x"></i>
                </div>
                <br>
                <p class="text-3x text-main bg-primary pad-ver">{{translate('Frontend')}} <strong>{{translate('Setting')}}</strong></p>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-sm-6">
                <div class="panel">
                    <div class="pad-top text-center dash-widget">
                        <p class="text-semibold text-lg text-main mar-ver">
                            {{translate('Home page')}} <br>
                            {{translate('setting')}}
                        </p>
                        <br>
                        <a href="{{ route('home_settings.index') }}" class="btn btn-primary mar-top btn-block top-border-radius-no">{{translate('Click Here')}}</a>
                    </div>
                </div>
                <div class="panel">
                    <div class="pad-top text-center dash-widget">
                        <p class="text-semibold text-lg text-main mar-ver">
                            {{translate('Policy page')}} <br>
                            {{translate('setting')}}
                        </p>
                        <br>
                        <a href="{{route('privacypolicy.index', 'privacy_policy')}}" class="btn btn-primary mar-top btn-block top-border-radius-no">{{translate('Click Here')}}</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="panel">
                    <div class="pad-top text-center dash-widget">
                        <p class="text-semibold text-lg text-main mar-ver">
                            {{translate('General')}} <br>
                            {{translate('setting')}}
                        </p>
                        <br>
                        <a href="{{route('generalsettings.index')}}" class="btn btn-primary mar-top btn-block top-border-radius-no">{{translate('Click Here')}}</a>
                    </div>
                </div>
                <div class="panel">
                    <div class="pad-top text-center dash-widget">
                        <p class="text-semibold text-lg text-main mar-ver">
                            {{translate('Useful link')}} <br>
                            {{translate('setting')}}
                        </p>
                        <br>
                        <a href="{{route('links.index')}}" class="btn btn-primary mar-top btn-block top-border-radius-no">{{translate('Click Here')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@if(Auth::user()->user_type == 'admin' || in_array('8', json_decode(Auth::user()->staff->role->permissions)))
    <div class="flex-row">
    <div class="flex-col-xl flex-col-lg-6 flex-col-12">
        <div class="panel">
            <div class="pad-top text-center dash-widget">
                <p class="text-semibold text-lg text-main mar-ver">
                    {{translate('Activation')}} <br>
                    {{translate('setting')}}
                </p>
                <br>
                <a href="{{route('activation.index')}}" class="btn btn-primary mar-top btn-block top-border-radius-no">{{translate('Click Here')}}</a>
            </div>
        </div>
        <div class="panel">
            <div class="pad-top text-center dash-widget">
                <p class="text-semibold text-lg text-main mar-ver">
                    {{translate('SMTP')}} <br>
                    {{translate('setting')}}
                </p>
                <br>
                <a href="{{ route('smtp_settings.index') }}" class="btn btn-primary mar-top btn-block top-border-radius-no">{{translate('Click Here')}}</a>
            </div>
        </div>
    </div>
    <div class="flex-col-xl flex-col-lg-6 flex-col-12">
        <div class="panel">
            <div class="pad-top text-center dash-widget">
                <p class="text-semibold text-lg text-main mar-ver">
                    {{translate('Payment method')}} <br>
                    {{translate('setting')}}
                </p>
                <br>
                <a href="{{ route('payment_method.index') }}" class="btn btn-primary mar-top btn-block top-border-radius-no">{{translate('Click Here')}}</a>
            </div>
        </div>
        <div class="panel">
            <div class="pad-top text-center dash-widget">
                <p class="text-semibold text-lg text-main mar-ver">
                    {{translate('Social media')}} <br>
                    {{translate('setting')}}
                </p>
                <br>
                <a href="{{ route('social_login.index') }}" class="btn btn-primary mar-top btn-block top-border-radius-no">{{translate('Click Here')}}</a>
            </div>
        </div>
    </div>
    <div class="flex-col-xl flex-col-lg-12 flex-col-12">
        <div class="panel">
            <div class="panel-body text-center dash-widget bg-primary">
                <br>
                <br>
                <i class="demo-pli-gear icon-5x"></i>
                <br>
                <br>
                <br>
                <br>
                <p class="text-semibold text-2x text-light mar-ver">
                    {{translate('Business')}} <br>
                    {{translate('setting')}}
                </p>
                <br>
                <br>
            </div>
        </div>
    </div>
    <div class="flex-col-xl flex-col-lg-6 flex-col-12">
        <div class="panel">
            <div class="pad-top text-center dash-widget">
                <p class="text-semibold text-lg text-main mar-ver">
                    {{translate('Currency')}} <br>
                    {{translate('setting')}}
                </p>
                <br>
                <a href="{{route('currency.index')}}" class="btn btn-primary mar-top btn-block top-border-radius-no ">{{translate('Click Here')}}</a>
            </div>
        </div>
        <div class="panel">
            <div class="pad-top text-center dash-widget">
                <p class="text-semibold text-lg text-main mar-ver">
                    {{translate('Seller verification')}} <br>
                    {{translate('form setting')}}
                </p>
                <br>
                <a href="{{route('seller_verification_form.index')}}" class="btn btn-primary mar-top btn-block top-border-radius-no">{{translate('Click Here')}}</a>
            </div>
        </div>
    </div>
    <div class="flex-col-xl flex-col-lg-6 flex-col-12">
        <div class="panel">
            <div class="pad-top text-center dash-widget">
                <p class="text-semibold text-lg text-main mar-ver">
                    {{translate('Language')}} <br>
                    {{translate('setting')}}
                </p>
                <br>
                <a href="{{route('languages.index')}}" class="btn btn-primary mar-top btn-block top-border-radius-no">{{translate('Click Here')}}</a>
            </div>
        </div>
        <div class="panel">
            <div class="pad-top text-center dash-widget">
                <p class="text-semibold text-lg text-main mar-ver">
                    {{translate('Seller commission')}} <br>
                    {{translate('setting')}}
                </p>
                <br>
                <a href="{{ route('business_settings.vendor_commission') }}" class="btn btn-primary mar-top btn-block">{{translate('Click Here')}}</a>
            </div>
        </div>
    </div>
</div>
@endif

@endsection
