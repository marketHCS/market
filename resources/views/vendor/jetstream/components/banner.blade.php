@props(['style' => session('flash.bannerStyle', 'success'), 'message' => session('flash.banner')])

<div x-data="{{ json_encode(['show' => true, 'style' => $style, 'message' => $message]) }}" :class="{ 'bg-indigo-500': style == 'success', 'bg-red-700': style == 'danger' }" style="display: none;" x-show="show && message" x-init="
                document.addEventListener('banner-message', event => {
                    style = event.detail.style;
                    message = event.detail.message;
                    show = true;
                });
            ">
  <div class="max-w-screen-xl mx-auto py-2 px-3 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between flex-wrap">
      <div class="w-0 flex-1 flex items-center min-w-0">
        <span class="flex p-2 rounded-lg" :class="{ 'bg-indigo-600': style == 'success', 'bg-red-600': style == 'danger' }">
          <picture>
            <img src="{{ asset('/logo.png') }}" alt="logo" style="max-width:6rem">
          </picture>
        </span>

        <p class="ml-3 font-medium text-sm text-white truncate" x-text="message"></p>
      </div>

      <div class="flex-shrink-0 sm:ml-3">
        <button type="button" class="-mr-1 flex p-2 rounded-md focus:outline-none sm:-mr-2 transition ease-in-out duration-150" :class="{ 'hover:bg-indigo-600 focus:bg-indigo-600': style == 'success', 'hover:bg-red-600 focus:bg-red-600': style == 'danger' }" aria-label="Dismiss" x-on:click="show = false">
          <picture>
            <img src="{{ asset('/logo.png') }}" alt="logo" style="max-width:6rem">

          </picture>

        </button>
      </div>
    </div>
  </div>
</div>
