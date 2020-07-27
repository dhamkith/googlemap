<div class="d-map">
    <div class="d-map-card">
        <div class="card-title">
            <h1>{{ __('All the Location Marker') }}</h1>
            <p>All the google map Locations</p>
            <x-map-massages />
        </div>
    </div>
    @foreach($locations as $key => $location)
        <div class="locations-wrapper">
            <div class="location-header cf">
                <h1>{{$location->location_title}} </h1>
                <a href="javascript:void(0);" class="location-burger burger location-action-button">
                    <span aria-hidden="false"></span>
                    <span aria-hidden="false"></span>
                    <span aria-hidden="false"></span>
                </a>
            </div>
            <div class="location">
                <div class="location-row">coords_lat: {{$location->coords_lat}}</div>
                <div class="location-row">coords_lng: {{$location->coords_lng}}</div>
                <div class="location-row">
                    <span>{{$location->addressline1}},</span>
                    <span>{{$location->addressline2}},</span>
                    <span>{{$location->city}},</span>
                    <span>{{$location->country}},</span>
                </div>
            </div>
            <div class="location-action-dropdown">
                <a class="link-item" href="{{ route('googlemap.edit', $location->id) }}">edit {{$location->location_title}}</a>
                <a class="link-item" href="{{ route('googlemap.delete', $location->id) }}" type="button"
                   onclick="event.preventDefault();
                       document.getElementById('location-destroy').submit();">delete
                </a>
                <form id="location-destroy" action="{{ route('googlemap.delete', $location->id) }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                </form>
            </div>
        </div>
    @endforeach
</div>
