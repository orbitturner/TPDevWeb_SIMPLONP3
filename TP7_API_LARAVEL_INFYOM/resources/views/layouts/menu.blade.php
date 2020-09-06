<li class="{{ Request::is('agencies*') ? 'active' : '' }}">
    <a href="{{ route('agencies.index') }}"><i class="fa fa-edit"></i><span>Agencies</span></a>
</li>

<li class="{{ Request::is('clientphysiques*') ? 'active' : '' }}">
    <a href="{{ route('clientphysiques.index') }}"><i class="fa fa-edit"></i><span>Clientphysiques</span></a>
</li>

<li class="{{ Request::is('compteepsxes*') ? 'active' : '' }}">
    <a href="{{ route('compteepsxes.index') }}"><i class="fa fa-edit"></i><span>Compteepsxes</span></a>
</li>

<li class="{{ Request::is('employees*') ? 'active' : '' }}">
    <a href="{{ route('employees.index') }}"><i class="fa fa-edit"></i><span>Employees</span></a>
</li>

<li class="{{ Request::is('openingfees*') ? 'active' : '' }}">
    <a href="{{ route('openingfees.index') }}"><i class="fa fa-edit"></i><span>Openingfees</span></a>
</li>

<li class="{{ Request::is('profiles*') ? 'active' : '' }}">
    <a href="{{ route('profiles.index') }}"><i class="fa fa-edit"></i><span>Profiles</span></a>
</li>

<li class="{{ Request::is('states*') ? 'active' : '' }}">
    <a href="{{ route('states.index') }}"><i class="fa fa-edit"></i><span>States</span></a>
</li>


