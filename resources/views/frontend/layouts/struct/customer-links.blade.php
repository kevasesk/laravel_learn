<ul>
    <li><a href="{{route('customer.register')}}"><i class="ion-ios-personadd fa-1a" aria-hidden="true"></i>{{__('Create account')}}</a></li>
    <li>
        @if(isset($customer))
            <a href="{{route('customer.logout')}}">
                <i class="ion-log-in fa-1a" aria-hidden="true"></i>
                {{__('Logout')}} ( {{ $customer->email }})
            </a>
        @else
            <a href="{{route('customer.login')}}">
                <i class="ion-log-in fa-1a" aria-hidden="true"></i>
                {{__('Login')}}
            </a>
        @endif
    </li>
</ul>
