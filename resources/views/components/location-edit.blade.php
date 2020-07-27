<div id="d-map">
    <div class="d-map-card">
        <div class="card-title">
            <h1>{{ __('Location title') }}: {{$location->location_title}}</h1>
            <p>Edit Location Marker</p>
            <x-map-massages />
        </div>
        <div class="content">
            <form method="POST" action="{{ route('googlemap.update', $location->id) }}">
                @csrf
                {{ method_field('PUT') }}
                <div class="d-map-field">
                    <label>coords lat*</label>
                    <input type="text"
                           name="coords_lat"
                           value="{{$location->coords_lat}}"
                           id="coords_lat"
                           class="d-map-input {{ $errors->has('coords_lat') ? ' is-danger' : '' }}"
                           title="coords-lat"
                           placeholder="coords lat" required autofocus>
                    @if ($errors->has('coords_lat'))
                        <p class="help is-danger" >{{ $errors->first('coords_lat') }}</p>
                    @endif

                </div>
                <div class="d-map-field">
                    <label>coords lng*</label>
                    <input type="text"
                           name="coords_lng"
                           value="{{$location->coords_lng}}"
                           id="coords_lng"
                           class="d-map-input {{ $errors->has('coords_lng') ? ' is-danger' : '' }}"
                           title="coords-lng"
                           placeholder="coords lng" required autofocus>
                    @if ($errors->has('coords_lng'))
                        <p class="help is-danger" >{{ $errors->first('coords_lng') }}</p>
                    @endif

                </div>
                <div class="d-map-field">
                    <label>location title*</label>
                    <input type="text"
                           name="location_title"
                           value="{{$location->location_title}}"
                           id="location_title"
                           class="d-map-input {{ $errors->has('location_title') ? ' is-danger' : '' }}"
                           title="location-title" placeholder="location title" required autofocus>
                    @if ($errors->has('location_title'))
                        <p class="help is-danger" >{{ $errors->first('location_title') }}</p>
                    @endif

                </div>
                <div class="d-map-field">
                    <label>phone number*</label>
                    <input type="text"
                           name="number"
                           value="{{$location->number}}"
                           id="number"
                           class="d-map-input {{ $errors->has('number') ? ' is-danger' : '' }}"
                           title="number" placeholder="phone number" required autofocus>
                    @if ($errors->has('number'))
                        <p class="help is-danger" >{{ $errors->first('number') }}</p>
                    @endif

                </div>
                <div class="d-map-field">
                    <label>location email*</label>
                    <input type="email"
                           name="location_email"
                           value="{{$location->location_email}}"
                           id="location_email"
                           class="d-map-input {{ $errors->has('email') ? ' is-danger' : '' }}"
                           title="location email"
                           placeholder="location email" required autofocus>
                    @if ($errors->has('location_email'))
                        <p class="help is-danger" >{{ $errors->first('location_email') }}</p>
                    @endif

                </div>
                <div class="d-map-field">
                    <label>address line1*</label>
                    <input type="text"
                           name="addressline1"
                           value="{{$location->addressline1}}"
                           id="addressline1"
                           class="d-map-input {{ $errors->has('addressline1') ? ' is-danger' : '' }}"
                           title="addressline1" placeholder="addressline1" required autofocus>
                    @if ($errors->has('addressline1'))
                        <p class="help is-danger" >{{ $errors->first('addressline1') }}</p>
                    @endif

                </div>
                <div class="d-map-field">
                    <label>address line2*</label>
                    <input type="text"
                           name="addressline2"
                           value="{{$location->addressline2}}"
                           id="addressline2"
                           class="d-map-input {{ $errors->has('addressline2') ? ' is-danger' : '' }}"
                           title="addressline2" placeholder="addressline2" required autofocus>
                    @if ($errors->has('addressline2'))
                        <p class="help is-danger" >{{ $errors->first('addressline2') }}</p>
                    @endif

                </div>
                <div class="d-map-field">
                    <label>city*</label>
                    <input type="text"
                           name="city"
                           value="{{$location->city}}"
                           id="city"
                           class="d-map-input {{ $errors->has('city') ? ' is-danger' : '' }}"
                           title="city" placeholder="city" required autofocus>
                    @if ($errors->has('city'))
                        <p class="help is-danger" >{{ $errors->first('city') }}</p>
                    @endif

                </div>
                <div class="d-map-field">
                    <label>country*</label>
                    <select name="country"
                            class="d-map-input d-map-select {{ $errors->has('country') ? ' is-danger' : '' }}"
                            id="country"
                            style="width: 100%;">
                        @if(Config::get('googlemap'))
                            @foreach(Config::get('googlemap')['countries'] as $countrie )
                                <option class="option" @php if ( $countrie->code == $location->country ) echo 'selected' ; @endphp value="{{$countrie->code}}">{{$countrie->name}}</option>
                            @endforeach
                        @endif
                    </select>
                    @if ($errors->has('country'))
                        <p class="help is-danger" >{{ $errors->first('country') }}</p>
                    @endif

                </div>


                <button type="submit" class="">Save Changes</button>

            </form>
        </div>
    </div>
</div>
