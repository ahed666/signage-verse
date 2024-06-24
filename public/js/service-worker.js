const CACHE_NAME = 'offline-cache-v6';
const OFFLINE_URL = '/resources/views/device_player.blade.php'; // The URL of the web page to cache

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
