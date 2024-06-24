<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Generate Code and PIN</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
        <script>
            Pusher.logToConsole = true;

            var pusher = new Pusher('3581f7e6387a4abc5016', {

            cluster: 'ap2'
            });
        </script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body>

        <div id="result"></div>
        <div>this is first test offline status</div>
        <div id="status"></div>
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};

            if ('serviceWorker' in navigator) {
    console.log('Service Worker test');
        window.addEventListener('load', () => {
        navigator.serviceWorker.register('/service-worker.js',{ scope: '/' })
            .then(registration => {
            console.log('Service Worker registered with scope:', registration.scope);
            })
            .catch(error => {
            console.log('Service Worker registration failed:', error);
            });
        });
    }
        </script>


        {{-- <script src="{{ asset('/service-worker.js') }}"></script> --}}

        <script src="{{ asset('js/handle-storage.js') }}"></script>
        <script type="module"  src="{{ asset('js/starter-device.js') }}"></script>

    </body>
</html>
