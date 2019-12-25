@extends('layouts.home')
@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@stop
@section('content')
<div class="outer-welcome-vehicle outer-welcome-moto">
    <div class="container rent-zone-search">
        <div class="row">
            <div class="col-md-6">
            {!! Form::open(['method'=>'GET', 'action' => 'RentalMotoController@choose_moto' ,'class'=>'rent-zone-search'])  !!}
                <div class="col-md-12">
                    <h1 class="homepagetitle">{!! trans('home.Fast_and_easy_to_rent_a_moto') !!}</h1>
                    @include('includes.form-errors')
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('branch_pickup', Lang::get('home.Pickup_Location')) !!}
                        {!! Form::select('branch_pickup', [''=> Lang::get('home.Choose_Pickup_Location')] + $branches, null, ['class' => 'form-control required']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group" id="another-location">
                        <div class="checkbox form-control"></div>
                        {!! Form::label('another-location', Lang::get('home.Return_to_another_place'), ['id' => 'another-location']) !!}
                    </div>
                    <div class="form-group hidden branch_return">
                        {!! Form::label('branch_return', Lang::get('home.Return_Location')) !!}
                        {!! Form::select('branch_return', [''=> Lang::get('home.Choose_Return_Location')] + $branches, null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('pickupDate', Lang::get('home.Pickup_Date')) !!}
                            {!! Form::date('pickupDate', null, ['class' => 'form-control rent-date pickupDate required', 'id'=> 'pickupDate']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('returnDate', Lang::get('home.Return_Date')) !!}
                        {!! Form::date('returnDate', null, ['class' => 'form-control rent-date returnDate required', 'id'=> 'returnDate']) !!}
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('pickupTime', Lang::get('home.Pickup_Time')) !!}
                        {!! Form::time('pickupTime', null, ['class' => 'form-control required']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('returnTime', Lang::get('home.Return_Time')) !!}
                        {!! Form::time('returnTime', null, ['class' => 'form-control required', 'id'=> 'returnTime']) !!}
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12">
                    <div class="form-group">
                        {!! Form::submit(Lang::get('home.rent_a_moto'), ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
                <div class="clearfix"></div>
        {!! Form::close() !!}
        </div> {{-- col-md-6 --}}
    </div> {{-- row --}}
</div> {{-- container --}}
</div> {{-- outer --}}
@stop
@section('footer')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    $("#pickupDate, #returnDate").flatpickr({
        dateFormat: "Y-m-d",
        minDate: "today",
        defaultDate: "today"
    });
    $("#pickupTime, #returnTime").flatpickr({
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        defaultDate: "13:45"
    });
</script>
<script>
    $(function(){
        $( "#another-location" ).on("click", function() {
            $( '.branch_return' ).removeClass( "hidden" );
            $(this).addClass( "hidden" );
        });
    });
</script>
@stop