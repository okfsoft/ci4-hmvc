<!DOCTYPE html>
<html lang="en">
<head>
    {{-- Load: Meta Title Page --}}
    @include('example.public.meta_title')

    <title>{{ $title }}</title>

    {{-- Load: Asset Heading --}}
    @include('example.public.assets_head')

    {{-- Load: Page Level Heading Script --}}
    @stack('head_scripts')
</head>
<body>

{{-- Load: Menu Page Header --}}
<header>
    @include('example.public.menu_header')
</header>

{{-- Load: Main Content --}}
@yield('content')

{{-- Load: Page Footer tag --}}
@include('example.public.menu_footer')

{{-- Load: Asset Footer --}}
@include('example.public.assets_foot')

{{-- Load: Page Level Footer Script --}}
@stack('foot_scripts')

</body>
</html>