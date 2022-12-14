<div class="col-lg-4">

<h5 style="font-size: 14px; font-weight: bold; text-align: center;">পরিবরতন/যুক্ত করতে অপশনটিতে ক্লিক করুন</h5>

<div class="user-leftbar-details">
    <div>
        @if(Auth::user()->photo)
            <img src="{{ asset(Auth::user()->photo) }}" class="img-responsive" alt="user">
        @else
            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="img-responsive" alt="user">
        @endif
    </div>
    <div class="ml-2">
        <h5>{{ Auth::guard('web')->user()->name }}</h5>
        <p>Reference Number: <span>{{ Auth::guard('web')->user()->shareableRefcode }}</span></p>
        <p>Position: <span>{{ Auth::guard('web')->user()->designation }}</span></p>
    </div>
</div>

    <div class="myaccount-tab-menu nav dropdown show" role="tablist">

        <a href="{{ route('main.home') }}">Home</a>

        <a href="{{ route('dashboard') }}" class="{{ Request::is('dashboard') ? 'active' : '' }}" >Dashboard</a>

        <a href="{{ route('caseReport') }}" class="{{ Request::is('dashboard/casereport') ? 'active' : '' }}" >Case Report</a>

        <a href="{{ route('allCases', Auth::guard('web')->user()->id) }}" class="{{ Request::is('dashboard/allcases') ? 'active' : '' }}">All Cases</a>

        <!-- <a href="#case_report_list" data-toggle="tab">Case Report List</a> -->

        <a href="{{ route('profilePage') }}" class="{{ Request::is('dashboard/profile') ? 'active' : '' }}" >Profile</a>

        <a href="{{ route('userProfileEdit', Auth::guard('web')->user()->id) }}">Edit Info</a>

        <a href="{{ route('userGeneralMsg', Auth::guard('web')->user()->id) }}" class="{{ Request::is('dashboard/support') ? 'active' : '' }}">General Massage</a>

        <a href="{{ route('userSupport', Auth::guard('web')->user()->id) }}" class="{{ Request::is('dashboard/support') ? 'active' : '' }}">Support</a>

        <a href="#">Present Status</a>

        <form method="POST" action="{{ route('logout') }}" style="display: flex; justify-content: center; box-shadow: none;
    background: transparent;
    padding: 14px;">
                    @csrf

                    <button type="submit" class="btn btn-danger text-center">Logout</button>
                </form>

    </div>
    
</div>