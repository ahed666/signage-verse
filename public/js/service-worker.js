const CACHE_NAME = 'offline-cache-v2';
const OFFLINE_URL = './index.html'; // The URL of the web page to cache

// Install event: caching the offline page
self.addEventListener('install', event => {

    console.log('service worker installing');
  event.waitUntil(
    caches.open(CACHE_NAME).then( cache => {

      return cache.addAll([

        // Add other resources you want to cache


        '/',
        './index.html'
        // Add more resources as needed
      ]).catch(error => {
        console.error('Failed to cache resources:', error);
    });
    })
  );
});

// call activate event
self.addEventListener('activate',event=>{
    console.log('service worker :activated')
})
// Fetch event: serving cached content when offline
self.addEventListener('fetch', (event) => {
    console.log(event);
    event.respondWith(
        caches.match(event.request).then((response) => {
            return response || fetch(event.request);
        })
    );
});
