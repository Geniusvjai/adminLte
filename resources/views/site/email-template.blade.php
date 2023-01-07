{{-- @component('mail::message') --}}

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Contact Us Enquiry!</h1>
                </div>
                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh mail has been sent to your email address.') }}
                        </div>
                    @endif
                    <div style="border: 1px solid;padding:20px;width: 50px;">
                        <p> Name: {{ $Name }}</p>

                        <p>Email-id: {{ $Email }} <br><br></p>

                        <p>Subject is: {{ $Subject }} <br><br></p>

                        <p> Message: {{ $Message }} </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
