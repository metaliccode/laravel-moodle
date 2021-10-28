<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- style --}}
    @include('layouts.style')

    <title>Training Moodle API Integration</title>
  </head>
  <body>
      {{-- navbar --}}
        @include('components.navbar')

      <div class="container">
        @yield('content')
      </div>

    {{-- script --}}
    @include('layouts.script')

  </body>
</html>
