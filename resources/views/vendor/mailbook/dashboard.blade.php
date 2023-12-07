<!doctype html>
<html lang="en">
<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-BCK0YREER7"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-BCK0YREER7');
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $subject }} - Mailbook</title>
    <style>{{ $style }}</style>
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>✉️</text></svg>">
</head>
<body class="bg-gray-900 text-white h-screen w-screen flex flex-col">
@include('mailbook::navigation')
<div class="flex flex-grow flex-shrink items-stretch overflow-hidden">
    @include('mailbook::list')
    @include('mailbook::display')
    @include('mailbook::details')
</div>
<script>
    const select = document.getElementById('locale');
    select.addEventListener('change', (event) => {
        const queryVariables = new URLSearchParams(window.location.search);
        queryVariables.set('locale', event.target.value);
        window.location.search = queryVariables.toString();
    });
</script>
</body>
</html>

