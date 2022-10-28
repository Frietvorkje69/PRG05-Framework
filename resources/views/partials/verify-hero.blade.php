@if(session()->exists('productsSeen'))
    @php
        $i = session()->get('productsSeen');
        error_log($i);
        $i ++;
        session()->put('productsSeen', $i)
    @endphp

    @if($i >= 2 and !Auth::user()->verified_status)
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Amazing news!</h4>
            <p>You've viewed two products so we can now complete your verification process!</p>
            <hr>
            <btn class="btn btn-success" href="{{ route('users.verify-user', Auth::id()) }}"
               onclick="event.preventDefault();document.getElementById('verification').submit();">Click here to
                verify!</btn>

            <form id="verification" action="{{ route('users.verify-user', Auth::id()) }}" method="POST">
                @csrf
            </form>
        </div>
    @endif
@else
    @php
        session()->put('productsSeen', 1)
    @endphp
@endif

