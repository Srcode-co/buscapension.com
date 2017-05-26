<meta charset="utf-8" />

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<meta  name="description" content="@yield('description')" />

<meta name="author" content="@yield('author')" />

<meta name="keywords" content="pensiones, pensionados, pension, habitaciones">

<link rel="shortcut icon" type="image/png" href="{{ asset('favicon.png') }}">

<meta name="google-site-verification" content="osBSixEUAQG88FmQ5ibpWjRmegn64qE8XdrK0tGbnhs" />

<title>
	@yield('title') - buscapension
</title>


<meta property="og:url"                content="{{url()->current()}}" />
<meta property="og:type"               content="website" />
<meta property="og:title"              content="@yield('title')" />
<meta property="og:description"        content="@yield('description')" />
<meta property="og:image"              content="https://buscapension.com/images/thumbnail.png" />


@include('includes.links')