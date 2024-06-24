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
            const CACHE_NAME = 'offline-cache-v5';
const OFFLINE_URL = '/device-player'; // The URL of the web page to cache

// Install event: caching the offline page
self.addEventListener('install', event => {

    console.log('service worker installing');
  event.waitUntil(
    caches.open(CACHE_NAME).then( cache => {

      return cache.addAll([

        // Add other resources you want to cache


        OFFLINE_URL,
        '/js/starter-device.js'
        // Add more resources as needed
      ]).catch(error => {
        console.error('Failed to cache resources:', error);
    });
    })
  );
});

// call activate event
self.addEventListener('activate',event=>{
    console.log('service worker :activated');
    event.waitUntil(
        caches.keys().then(cacheNames => {
          return Promise.all(
            cacheNames.map(cacheName => {
              if (cacheName !== CACHE_NAME) {
                return caches.delete(cacheName);
              }
            })
          );
        })
      );
});
// Fetch event: serving cached content when offline
self.addEventListener('fetch', event => {
    console.log('Fetch event:', event);
    event.respondWith(
        fetch(event.request).catch(() => {
            // If the network request fails, try to serve the request from the cache
            return caches.match(event.request).then(response => {
                if (response) {
                    return response;
                } else if (event.request.headers.get('accept').includes('text/html')) {
                    // If the request is for an HTML page, serve the offline page
                    return caches.match(OFFLINE_URL);
                }
            });
        })
    );
});



        </script>


        <script src="{{ asset('js/service-worker.js') }}"></script>

        <script src="{{ asset('js/handle-storage.js') }}"></script>
        <script type="module"  src="{{ asset('js/starter-device.js') }}"></script>

    </body>
</html>
