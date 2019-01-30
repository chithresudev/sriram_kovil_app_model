<!-- Card Component -->

@if (Route::currentRouteName() !== 'patient.edit')
<div class="pb-3 back">
<a href="{{ URL::previous() }}" class="btn btn-sm btn-white">
  <i class="material-icons mr-0 ml-1">
arrow_back_ios
 </i>
</a>
</div>
@endif

<div class="card">
    <div class="card-header pl-4  pr-4 border-bottom-0">
      @if (Route::currentRouteName() == 'patient.edit')
        <a href="/precamp/dashboard" class="btn btn-dark btn-sm">Home</a>
        <span class="float-right">
          {{ $card_title }}
          </span>
      @else
      <span>
        {{ $card_title }}
      </span>
      @endif
    </div>
    <div class="card-body p-4">
        {{ $slot }}
    </div>
</div>


@if (Route::currentRouteName() == 'precamp.dashboard')
<style media="screen">
  .back {
     display: none;
  }
</style>
@endif
