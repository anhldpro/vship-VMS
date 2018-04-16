@extends('layouts.admin.master')
@section('head')
<link href="{{url('libs/jquery/inputmask.min.css')}}" rel="stylesheet"/>
@stop
@section('contents')
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption uppercase">
            <i class="fa fa-book"></i> Thêm lịch trình</div>

    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
        </div>
        <div class="panel-body">
            <form  method="post" action="{{route('vms.road.store')}}" id="myForm">
                {{ csrf_field() }}
                <div class="container">
                    <div class="row" data-pg-collapsed>
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4>Địa điểm</h4>
                                </div>
                                <div class="panel-body">
                                    <div id="map">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label" for="formInput2686">Địa điểm đi</label>
                                                    <input type="text" class="form-control controls" id="map-from" placeholder="Địa điểm đi">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label" for="formInput2686">Địa điểm đến</label>
                                                    <input type="text" class="form-control vs-map" id="map-to" placeholder="Địa điểm đến">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" data-pg-collapsed>
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4>Thời gian</h4>
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label" for="formInput2966">Thứ 2</label>
                                            <input type="text" class="form-control road-time" id="formInput2966" name="mon" placeholder="HH:MM">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label" for="formInput2966">Thứ 3</label>
                                            <input type="text" class="form-control road-time" id="formInput2966" name="tue" placeholder="HH:MM">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label" for="formInput2966">Thứ 4</label>
                                            <input type="text" class="form-control road-time" id="formInput2966" name="wed" placeholder="HH:MM">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label" for="formInput2966">Thứ 5</label>
                                            <input type="text" class="form-control road-time" id="formInput2966" name="thu" placeholder="HH:MM">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label" for="formInput2966">Thứ 6</label>
                                            <input type="text" class="form-control road-time" id="formInput2966" name="fri" placeholder="HH:MM">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label" for="formInput2966">Thứ 7</label>
                                            <input type="text" class="form-control road-time" id="formInput2966" name="sat" placeholder="HH:MM">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label" for="formInput2966">Chủ nhật</label>
                                            <input type="text" class="form-control road-time" id="formInput111" name="sun" placeholder="HH:MM">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" data-pg-collapsed>
                        <div class="col-md-12 text-center">
                            <button type="button" class="btn btn-primary">Thêm lịch trình</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
@section('footer')
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initMap&key=AIzaSyDCu2eh0vrXXPHM2IAMHcnhsHjLULsD61I" async defer></script>
    <link rel="stylesheet" href="{{url('libs/jquery/timepicker/jquery.timepicker.min.css')}}">
    <script src="{{url('libs/jquery/timepicker/jquery.timepicker.min.js')}}"></script>
    <script>

        $(document).ready(function(){
            initMap();


            $('.road-time').timepicker({
                showInputs: false,
                minuteStep: 1,
                timeFormat: 'HH:mm'
            });
            $( ".road-time" ).change(function() {

                var time = $(this).val();
                var hours = Number(time.match(/^(\d+)/)[1]);
                var minutes = Number(time.match(/:(\d+)/)[1]);
                var AMPM = time.match(/\s(.*)$/)[1];
                if(AMPM == "PM" && hours<12) hours = hours+12;
                if(AMPM == "AM" && hours==12) hours = hours-12;
                var sHours = hours.toString();
                var sMinutes = minutes.toString();
                if(hours<10) sHours = "0" + sHours;
                if(minutes<10) sMinutes = "0" + sMinutes;

            });
        });
    </script>

    <script>
        // This example requires the Places library. Include the libraries=places
        // parameter when you first load the API. For example:
        // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                mapTypeControl: false,
                center: {lat: -33.8688, lng: 151.2195},
                zoom: 13
            });

            new AutocompleteDirectionsHandler(map);
        }

        /**
         * @constructor
         */
        function AutocompleteDirectionsHandler(map) {
            this.map = map;
            this.originPlaceId = null;
            this.destinationPlaceId = null;
            this.travelMode = 'DRIVING';
            var originInput = document.getElementById('map-from');
            var destinationInput = document.getElementById('map-to');
            //var modeSelector = document.getElementById('mode-selector');
            this.directionsService = new google.maps.DirectionsService;
            this.directionsDisplay = new google.maps.DirectionsRenderer;
            this.directionsDisplay.setMap(map);

            var originAutocomplete = new google.maps.places.Autocomplete(
                originInput, {placeIdOnly: true});
            var destinationAutocomplete = new google.maps.places.Autocomplete(
                destinationInput, {placeIdOnly: true});


            console.log(originAutocomplete);
            console.log(destinationAutocomplete);

            //this.setupClickListener('changemode-walking', 'WALKING');
            //this.setupClickListener('changemode-transit', 'TRANSIT');
            //this.setupClickListener('changemode-driving', 'DRIVING');

            this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
            this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');

            //this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(originInput);
            //this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(destinationInput);
            //this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(modeSelector);
        }

        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.
        AutocompleteDirectionsHandler.prototype.setupClickListener = function(id, mode) {
            var radioButton = document.getElementById(id);
            var me = this;
            radioButton.addEventListener('click', function() {
                me.travelMode = mode;
                me.route();
            });
        };

        AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function(autocomplete, mode) {
            var me = this;
            autocomplete.bindTo('bounds', this.map);
            autocomplete.addListener('place_changed', function() {
                var place = autocomplete.getPlace();
                if (!place.place_id) {
                    window.alert("Please select an option from the dropdown list.");
                    return;
                }
                if (mode === 'ORIG') {
                    me.originPlaceId = place.place_id;
                } else {
                    me.destinationPlaceId = place.place_id;
                }
                me.route();
            });

        };

        AutocompleteDirectionsHandler.prototype.route = function() {
            if (!this.originPlaceId || !this.destinationPlaceId) {
                return;
            }
            var me = this;

            this.directionsService.route({
                origin: {'placeId': this.originPlaceId},
                destination: {'placeId': this.destinationPlaceId},
                travelMode: this.travelMode
            }, function(response, status) {
                if (status === 'OK') {
                    me.directionsDisplay.setDirections(response);
                } else {
                    window.alert('Directions request failed due to ' + status);
                }
            });
        };
    </script>
@stop